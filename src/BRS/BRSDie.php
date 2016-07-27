<?php

namespace BRS;

class BRSDie
{
    /**
     * @var integer
     */
    private $faces;


    /**
     * BRSDie constructor.
     * @param $faces
     */
    public function __construct($faces)
    {
        $this->faces = $faces;
    }

    /**
     * @return int
     */
    public function faces()
    {
        return $this->faces;
    }


}
