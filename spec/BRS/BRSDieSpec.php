<?php

namespace spec\BRS;

use BRS\BRSDie;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BRSDieSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(8);
    }

    function it_has_a_valid_number_of_faces()
    {
        $this->faces()->shouldReturn(8);
    }

    function it_throws_an_invalid_number_of_faces_error()
    {

    }
}
