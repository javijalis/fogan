<?php

namespace Jalis\FoganBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jalis\FoganBundle\Entity\Breed
 *
 * @ORM\Table(name="breed")
 * @ORM\Entity
 */
class Breed
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Animal", mappedBy="breed")
     */
    protected $animals;

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
     * @return Breed
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

   public function __toString()
   {
    return $this->name;
    }
 
}
