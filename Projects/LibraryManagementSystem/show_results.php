<?php session_start();
$action = null;
if ($_SESSION['status'] == 1) {
    $heading = 'Search Results';
} else if ($_SESSION['status'] == 2) {
    $heading = 'None Book matchs your Search!';
} else if ($_SESSION['status'] == 3) {
    $heading = 'Exlplore Our Book Collection';
} else if ($_SESSION['status'] == 4) {
    $heading = 'Library Under Maintaince';
} else if ($_SESSION['status'] == 5) {
    $heading = 'Exlplore Our Book Collection';
    $action = 1;
} else if ($_SESSION['status'] == 6) {
    $heading = 'Choose Required Book';
    $action = 2;
}
// else if{

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.5/sweetalert2.min.css" integrity="sha512-OWGg8FcHstyYFwtjfkiCoYHW2hG3PDWwdtczPAPUcETobBJOVCouKig8rqED0NMLcT9GtE4jw6IT1CSrwY87uw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.5/sweetalert2.min.js" integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
            /* Center the table */
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            /* Center the table horizontally */
            /* max-width: auto; Set a maximum width to keep it compact */
        }

        table th,
        table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table td {
            font-size: 16px;
            color: #333;
        }

        /* Set specific column widths */
        th:first-child,
        td:first-child {
            max-width: 270px;
        }

        th:nth-child(2),
        td:nth-child(2) {
            max-width: 200px;
        }

        th:nth-child(3),
        td:nth-child(3) {
            max-width: 150px;
        }

        th:nth-child(4),
        td:nth-child(4) {
            max-width: 150px;
        }

        th:nth-child(5),
        td:nth-child(5) {
            max-width: 120px;
        }

        th:last-child,
        td:last-child {
            max-width: 120px;
        }

        button {
            font-size: 11px;
        }

        button:hover {
            /* border: none; */
            background-color: black;
            color: white;
        }

        @media (max-width: 768px) {
            table {
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>

    <h1 style="font-size: 24px; color: #222;"><?php echo isset($heading) ? $heading : "Explore Our Book Collection"; ?></h1>
    </h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <?php
        if (isset($_SESSION['books']) && !empty($_SESSION['books'])) {
            $books = $_SESSION['books'];
            foreach ($books as $book) {
                echo "<tr>";
                echo "<td>{$book['title']}</td>";
                echo "<td>{$book['author']}</td>";
                echo "<td>{$book['genre']}</td>";
                echo "<td>{$book['publication_year']}</td>";
                echo "<td>{$book['availability']}</td>";
                if ($action == 1) {
                    $action_pure = str_replace(' ', '%', $book['title']);
                    echo "<td><input type='button' onclick=\"removeB('{$action_pure}')\" name='removeB' value='Remove'></td>";
                } elseif ($action == 2 && $book['availability'] != 'Unavailable') {
                    $filename2 = 'borrows.txt';
                    $fileLines2 = file($filename2);
                    $id_num = count($fileLines2);
                    $id = '7eF' . $id_num;
                    $action_pure = str_replace(' ', '%', $book['title']);
                    echo "<td><input type='button' onclick=\"borrowB('{$action_pure}' , '{$id}')\" name='borrowB' value='Borrow'></td>";
                } else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No books found.</td></tr>";
        }
        ?>
    </table>
    <script>
        function removeB(bookName) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'action.php?removeBook=' + encodeURIComponent(bookName);
                    // Swal.fire({
                    //     title: "Deleted!",
                    //     text: "Your file has been deleted.",
                    //     icon: "success"
                    // });
                }
            });

        }

        function borrowB(bookName, id) {
            Swal.fire({
                title: "Your ID: " + id,
                text: "You can take this Book from our library. ID '" + id + "' provided by Us to you will be used when you give us back The Borrowed Book.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "I Understand, Continue"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'action.php?borrowBook=' + encodeURIComponent(bookName);

                }
            });
        }

        // var removeButtons = document.querySelectorAll('button.btns');
        // removeButtons.forEach(button => {
        //     button.addEventListener('click', function(event) {
        //         var bookName = button.getAttribute('data-book-name');
        //         event.preventDefault(); // Prevent the default form submission behavior
        //         window.location.href = 'action.php?removeB=1';
        //         return false;
        //     });
        // });
    </script>





</body>

</html>