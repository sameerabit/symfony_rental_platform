<?php

namespace AppBundle\Entity;

/**
 * Photo
 */
class Photo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $ad;


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
     * Set url.
     *
     * @param string $url
     *
     * @return Photo
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ad.
     *
     * @param string $ad
     *
     * @return Photo
     */
    public function setAd($ad)
    {
        $this->ad = $ad;

        return $this;
    }

    /**
     * Get ad.
     *
     * @return string
     */
    public function getAd()
    {
        return $this->ad;
    }
}
