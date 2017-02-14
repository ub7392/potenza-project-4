<?php
//Entity/People.php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
/**
 * @ORM\Table(name="people")
 * @ORM\Entity(repositoryClass= "PeopleRepository")
 * @ORM\HasLifecycleCallbacks
 **/
class People
{
    /**
     *
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\OneToMany(targetEntity="Visits", mappedBy="person_id")
     */
    protected $people_id;
    /**
     *
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $first_name;
    /**
     *
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $last_name;
    /**
     *
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $favorite_food;

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

    public function setPeopleid($people_id)
    {
      $this->people_id = (integer)$people_id;
      return $this;
    }

    public function getPeopleid()
    {
        return $this->people_id;
    }

    public function setFirstname($first_name)
    {
        $this->first_name = (string)$first_name;
        return $this;
    }

    public function getFirstname()
    {
        return $this->first_name;
    }

    public function setLastname($last_name)
    {
        $this->last_name = (string)$last_name;
        return $this;
    }

    public function getLastname()
    {
        return $this->last_name;
    }

    public function setFavoritefood($favorite_food)
    {
        $this->favorite_food = (string)$favorite_food;
        return $this;
    }

    public function getFavoritefood()
    {
        return $this->favorite_food;
    }
}
