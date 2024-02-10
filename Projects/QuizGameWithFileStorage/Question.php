<?php

class Question
{
    private $single_question;
    private $question;
    private $options;
    private $answer;

    public function __construct($single_question)
    {
        $this->single_question = $single_question;

        $this->question = current($this->single_question);
        $this->options = array_slice($this->single_question, 1, 4);
        $this->answer = end($this->single_question);
    }

    public function get_question()
    {
        return $this->question;
    }

    public function get_options()
    {
        return $this->options;
    }

}

// Example usage:
// $questionData = ["What is the capital of France?", "London", "Paris", "Rome", "Berlin" , "Berlin"];
// $question = new Question($questionData);
// echo $question->get_question() . "\n";
// print_r($question->get_options());
// echo $question->validate_and_comment("Paris") . "\n";
