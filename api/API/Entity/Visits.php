<?php
// Entity/Visits.php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
/**
 * @ORM\Table(name="visits")
 * @ORM\Entity(repositoryClass= "VisitsRepository")
 **/
class Visits
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     * @ORM\ManyToOne(targetEntity="People", inversedBy="people_id")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="people_id")
     */
    private $person_id;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     * @ORM\ManyToOne(targetEntity="States", inversedBy="states_id")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="states_id")
     */
    private $state_id;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $date_visited;

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        return $this->$property = $value;
    }
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPersonid()
    {
        return $this->person_id;
    }

    public function setFirstname($person_id)
    {
        $this->person_id = $person_id;
    }

    public function getStateid()
    {
        return $this->state_id;
    }

    public function setStateid($state_id)
    {
        $this->state_id = $state_id;
    }

    public function getDatevisited()
    {
        return $this->date_visited;
    }

    public function setDatevisited($date_visited)
    {
        $this->date_visited = $date_visited;
    }
}
