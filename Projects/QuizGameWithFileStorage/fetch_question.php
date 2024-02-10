<?php
include "Question.php";

function read_file_lines($file)
{
    $lines = [];
    $filename = fopen($file, 'r') or die('Unable To open File!');
    while (!feof($filename)) {
        $lines[] =  trim(fgets($filename));
    }
    fclose($filename);
    return $lines;
}
// funtion to split question by dilimiter |
function string_exploder($string)
{
    return explode('|', $string);
}




// ============================(main)============================
$Object_of_qstn = [];
$file = 'quiz.txt';
$data = read_file_lines($file);

for ($i = 0; $i < count($data); $i++) {
    $single_question = string_exploder($data[$i]);

    $qstn = new Question($single_question);

    $Object_of_qstn[] = $qstn; ///  may be it will be usefull 

    // Printing Questions
    $qstn->get_question();
    $options =  $qstn->get_options();
    echo '<h3>Question ' . $i + 1 . ':</h3>';
    echo '<p>'.$qstn->get_question() .'</p>';

    foreach ($options as $key => $option) {
        echo "<input type='radio' required name='q" . ($i + 1) . "' value='" . ($key + 1) . "'> $option <br>";
    }
    
}
echo '<input type="submit" name="submit" style="margin-top:20px;" value="Submit Answers">';




// $q1 = string_exploder($data[0]);
// echo "<pre>";
//    print_r($q1);
// echo "</pre>";