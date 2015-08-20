<?php

namespace Cinetic\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * Add a role to the user.
     * @throws Exception
     * @param Rol $role
     */
    public function addRole($role)
    {
        if($role == 1){
            array_push($this->roles, 'ROLE_ADMIN');
        }
        else if($role){
            array_push($this->roles, 'ROLE_USER');
        }
    }
}
