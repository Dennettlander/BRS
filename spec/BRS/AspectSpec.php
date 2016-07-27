<?php

namespace spec\BRS;

use BRS\Aspect;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AspectSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Aspect::class);
    }
}
