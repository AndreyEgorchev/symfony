<?php
/**
 * Created by PhpStorm.
 * User: Андрій
 * Date: 26.02.2016
 * Time: 14:51
 */

namespace ProdAuto\ProdBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="string")
     */
    private $description;


    /**
     * @ORM\Column(type="integer")
     */

    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */private $s_p_id;

    /**
     * @return mixed
     */
    public function getSPId()
    {
        return $this->s_p_id;
    }

    /**
     * @param mixed $s_p_id
     */
    public function setSPId($s_p_id)
    {
        $this->s_p_id = $s_p_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Spare_parts
     * @ORM\PrePersist()
     */
    public function setCreated()
    {
        $this->created = new \DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}