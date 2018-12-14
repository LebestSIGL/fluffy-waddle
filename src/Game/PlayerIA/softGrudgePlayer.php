<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author FlorentD
 */
class softGrudgePlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    private $grudge = FALSE;
    private $count = 0;

    public function getChoice()
    {
        $last_en = $this->result->getLastChoiceFor($this->opponentSide);

        if ($last_en == parent::foeChoice())
        {
            $this->count = 0;
            $this->grudge = TRUE;
        }

        if ($this->grudge == TRUE)
            {
                $this->count++;
                if ($this->count > 3)
                {
                    $this->count = 0;
                    $this->grudge = FALSE;
                    return parent::friendChoice();
                }
                return parent::foeChoice();
            }
        return parent::friendChoice();
    }
 
};