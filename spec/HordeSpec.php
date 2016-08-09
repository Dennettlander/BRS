<?php

namespace spec;

use Horde;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HordeSpec extends ObjectBehavior
{
    function it_is_created_with_4_dice_per_type()
    {
        $this->d4()->shouldReturn(4);
        $this->d6()->shouldReturn(4);
        $this->d8()->shouldReturn(4);
        $this->d10()->shouldReturn(4);
    }

    function it_can_be_upgraded_with_dice_sets()
    {
        $this->upgrade();

        $this->d4()->shouldReturn(5);
        $this->d6()->shouldReturn(5);
        $this->d8()->shouldReturn(5);
        $this->d10()->shouldReturn(5);
    }

    function it_can_remove_a_dice_per_type()
    {
        $offer = [Horde::D8 => 1];
        $this->removeDice($offer);

        $this->d8()->shouldReturn(3);
    }

    function it_can_removes_several_dice_per_type()
    {
        $offer = [Horde::D10 => 3];
        $this->removeDice($offer);

        $this->d10()->shouldReturn(1);
    }

    function it_can_removes_several_dice_in_several_types()
    {
        $offer = [Horde::D4 => 2, Horde::D6 => 1];

        $this->removeDice($offer);

        $this->d4()->shouldReturn(2);
        $this->d6()->shouldReturn(3);
    }
}
