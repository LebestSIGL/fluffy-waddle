<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class grudgePlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    private $grudge = FALSE;

    public function getChoice()
    {
        $last_en = $this->result->getLastChoiceFor($this->opponentSide);

        if ($last_en == parent::foeChoice())
            $this->grudge = TRUE;

        if ($this->grudge == TRUE)
            return parent::foeChoice();
        return parent::friendChoice();
    }
 
};