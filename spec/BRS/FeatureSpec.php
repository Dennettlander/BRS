<?php

namespace spec\BRS;

use BRS\Aspect;
use BRS\BRSDie;
use BRS\Feature;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeatureSpec extends ObjectBehavior
{

    function let(BRSDie $bd8, Aspect $aspect)
    {
        $this->beConstructedWith('Conan', $bd8, $aspect);
    }

    function it_has_a_name()
    {
        $this->name()->shouldReturn('Conan');
    }

    function it_has_a_die(BRSDie $bd8)
    {
        $this->bDie()->shouldReturn($bd8);
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

    public function it_can_be_activated(BRSDie $bd8, Aspect $aspect)
    {
        $this->beConstructedWith('Conan', $bd8, $aspect, false);

        $this->activate();

        $this->isActive()->shouldReturn(true);
    }
}
