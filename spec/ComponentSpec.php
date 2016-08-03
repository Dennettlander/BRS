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
    function let(Feature $feature, Feature $feature1, Feature $feature2, Feature $feature3, Feature $feature4, Feature $feature5)
    {
        $feature1->name()->willReturn('Rubí demoníaco');
        $feature2->name()->willReturn('Sortilegios protectores');
        $feature3->name()->willReturn('Corazón de guijarros');
        $feature4->name()->willReturn('Enio, el pequeño');
        $feature5->name()->willReturn('Un espectro atado a un cordel');

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
        $this->features()->shouldHaveCount(4);
    }

    function it_has_between_1_and_4_featuresII(Feature $feature1)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1]);
        $this->features()->shouldHaveCount(1);
    }

    function it_throws_an_error_with_5_features_or_more(Feature $feature1, Feature $feature2, Feature $feature3, Feature
    $feature4, Feature $feature5)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1, $feature2, $feature3, $feature4, $feature5]);
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_throws_an_error_with_0_features()
    {
        $this->beConstructedWith('Firebolt staff', []);
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_can_adds_a_new_feature()
    {
        $this->features()->shouldHaveCount(1);

        $newFeature = new Feature('Companion', 8, 'aspect');

        $this->addFeature($newFeature)->shouldReturn($this);

        $this->features()->shouldHaveCount(2);
    }

    function it_can_removes_a_feature(Feature $feature1, Feature $feature2)
    {
        $this->beConstructedWith('Firebolt staff', [$feature1, $feature2]);
        $this->removeFeature('Rubí demoníaco');
        $this->features()->shouldHaveCount(1);
        $this->getFeature('Sortilegios protectores')->shouldReturn($feature2);
    }

    function it_can_get_a_feature_through_a_name(Feature $feature1, Feature $feature2)
    {
        $this->beConstructedWith('Firebolt Staff', [$feature1, $feature2]);
        $this->getFeature('Rubí demoníaco')->shouldReturn($feature1);
        $this->getFeature('Sortilegios protectores')->shouldReturn($feature2);
        $this->getFeature('Hechizos malignos')->shouldReturn('That feature doesn\' exist');
    }

    function it_can_devastate_itself(Feature $feature1, Feature $feature2)
    {
        $this->beConstructedWith('Firebolt Staff', [$feature1, $feature2, ]);
        $this->devastateComponent('Firebolt Staff' )->shouldReturnANewInstanceof(Component::class);

    }


    /*function it_can_destroy_itself(Feature $feature1, Feature $feature2, Feature $feature3)
    {
        $feature1->name()->willReturn('Rubí demoníaco');
        $feature2->name()->willReturn('Sortilegios protectores');
        $feature3->name()->willReturn('Hechizos malignos');

        $this->beConstructedWith('Firebolt Staff', [$feature1, $feature2, $feature3]);
        $this->destroyComponent('Firebolt Staff')->shouldReturn(0);
    }*/
}
