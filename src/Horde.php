<?php

class Horde
{
    const D4 = 'd4';
    const D6 = 'd6';
    const D8 = 'd8';
    const D10 = 'd10';

    /**
     * @var array
     */
    private $dicePool = [
        self::D4  => 4,
        self::D6 => 4,
        self::D8 => 4,
        self::D10 => 4
    ];

    /**
     * @return integer
     */
    public function d4()
    {
        return $this->dicePool[self::D4];
    }

    /**
     * @return integer
     */
    public function d6()
    {
        return $this->dicePool[self::D6];
    }

    /**
     * @return integer
     */
    public function d8()
    {
        return $this->dicePool[self::D8];
    }

    /**
     * @return integer
     */
    public function d10()
    {
        return $this->dicePool[self::D10];
    }

    /**
     * @return $this
     */
    public function upgrade()
    {
        foreach($this->dicePool as $diceSize => $qty)
        {
            $this->dicePool[$diceSize] = $qty + 1;
        }

        return $this;
    }

    /**
     * @param $dice
     * @return $this
     */
    public function removeDice($dice)
    {
        foreach($dice as $removingDiceType => $removingDice)
        {
            if (isset($this->dicePool[$removingDiceType])){
                $this->dicePool[$removingDiceType] -= $removingDice;
            }
        }

        return $this;
    }
}
