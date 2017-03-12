<?php

namespace simo\manchesterBundle\Entity;

/**
 * Translation
 */
class Translation
{
    /**
     * @var string
     */
    private $traduction;

    /**
     * @var string
     */
    private $id;


    /**
     * Set traduction
     *
     * @param string $traduction
     *
     * @return Translation
     */
    public function setTraduction($traduction)
    {
        $this->traduction = $traduction;

        return $this;
    }

    /**
     * Get traduction
     *
     * @return string
     */
    public function getTraduction()
    {
        return $this->traduction;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}

