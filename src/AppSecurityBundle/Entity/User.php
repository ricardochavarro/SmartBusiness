<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppSecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
/**
 * Description of User
 *
 * @author Ricardo
 */
/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppSecurityBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable{
    //put your code here
    
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
	
	/**
     * @var \BusinessStockBundle\Entity\BusinessStore
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\BusinessStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_business_owner", referencedColumnName="id_business_store")
     * })
     */
    private $idBusinessOwner;
    
    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
	
	/**
     * Set idBusinessOwner
     *
     * @param \BusinessStockBundle\Entity\BusinessStore $idBusinessOwner
     * @return AppUsers
     */
    public function setIdBusinessOwner(\BusinessStockBundle\Entity\BusinessStore $idBusinessOwner = null)
    {
        $this->idBusinessOwner = $idBusinessOwner;

        return $this;
    }

    /**
     * Get idBusinessOwner
     *
     * @return \BusinessStockBundle\Entity\BusinessStore 
     */
    public function getIdBusinessOwner()
    {
        return $this->idBusinessOwner;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }
    
     public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
             $this->isActive
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
