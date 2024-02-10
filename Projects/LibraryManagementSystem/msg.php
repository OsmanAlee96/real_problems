<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Added Successfully!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }

        .message-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .message-title {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .message-body {
            font-size: .8em;
            line-height: 1.5;
        }

        .message-body a {
            color: #007bff;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .message-body a:hover {
            color: #0056b3;
        }

        .message-body a i {
            margin-left: 2px;
            font-size: 10px;
        }

        @media (max-width: 768px) {
            .message-container {
                padding: 20px;
            }

            .message-title {
                font-size: 1.5em;
            }

            .message-body {
                font-size: 1em;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get URL parameter 'status'
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');

            // Set message based on status
            let msg = '';
            if (status === '1') {
                msg = 'Book added successfully!';
            }else if (status === '2') {
                msg = 'Book is already Available!';
            }else if (status === '4') {
                msg = 'Error : In Providing Book';
            }else if (status === '3') {
                msg = 'Congratulation! Book Borrowed Successfully!';
            }

            // Set message text in the HTML
            document.querySelector('.message-title').textContent = msg;
        });
    </script>
</head>

<body>
    <div class="message-container">
        <h1 class="message-title"></h1>
        <p class="message-body"><a href="index.php">Back to Home Page <i class="fas fa-arrow-right"></i></a></p>
    </div>
</body>

</html>
