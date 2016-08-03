<?php

use BRS\Feature;
use PhpSpec\Exception;

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
        if (count($features) < 1) {
            throw new InvalidArgumentException('Number of features must be 1, at least');
        }

        $this->name = $name;

        foreach ($features as $feature) {
            $this->addFeature($feature);
        }
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Feature[]
     */
    public function features()
    {
        return array_values($this->features);
    }

    /**
     * @param Feature $newFeature
     * @return $this
     */
    public function addFeature(Feature $newFeature)
    {
        if (count($this->features) > 3) {
            throw new InvalidArgumentException('Number of features will exceed 4');
        }

        $this->features[$newFeature->name()] = $newFeature;

        return $this;
    }

    public function removeFeature($name)
    {
        if (count($this->features) == 1) {
            throw new InvalidArgumentException('Number of features in a component must be 1, at least');
        }

        if(isset($this->features[$name])) {
            unset($this->features[$name]);
        }

        return $this;
    }

    public function getFeature($name)
    {
        if (isset($this->features[$name])){
            return $this->features[$name];
        }

        return 'That feature doesn\' exist';
    }

    public function devastateComponent($name)
    {
        $devastatedFeature =new Feature('Devastated', 0, '', false, false, true);
        $devastatedComponent = new Component('Devastated', [$devastatedFeature]);

        $devastatedComponent->addFeature($devastatedFeature);
        $devastatedComponent->addFeature($devastatedFeature);
        $devastatedComponent->addFeature($devastatedFeature);

        return $devastatedComponent;
    }

    /*public function destroyComponent($name)
    {
        if ($this->name === $name){
            $this->name = null;

            foreach($this->features as $feature){
                unset($feature);
            }

            return (count($this->features));
        }
    }*/
}
