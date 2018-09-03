<?php
/**
 * Created by PhpStorm.
 * User: yasiru
 * Date: 6/16/18
 * Time: 1:48 AM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $contactNumber;

    /**
     * @var string
     */
    private $address;

    private $ads;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    public function __construct()
    {
        $this->ads = new ArrayCollection();
        parent::__construct();
        // your own logic
    }

    /**
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * @param string $contactNumber
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }



}