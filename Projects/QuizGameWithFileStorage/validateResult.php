<?php
include "Question.php";

class Calculate_results
{
    private $score = 0;
    
    public function validate_and_comment($user_answers, $correct_answers)
    {
        for ($i = 0; $i < count($correct_answers); $i++) {
            if ($user_answers[$i] === $correct_answers[$i]) {
                $this->score++;
            }
        }
        return $this->score;
    }
}

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answers = [];
    for ($i = 0; $i < 5; $i++) {
        $user_answers[$i] = $_POST['q' . $i+1];
    }

    $correct_answers = ['2', '3', '1', '3', '2']; 

    $results_calculator = new Calculate_results();
    $user_score = $results_calculator->validate_and_comment($user_answers, $correct_answers);

    echo "<h5>Your score: $user_score";
}

