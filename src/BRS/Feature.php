<?php

namespace BRS;

class Feature
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var BRSDie
     */
    private $bDie;

    /**
     * @var Aspect
     */
    private $aspect;

    /**
     * @var bool
     */
    private $active;//The Pain can deactivate a Feature temporarily

    /**
     * @var bool
     */
    private $legendary;

    /**
     * @var bool
     */
    private $devastated;

    public function __construct(
        $name,
        BRSDie $bDie,
        Aspect $aspect,
        $active = true,
        $legendary = false,
        $devastated = false
    ) {
        $this->name = $name;
        $this->bDie = $bDie;
        $this->aspect = $aspect;
        $this->active = $active;
        $this->legendary = $legendary;
        $this->devastated = $devastated;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return BRSDie
     */
    public function bDie()
    {
        return $this->bDie;
    }

    /**
     * @return Aspect
     */
    public function aspect()
    {
        return $this->aspect;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isLegendary()
    {
        return $this->legendary;
    }

    /**
     * @return bool
     */
    public function isDevastated()
    {
        return $this->devastated;
    }

    /**
     * @return $this
     */
    public function deactivate()
    {
        $this->active = false;

        return $this;
    }

    /**
     * @return $this
     */
    public function activate()
    {
        $this->active = true;

        return $this;
    }
}
