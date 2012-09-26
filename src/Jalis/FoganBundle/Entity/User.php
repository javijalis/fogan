<?php
// src/Jalis/FoganBundle/Entity/User.php

namespace Jalis\FoganBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Orm\Column(type="string", name="first_name", nullable=true)
     */
    private $firstName;

    /**
     * @Orm\Column(type="string", name="last_name", nullable=true)
     */
    private $lastName;
    
    /**
     * @ORM\ManyToMany(targetEntity="Animal", mappedBy="users", cascade={"persist"})
     */
    protected $animals;

     /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->animals = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add animals
     *
     * @param Jalis\FoganBundle\Entity\Animal $animals
     * @return User
     */
    public function addAnimal(\Jalis\FoganBundle\Entity\Animal $animals)
    {
        $this->animals[] = $animals;
    
        return $this;
    }

    /**
     * Remove animals
     *
     * @param Jalis\FoganBundle\Entity\Animal $animals
     */
    public function removeAnimal(\Jalis\FoganBundle\Entity\Animal $animals)
    {
        $this->animals->removeElement($animals);
    }

    /**
     * Get animals
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAnimals()
    {
        return $this->animals;
    }
}
