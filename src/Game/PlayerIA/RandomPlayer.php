<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class RandomPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    protected $array;

    public function getChoice()
    {
        $round = $this->result->getNbRound();
        if ($round == 0)
            for ($x = 0; $x < 10; $x++)
                $this->array[$x] = mt_rand(1, 2) === 1 ? parent::friendChoice(): parent::foeChoice();
        //return mt_rand(1, 2) === 1 ? parent::foeChoice(): parent::foeChoice();
        return $this->array[$round];

    }
 
};