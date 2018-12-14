<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class TittatPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        $last_en = $this->result->getLastChoiceFor($this->opponentSide);
        if ($last_en == 0)
            return parent::friendChoice();
        return $last_en;
    }
 
};