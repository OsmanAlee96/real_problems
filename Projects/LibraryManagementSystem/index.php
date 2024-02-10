<!-- Library Management System

Your task is to develop a library management system using PHP OOP. Create classes for Book, Patron, and Library. Implement methods for adding, removing, and searching books, and handling borrowing/returning books. Utilize HTML forms for user interaction and display relevant messages for each action. Here's a sample output:


Welcome to the Library Management System!

Available Actions:
1. Add Book
2. Remove Book
3. Search Book
4. Borrow Book
5. Return Book
6. View All Book -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryManagementSystem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.5/sweetalert2.min.css" integrity="sha512-OWGg8FcHstyYFwtjfkiCoYHW2hG3PDWwdtczPAPUcETobBJOVCouKig8rqED0NMLcT9GtE4jw6IT1CSrwY87uw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.5/sweetalert2.min.js" integrity="sha512-WHVh4oxWZQOEVkGECWGFO41WavMMW5vNCi55lyuzDBID+dHg2PIxVufsguM7nfTYN3CEeQ/6NB46FWemzpoI6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style>
        input {
            display: block;
            margin: 20px 0;
            width: 140px;
            height: 40px;
        }

        input:hover {
            border: none;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <h2>Welcome to the Library Management System!</h2>
    </div>
    <form>
        <fieldset>
            <legend>Available Actions</legend>
            <input type="button" onclick="addBookPage();" name="addB" value="Add Book">
            <input type="button" onclick="removeBookPage();" name="removeB" value="Remove Book">
            <input type="button" onclick="searchBookPage();" name="searchB" value="Search Book">
            <input type="button" onclick="borrowBPage();" name="borrowB" value="Borrow Book">
            <input type="button" onclick="returnBookPage();" name="returnB" value="Return Book">
            <input type="button" onclick="viewAllBookPage();" name="viewAllB" value="View All Books">
        </fieldset>
    </form>
    <script>
        function addBookPage() {
            window.location.href = 'add_book.php';
            return false;
        }

        function searchBookPage() {
            window.location.href = 'search_book.php';
            return false;
        }

        function viewAllBookPage() {
            window.location.href = 'action.php?viewAllB=1';
            return false;
        }

        function returnBookPage() {
            Swal.fire({
                title: "Enter your ID",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "Process it",
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get the entered ID
                    const userId = result.value;
                    window.location.href = 'action.php?returnB=' + encodeURIComponent(userId);
                    return false;
                }
            });
        }


        function removeBookPage() {

            window.location.href = 'action.php?removeB=1';
            return false;
        }

        function borrowBPage() {
            window.location.href = 'action.php?borrowB=1';
            return false;
        }
    </script>

</body>

</html>