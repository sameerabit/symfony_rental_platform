<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FrequencyType
 */
class FrequencyType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private $ads;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
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
     * @return FrequencyType
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
}
