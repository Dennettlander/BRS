<?php

namespace spec\BRS;

use BRS\Aspect;
use BRS\RolledDie;
use BRS\Feature;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeatureSpec extends ObjectBehavior
{

    function let(Aspect $aspect)
    {
        $this->beConstructedWith('Conan', 8, $aspect);
    }

    function it_has_a_name()
    {
        $this->name()->shouldReturn('Conan');
    }

    function it_has_a_die_size()
    {
        $this->size()->shouldReturn(8);
    }

    function it_has_an_aspect(Aspect $aspect)
    {
        $this->aspect()->shouldReturn($aspect);
    }

    function it_can_be_active()
    {
        $this->isActive()->shouldReturn(true);
    }

    function it_can_be_legendary()
    {
        $this->isLegendary()->shouldReturn(false);
    }

    function it_can_be_devastated()
    {
        $this->isDevastated()->shouldReturn(false);
    }

    public function it_can_be_deactivated()
    {
        $this->deactivate();

        $this->isActive()->shouldReturn(false);
    }

    public function it_can_be_activated(Aspect $aspect)
    {
        $this->beConstructedWith('Conan', 8, $aspect, false);

        $this->activate();

        $this->isActive()->shouldReturn(true);
    }

    public function it_rolls_a_die_and_gives_results()
    {
        $this->rollDie()->shouldReturnAnInstanceOf(RolledDie::class);
    }

    public function it_rolls_a_die_and_gives_the_feature_s_aspect()
    {
        $this->rollDie()->shouldReturnAnInstanceOf(RolledDie::class);
    }
}
