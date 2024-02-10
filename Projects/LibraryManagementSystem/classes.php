<?php

class BookManagment
{
    private $title;
    private $author;
    private $genre;
    private $publication_year;

    // private  $book_object;


    private function string_exploder($string)
    {
        return explode('|', $string);
    }

    // public function SingleAvailableBookAssosArray()
    // {
    //     $filename = fopen('books.txt', 'r');
    //     while (!feof($filename)) {
    //         $bookDetails = $this->string_exploder(trim(fgets($filename)));

    //         $book = array(
    //             "title" => $bookDetails[0],
    //             "author" => $bookDetails[1],
    //             "genre" => $bookDetails[2],
    //             "publication_year" => $bookDetails[3],
    //             "availability" => $bookDetails[4]
    //         );

    //         $book_object = $book;
    //     }
    //     fclose($filename);
    // }

    public function GetAllBooksObjectsInArray()
    {
        $allBooks = [];
        $filename = fopen('books.txt', 'r');

        if ($filename) {
            while (($line = fgets($filename)) !== false) {
                $bookDetails = $this->string_exploder(trim($line));

                if (count($bookDetails) === 5) {
                    $allBooks[] = [
                        "title" => $bookDetails[0],
                        "author" => $bookDetails[1],
                        "genre" => $bookDetails[2],
                        "publication_year" => $bookDetails[3],
                        "availability" => $bookDetails[4]
                    ];
                } else {
                    echo "Invalid book data: $line";
                }
            }
            fclose($filename);
        }

        return $allBooks;
    }


    public function checkBookAvailibility($name, $authr)
    {
        $name = trim($name);
        $authr = trim($authr);

        $temp = $this->GetAllBooksObjectsInArray();
        for ($i = 0; $i < count($temp); $i++) {
            if (strtolower($temp[$i]['title']) === strtolower($name) && strtolower($temp[$i]['author']) === strtolower($authr)) {
                return $temp[$i];
            }
        }
        // echo "<pre>";
        // print_r($temp);
        // echo "</pre>";
        return null;
    }
    public function checkBookAvailibilityUsingSingleArgument($name_or_authr)
    {
        $name_or_authr = trim($name_or_authr);

        $temp = $this->GetAllBooksObjectsInArray();
        for ($i = 0; $i < count($temp); $i++) {
            if (strtolower($temp[$i]['title']) == strtolower($name_or_authr) || strtolower($temp[$i]['author']) == strtolower($name_or_authr)) {
                $results[] = $temp[$i];
            }
        }
        // echo "<pre>";
        // print_r($temp);
        // echo "</pre>";
        if (!empty($results)) {
            return $results;
        } else {
            return null;
        }
    }
    public function searchByTwoParams($key, $value)
    {
        $key = trim($key);
        $value = trim($value);

        $temp = $this->GetAllBooksObjectsInArray();
        for ($i = 0; $i < count($temp); $i++) {
            if (strtolower($temp[$i][$key]) === strtolower($value)) {
                $results[] = $temp[$i];
            }
        }
        if (!empty($results)) {
            return $results;
        } else {
            return null;
        }
    }

    public function addBook($title, $author, $genre, $publication_year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->publication_year = $publication_year;

        if ($this->checkBookAvailibility($this->title, $this->author) == null) {
            $bookDetails = $this->title . '|' . $this->author . '|' . $this->genre . '|' . $this->publication_year . '|Available' . PHP_EOL;

            $file = fopen('books.txt', 'a') or die('Unable To open File!');
            fwrite($file, $bookDetails);
            fclose($file);
            return true;
        } else {
            return false;
        }
    }
}
// $b = new BookManagment();
// if ($b->searchByTwoParams('author' , 'Osman Alee ') != null) {
//     $x = $b->searchByTwoParams('availability' , 'Available ');
//     echo "<pre>";
//     print_r($x);
//     echo "</pre>";
// } else {
//     echo "No";
// }
// if ($b->GetAllBooksObjectsInArray()) {
//     echo "No";
// } else {
//     echo "yes";
// }
//  if ($b->checkBookAvailibility(' To Kill a Mockingbird       ','     Harper Lee') == null) {
//     echo "Not found!";
//  }else{
//     echo "Yes Available!";
//  }
// echo "<pre>";
// print_r($this->Book_object);
// echo "</pre>";
