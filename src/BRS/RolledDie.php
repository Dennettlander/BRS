<?php

namespace BRS;

class RolledDie
{
    const STATUS_READY = 'READY';
    const STATUS_ADVANCED = 'ADVANCED';
    const STATUS_EXHAUSTED = 'EXHAUSTED';
    const STATUS_BATTERED ='BATTERED';
    const STATUS_DEVASTATED = 'DEVASTATED';

    /**
     * @var integer
     */
    private $size;

    /**
     * @var integer
     */
    private $result;

    /**
     * @var string
     */
    private $aspect;

    /**
     * @var string
     */
    private $status;

    /**
     * RolledDie constructor.
     * @param $size,
     * @param $aspect
     *
     */
    public function __construct($size, $aspect)
    {
        $this->size = $size;
        $this->result = random_int(1, $size);
        $this->aspect = $aspect;
        $this->status = self::STATUS_READY;
    }

    /**
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function result()
    {
        return $this->result;
    }

    public function aspect()
    {
        return $this->aspect;
    }

    public function status()
    {
        return $this->status;
    }

    public function advance()
    {
        $this->status = RolledDie::STATUS_ADVANCED;

        return $this;
    }

    public function exhaust()
    {
        $this->status = RolledDie::STATUS_EXHAUSTED;

        return $this;
    }

    public function ready()
    {
        $this->status = RolledDie::STATUS_READY;

        return $this;
    }


}
