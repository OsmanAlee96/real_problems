<?php
class DiceRoller
{
    // rand(min,max);
    private $dice1 = null;
    private $dice2 = null;
    private function generate_random()
    {
        return rand(1, 6);
    }

    public function rollDice()
    {
        $this->dice1 = $this->generate_random();
        $this->dice2 = $this->generate_random();

        $total = $this->dice1 + $this->dice2;
        if ($total < 6) {
            $msg = 'You earned too low score (" _ ")';
        }elseif($total < 10){
            $msg = 'Intermadiate Score, Best try (" , ")';
        }else{
            $msg = 'Waoo Great Score (" - ")';
        }
        if ($this->dice1 === $this->dice2) {
            $msg = 'Double Occours!';
        }


        return array($msg , $this->dice1, $this->dice2);
    }
}

// $dice_roller  = new DiceRoller;
// $x = $dice_roller->rollDice();
// echo '<pre>';
// print_r($x);
// echo '</pre>';
