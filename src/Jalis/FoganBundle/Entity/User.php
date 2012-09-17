<?php
// src/Jalis/FoganBundle/Entity/User.php

namespace Jalis\FoganBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
     * @Orm\Column(type="string", name="first_name")
     */
    private $firstName;

    /**
     * @Orm\Column(type="string", name="last_name")
     */
    private $lastName;


     

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

