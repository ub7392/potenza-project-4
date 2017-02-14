<?php
// Entity/Visits.php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
/**
 * @ORM\Table(name="visits")
 * @ORM\Entity(repositoryClass= "VisitsRepository")
 * @ORM\HasLifecycleCallbacks
 **/
class Visits
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var integer
     * @ORM\ManyToOne(targetEntity="People", inversedBy="people_id")
     * @ORM\JoinColumn(name="people_id", referencedColumnName="people_id")
     */
    private $person_id;
    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var integer
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

    public function setId($id)
    {
        $this->id = (integer)$id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPersonid($person_id)
    {
        $this->person_id = (integer)$person_id;
        return $this;
    }

    public function getPersonid()
    {
        return $this->person_id;
    }

    public function setStateid($state_id)
    {
        $this->state_id = (integer)$state_id;
        return $this;
    }

    public function getStateid()
    {
        return $this->state_id;
    }

    public function setDatevisited($date_visited)
    {
        $this->date_visited = (string)$date_visited;
        return $this;
    }

    public function getDatevisited()
    {
        return $this->date_visited;
    }
}
