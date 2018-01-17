<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
   private $name;

    /**
     * @ORM\OneToMany(targetEntity="User",mappedBy="skills",cascade={"persist", "remove"})
     */
   private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function addUser(User $user)
    {
        if (!$this->users->contains($user))
            $this->users->add($user);
    }

    /**
     * @return Skill[]
     */
    public function getSkills()
    {
        return $this->users->toArray();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }



}
