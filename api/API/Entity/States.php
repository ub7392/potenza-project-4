<?php
//Entity/States.php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
/**
 * @ORM\Table(name="states")
 * @ORM\Entity(repositoryClass= "StatesRepository")
 * @ORM\HasLifecycleCallbacks
 **/
class States
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue
     * @var integer
     * @ORM\OneToMany(targetEntity="Visits", mappedBy="state_id")
     */
    private $states_id;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $states_name;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $states_abbreviation;

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

    public function setStatesid($states_id)
    {
        $this->states_id = (string)$states_id;
        return $this;
    }

    public function getStatesid()
    {
        return $this->states_id;
    }

    public function getStatesname()
    {
        return $this->states_name;
    }

    public function setStatesname($states_name)
    {
        $this->states_name = $states_name;
    }

    public function getStatesabbreviation()
    {
        return $this->states_abbreviation;
    }

    public function setStatesabbreviation($states_abbreviation)
    {
        $this->states_abbreviation = $states_abbreviation;
    }
}
