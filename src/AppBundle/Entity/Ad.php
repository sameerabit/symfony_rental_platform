<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ad
 */
class Ad
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var int
     */
    private $rentFrequency;

    private $frequencyType;

    /**
     * @var string|null
     */
    private $contactNumber;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $subCategory;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $adNumber;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="ad", cascade={"persist"})
     */
    private $photos;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Ad
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Ad
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set cost.
     *
     * @param string $cost
     *
     * @return Ad
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost.
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set rentFrequency.
     *
     * @param int $rentFrequency
     *
     * @return Ad
     */
    public function setRentFrequency($rentFrequency)
    {
        $this->rentFrequency = $rentFrequency;

        return $this;
    }

    /**
     * Get rentFrequency.
     *
     * @return int
     */
    public function getRentFrequency()
    {
        return $this->rentFrequency;
    }

    public function getFrequencyType()
    {
        return $this->frequencyType;
    }

    public function setFrequencyTYpe($frequencyType){
        $this->frequencyType = $frequencyType;
    }

    /**
     * Set contactNumber.
     *
     * @param string|null $contactNumber
     *
     * @return Ad
     */
    public function setContactNumber($contactNumber = null)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get contactNumber.
     *
     * @return string|null
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Ad
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return Ad
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set location.
     *
     * @param string $location
     *
     * @return Ad
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set category.
     *
     * @param string $category
     *
     * @return Ad
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param ArrayCollection $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getAdNumber()
    {
        return $this->adNumber;
    }

    /**
     * @param string $adNumber
     */
    public function setAdNumber($adNumber)
    {
        $this->adNumber = $adNumber;
    }



}
