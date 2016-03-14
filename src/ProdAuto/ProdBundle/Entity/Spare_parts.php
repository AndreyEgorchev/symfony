<?php
/**
 * Created by PhpStorm.
 * User: Андрій
 * Date: 17.02.2016
 * Time: 12:19
 */

namespace ProdAuto\ProdBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 * @ORM\Table(name="spare_parts")
 * @ORM\HasLifecycleCallbacks()
 */
class Spare_parts
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @ORM\Column(type="integer")
     */
    private $serial_number;
    /**
     * @ORM\Column(type="string")
     */

    private $description;


    /**
     * @ORM\Column(type="string")
     */
    private $producer;
    /**
     * @ORM\Column(type="integer")
     */
    private $price_vid;

    /**
     * @ORM\Column(type="integer")
     */
    private $price_do;
    /**
     * @ORM\Column(type="string")
     */
    private $currency;

    /**
     * @return mixed
     */
    public function getPriceVid()
    {
        return $this->price_vid;
    }

    /**
     * @param mixed $price_vid
     */
    public function setPriceVid($price_vid)
    {
        $this->price_vid = $price_vid;
    }

    /**
     * @return mixed
     */
    public function getPriceDo()
    {
        return $this->price_do;
    }

    /**
     * @param mixed $price_do
     */
    public function setPriceDo($price_do)
    {
        $this->price_do = $price_do;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set serial_number
     *
     * @param integer $serialNumber
     * @return Spare_parts
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serial_number = $serialNumber;

        return $this;
    }

    /**
     * Get serial_number
     *
     * @return integer 
     */
    public function getSerialNumber()
    {
        return $this->serial_number;
    }

    /**
     * Set producer
     *
     * @param string $producer
     * @return Spare_parts
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return string 
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Spare_parts
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
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

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Spare_parts
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param integer $description
     * @return Spare_parts
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return integer 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Spare_parts
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
