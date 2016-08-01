<?php

use BRS\Feature;

class Component
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $features = array();

    public function __construct($name, Feature $feature1)
    {
        $this->name = $name;
        $this->features[] = $feature1;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function features()
    {
        return $this->features;
    }

    /**
     * @param Feature $newFeature
     * @return $this
     */
    public function add(Feature $newFeature)
    {
        $this->features[] = $newFeature;

        return $this;
    }
}
