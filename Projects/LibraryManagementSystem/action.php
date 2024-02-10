<?php
session_start();
include "classes.php";
// include "";
$status = null;

if (isset($_POST['addB']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location :add_book.php');
}

if (isset($_POST['addBookBtn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];


    if (empty($title) || empty($author) || empty($genre) || empty($publication_year)) {

        echo "Please fill in all required fields.";
    } else {
        $book = new BookManagment();

        if ($book->addBook($title, $author, $genre, $publication_year)) {
            $status = 1;
        } else {
            $status = 2;
        }
    }
    header("Location: msg.php?status=" . $status);
}
if (isset($_POST['searchBookBtn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title_or_author = $_POST['title_or_author'];
    $_SESSION['books'] = null;
    $_SESSION['status'] = null;

    if (empty($title_or_author)) {

        echo "Please fill in all required fields.";
    } else {
        $searchBook = new BookManagment();

        if ($searchBook->checkBookAvailibilityUsingSingleArgument($title_or_author) != null) {
            $results = $searchBook->checkBookAvailibilityUsingSingleArgument($title_or_author);
            // echo "<pre>";
            // print_r($results);
            // echo "</pre>";
            $_SESSION['books'] = $results;
            $_SESSION['status'] = 1;
        } else {
            $_SESSION['status'] = 2;
        }
        header("Location: show_results.php");
        exit;
    }
}
if (isset($_GET['viewAllB'])) {
    $_SESSION['books'] = null;
    $_SESSION['status'] = null;


    $view_all_book = new BookManagment();

    if ($view_all_book->GetAllBooksObjectsInArray() != null) {
        $results = $view_all_book->GetAllBooksObjectsInArray();
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>";
        $_SESSION['books'] = $results;
        $_SESSION['status'] = 3;
    } else {
        $_SESSION['status'] = 4;
    }
    header("Location: show_results.php");
    exit;
}
if (isset($_GET['removeB'])) {

    $view_all_book = new BookManagment();

    if ($view_all_book->GetAllBooksObjectsInArray() != null) {
        $results = $view_all_book->GetAllBooksObjectsInArray();

        $_SESSION['books'] = $results;
        $_SESSION['status'] = 5;
    } else {
        $_SESSION['status'] = 4;
    }
    header("Location: show_results.php");
    exit;
}
if (isset($_GET['removeBook'])) {
    // $_SESSION['books'] = null;
    // $_SESSION['status'] = null;
    $bookName = $_GET['removeBook'];
    $bookName = str_replace('%', ' ', $bookName);
    $view_all_book = new BookManagment();
    if ($view_all_book->GetAllBooksObjectsInArray() != null) {
        $results = $view_all_book->GetAllBooksObjectsInArray();
        $line_number = 0;

        foreach ($results as $result) {
            if ($result['title'] == $bookName) {
                break;
            }
            $line_number++;
        }
        $filename = 'books.txt';
        $fileLines = file($filename); // sore lines in arr
        if (isset($fileLines[$line_number])) {
            unset($fileLines[$line_number]); // remove arr index
            $fopen = fopen($filename, 'w') or die("Unable to open file!");
            for ($i = 0; $i < count($fileLines); $i++) {
                if ($i != $line_number) {
                    fwrite($fopen, $fileLines[$i]);
                    echo $i . "<br>";
                }
            }
            $resultss = $view_all_book->GetAllBooksObjectsInArray();
            $_SESSION['books'] = $resultss;
            $_SESSION['status'] = 3;
        } else {
            $_SESSION['status'] = 4;
        }
    } else {
        $_SESSION['status'] = 4;
    }
    header("Location: show_results.php");
    exit;
}
if (isset($_GET['borrowB'])) {

    $view_all_book = new BookManagment();

    if ($view_all_book->GetAllBooksObjectsInArray() != null) {
        $results = $view_all_book->GetAllBooksObjectsInArray();

        $_SESSION['books'] = $results;
        $_SESSION['status'] = 6;
    } else {
        $_SESSION['status'] = 4;
    }
    header("Location: show_results.php");
    exit;
}

if (isset($_GET['borrowBook'])) {
    $filename2 = 'borrows.txt';
    $fileLines2 = file($filename2);
    $id_num = count($fileLines2);
    $id = '7eF' . $id_num;
    $bookName = $_GET['borrowBook'];
    $bookName = str_replace('%', ' ', $bookName);

    $view_all_book = new BookManagment();
    if ($view_all_book->GetAllBooksObjectsInArray() != null) {
        $results = $view_all_book->GetAllBooksObjectsInArray();
        $line_number = 0;

        foreach ($results as $result) {
            if ($result['title'] == $bookName) {
                break;
            }
            $line_number++;
        }
        $filename = 'books.txt';
        $fileLines = file($filename);
        if (isset($fileLines[$line_number])) {
            $to_array = explode('|', $fileLines[$line_number]);
            $to_array[count($to_array) - 1] = 'Unavailable' . PHP_EOL;
            $to_str = implode('|', $to_array);
            $fileLines[$line_number] = $to_str;

            $fopen = fopen($filename, 'w') or die("Unable to open file!");
            for ($i = 0; $i < count($fileLines); $i++) {
                fwrite($fopen, $fileLines[$i]);
            }
            $fopen2 = fopen($filename2, 'a') or die("Unable to open file!");
            $line = $id . '|' . $bookName . PHP_EOL;
            fwrite($fopen2, $line);
            fclose($fopen);
            fclose($fopen2);

            $status = 3;
        } else {
            $status = 4;
        }
    } else {
        $status = 4;
    }
    header("Location: msg.php?status=" . $status);
    exit;
}
if (isset($_GET['returnB'])) {

    $given_id = $_GET['returnB'];
    $line_no = null;
    $file = 'borrows.txt';
    $filelines = file($file);
    $bookN = null;
    if (!$filelines) {
        $status = 5;
    } else {
        for ($i = 0; $i < count($filelines); $i++) {
            $to_array = explode('|', $filelines[$i]);

            if ($to_array[0] == $given_id) {
                $line_no = $i;
                $bookN = $to_array[1];
                $bookN = trim($bookN);
                // echo $line_no;
            }
        }
        if ($line_no !== null) {
            if (isset($filelines[$line_no])) {
                unset($filelines[$line_no]);

                $fopen = fopen($file, 'w') or die("Unable to open file!");

                for ($i = 0; $i < count($filelines); $i++) {
                    fwrite($fopen, $filelines[$i] . PHP_EOL);
                }
                $filename2 = 'books.txt';
                $lines = file($filename2);

                for ($i = 0; $i <  count($lines); $i++) {
                    $index = str_replace(' ', '&', $lines[$i]);
                    echo $index . '<br>';
                    $bookN = str_replace(' ', '&', $bookN);
                    echo $bookN . '<br>';
                    $is_present = strpos($index, $bookN);
                    // echo $is_present ;
                    if ($is_present === 0) {
                        echo 'yes';
                        echo $i;
                        break;
                    }
                }
            }
        } else {
        }
    }



    // $view_all_book = new BookManagment();

    // if ($view_all_book->GetAllBooksObjectsInArray() != null) {
    //     $results = $view_all_book->GetAllBooksObjectsInArray();

    //     $_SESSION['books'] = $results;
    //     $_SESSION['status'] = 6;
    // } else {
    //     $_SESSION['status'] = 4;
    // }
    // header("Location: show_results.php");
    // exit;
}
