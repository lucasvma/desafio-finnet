<?php

namespace App\Models\Entity;


/**
 * @Entity @Table(name="companies")
 **/
class Company {

    /**
     * @var int
     * @Id @Column(type="integer") 
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string") 
     */
    protected $name;

    /**
     * @var string
     * @Column(type="string") 
     */
    protected $password;


    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->$name;
    }

    public function getPassword(){
        return $this->$password;
    }

    public function setName($name){
        $this->name = $name;
        return $this;  
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;  
    }
}