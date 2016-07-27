<?php

namespace spec\BRS;

use BRS\BRSDie;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BRSDieSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BRSDie::class);
    }
}
