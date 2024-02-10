<!-- Quiz Game with File Storage

You are tasked with creating a PHP program for a quiz game using OOP. Your program should consist of a class called Question with properties such as question text, options, and correct answer. Implement methods to set and get these properties. Use file handling to store multiple questions. Utilize HTML forms to present questions to the user, allowing them to select answers. Validate the user's answers and keep score.  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizGameWithFileStorage</title>
    <style>
        p {
            margin: 0px 0 7px 0
        }

        h3 {
            margin: 10px 0 6px 0;
        }

        #test {
            display: none;
        }
    </style>
    <script>
        function hideButton() {
            document.getElementById('startButton').style.display = 'none';
            document.getElementById('test').style.display = 'block';
        }
    </script>
</head>

<body>
    <button id="startButton" type="submit" onclick="hideButton()">Start Quiz</button>
    <form id="test" action="validateResult.php" method="post">
        <?php include "fetch_question.php" ?>
    </form>

</body>

</html>