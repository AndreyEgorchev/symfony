<?php
/**
 * Created by PhpStorm.
 * User: Андрій
 * Date: 18.02.2016
 * Time: 11:22
 */

namespace Auth\AuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 * @ORM\Table(name="sellers")
 * @ORM\HasLifecycleCallbacks()
 */

class Sellers
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sellersid;
       /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string")
     */
    private $password_confirm;
    /**
     * @ORM\Column(type="string")
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name_of_company;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $location;

    /**
     * Get sellersid
     *
     * @return integer 
     */
    public function getSellersid()
    {
        return $this->sellersid;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Sellers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Sellers
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password_confirm
     *
     * @param string $passwordConfirm
     * @return Sellers
     */
    public function setPasswordConfirm($passwordConfirm)
    {
        $this->password_confirm = $passwordConfirm;

        return $this;
    }

    /**
     * Get password_confirm
     *
     * @return string 
     */
    public function getPasswordConfirm()
    {
        return $this->password_confirm;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Sellers
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set name_of_company
     *
     * @param string $nameOfCompany
     * @return Sellers
     */
    public function setNameOfCompany($nameOfCompany)
    {
        $this->name_of_company = $nameOfCompany;

        return $this;
    }

    /**
     * Get name_of_company
     *
     * @return string 
     */
    public function getNameOfCompany()
    {
        return $this->name_of_company;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Sellers
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
     * Set location
     *
     * @param string $location
     * @return Sellers
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
}
