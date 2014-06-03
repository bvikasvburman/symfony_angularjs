<?php

namespace Flyers\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project
{
 
   /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
 	* @ORM\Column(type="string", length=255)
	* @Assert\NotBlank()
    */
    protected $title;

    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;


    public function setId($id){ $this->id = $id; }
    public function getId(){ return  $this->id;  }

    public function setTitle($title){ $this->title = $title; }
    public function getTitle(){ return  $this->title; }

    public function setDescription($description){ $this->description = $description; }
    public function getDescription(){ return $this->description; }


}