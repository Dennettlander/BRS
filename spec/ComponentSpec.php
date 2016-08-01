<?php

namespace spec;

use BRS\Aspect;
use BRS\Feature;
use Component;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PhpSpec\Exception\Example\FailureException;

class ComponentSpec extends ObjectBehavior
{
    function let(Feature $feature)
    {
        $this->beConstructedWith('Firebolt staff', [$feature]);
    }

    function it_has_a_name()
    {
        $this->name()->shouldReturn('Firebolt staff');
    }

    function it_has_a_list_of_features(Feature $feature)
    {
        $this->features()->shouldReturn([$feature]);
    }

    function it_has_between_1_and_4_features(Feature $feature1, Feature $feature2, Feature $feature3, Feature $feature4)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1, $feature2, $feature3, $feature4]);
        $this->features()->shouldCountBetween(1, 4);
        $this->features()->shouldHaveCount(4);
    }

    function it_has_between_1_and_4_featuresII(Feature $feature1)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1]);
        $this->features()->shouldCountBetween(1, 4);
        $this->features()->shouldHaveCount(1);
    }

    function it_throws_an_error_with_5_features_or_more(Feature $feature1, Feature $feature2, Feature $feature3, Feature
    $feature4, Feature $feature5, Feature $feature6)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1, $feature2, $feature3, $feature4, $feature5]);
        $this->features()->shouldThrow('\InvalidArgumentException')->duringInstantiation();*****************
    }


    function it_can_adds_a_new_feature()
    {
        $this->features()->shouldHaveCount(1);

        $newFeature = new Feature('Companion', 8, 'aspect');

        $this->addFeature($newFeature)->shouldReturn($this);

        $this->features()->shouldHaveCount(2);
    }

    public function getMatchers()
    {
        return [
            'countBetween' => function ($features, $min, $max) {
            $qtyFeatures = count($features);
            if (count($qtyFeatures) > $max || count($qtyFeatures) < $min) {
                    throw new FailureException(sprintf(
                        'The number of features "%s" isn\'t between "%s" and "%s".',
                        $qtyFeatures, $min, $max
                    ));
                }

                return true;
            }
        ];
    }
}
