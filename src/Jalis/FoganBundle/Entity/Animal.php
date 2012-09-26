<?php

namespace Jalis\FoganBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jalis\FoganBundle\Entity\Animal
 *
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="Jalis\FoganBundle\Entity\AnimalRepository")
 */
class Animal
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    public $name;

    /**
     * @ORM\ManyToOne(targetEntity="Breed", inversedBy="animals")
     * @ORM\JoinColumn(name="breed_id", referencedColumnName="id")
     */ 
    private $breed;

    /**
     * @var \DateTime $birth
     *
     * @ORM\Column(name="birth", type="date",nullable=true)
     */
    private $birth;

    /**
     * @var string $color
     *
     * @ORM\Column(name="color", type="string", length=255,nullable=true)
     */
    private $color;

    /**
     * @var integer $weight
     *
     * @ORM\Column(name="weight", type="integer",nullable=true)
     */
    private $weight;

    /**
     * @var string $eyes
     *
     * @ORM\Column(name="eyes", type="string", length=255,nullable=true)
     */
    private $eyes;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=255,nullable=true)
     */
    private $status;


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
     * Set name
     *
     * @param string $name
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set breed
     *
     * @param integer $breed
     * @return Animal
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;
    
        return $this;
    }

    /**
     * Get breed
     *
     * @return integer 
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     * @return Animal
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    
        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Animal
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Animal
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set eyes
     *
     * @param string $eyes
     * @return Animal
     */
    public function setEyes($eyes)
    {
        $this->eyes = $eyes;
    
        return $this;
    }

    /**
     * Get eyes
     *
     * @return string 
     */
    public function getEyes()
    {
        return $this->eyes;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Animal
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="animals", cascade={"persist"})
     * @ORM\JoinTable(name="animal_user",
     * joinColumns={@ORM\JoinColumn(name="animal_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    protected $users;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param Jalis\FoganBundle\Entity\User $users
     * @return Animal
     */
    public function addUser(\Jalis\FoganBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param Jalis\FoganBundle\Entity\User $users
     */
    public function removeUser(\Jalis\FoganBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}