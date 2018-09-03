<?php


namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * District
 */
class District
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
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
     * Set name.
     *
     * @param string $name
     *
     * @return District
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getLocations(){
        return $this->locations;
    }
}
