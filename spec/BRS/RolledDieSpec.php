<?php

namespace spec\BRS;

use BRS\BRSDie;
use BRS\RolledDie;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RolledDieSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(8,'Force');
    }

    function it_has_a_valid_number_of_faces()
    {
        $this->size()->shouldReturn(8);
    }

    function it_has_result()
    {
        $this->result()->shouldBeBetween(1, 8);
        $this->result()->shouldBeBetween(1, 8);
        $this->result()->shouldBeBetween(1, 8);
        $this->result()->shouldBeBetween(1, 8);
        $this->result()->shouldBeBetween(1, 8);
    }

    function it_has_aspect()
    {
        $this->aspect()->shouldReturn('Force');
    }

    function it_has_a_status()
    {
        $this->status()->shouldReturn(RolledDie::STATUS_READY);
    }

    function it_can_be_advanced()
    {
        $this->advance();

        $this->status()->shouldReturn(RolledDie::STATUS_ADVANCED);
    }

    function it_can_be_exhausted()
    {
        $this->exhaust();

        $this->status()->shouldReturn(RolledDie::STATUS_EXHAUSTED);
    }

    function it_can_be_get_ready()
    {
        $this->ready();

        $this->status()->shouldReturn(RolledDie::STATUS_READY);
    }

    public function getMatchers()
    {
        return [
            'beBetween' => function ($result, $min, $max) {
                if ($result>$max || $result < $min) {
                    throw new FailureException(sprintf(
                        'Result "%s" isn\'t between "%s" and "%s".',
                        $result, $min, $max
                    ));
                }

                return true;
            },

            'haveSize' => function (RolledDie $die, $size) {
                if ($size !== $die->size()) {
                    throw new FailureException(sprintf(
                        'Size "%s" isn\'t  "%s"',
                        $die->size(), $size
                    ));
                }

                return true;
            },
        ];
    }
}
