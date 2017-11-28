<?php

namespace AppSecurityBundle\Repository;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;
/**
 * Description of UserRepository
 *
 * @author Ricardo
 */
class UserRepository extends EntityRepository implements UserLoaderInterface{
    
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    public function loadUserByCredentials($username, $password)
    {
        return $this->createQueryBuilder('u')
            ->where('(u.username = :username OR u.email = :email) AND u.password = :password')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->setParameter('password', $password)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
