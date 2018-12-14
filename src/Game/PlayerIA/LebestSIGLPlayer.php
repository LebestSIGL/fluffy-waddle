<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author LouisFrancoisS
 */
class LebestSIGLPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;
    private $grudge = FALSE;
    private $count = 0;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        $en_choices = $this->result->getChoicesFor($this->opponentSide);
        $my_choices = $this->result->getChoicesFor($this->mySide);
        $last_my = $this->result->getLastChoiceFor($this->mySide);
        $last_en = $this->result->getLastChoiceFor($this->opponentSide);
        $my_score = $this->result->getLastScoreFor($this->mySide);
        $en_score = $this->result->getLastScoreFor($this->opponentSide);
        $my_last_score = $this->result->getLastScoreFor($this->mySide);
        $en_last_score = $this->result->getLastScoreFor($this->opponentSide);
        $round = $this->result->getNbRound();
        //$this->prettyDisplay();
        //printf($this->result->getStats($this->opponentSide));

        $always_foe = TRUE;
        $always_friend = TRUE;
        for ($x = 0; $x < count($en_choices); $x++ )
        {
            if ($en_choices[$x] != parent::friendChoice())
            {
                $always_friend = FALSE;
            }
            if ($en_choices[$x] != parent::foeChoice())
            {
                $always_foe = FALSE;
            }
        }
        
        //Always send back FOE
        /*if ($always_foe)
            return parent::friendChoice();*/
        if ($always_friend)
            return parent::foeChoice();

        if ($round == 0)
            $this->grudge = FALSE;   

        if ($last_en == parent::foeChoice())
            $this->grudge = TRUE;

        if ($this->grudge == TRUE)
            return parent::foeChoice();
        return parent::friendChoice();
        }
 
};
