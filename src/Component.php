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

    /**
     * Component constructor.
     * @param string $name
     * @param Feature[] $features
     */
    public function __construct($name, array $features)
    {
        $this->name = $name;
        $this->features = $features;
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
    public function addFeature(Feature $newFeature)
    {
        $this->features[] = $newFeature;

        return $this;
    }
}
