<!-- Prompt: Create a LogEntry class with a constructor that takes a message and time. Implement a destructor that writes the message and time to a log file using PHP's fopen and fwrite functions. -->
<?php
include('class.php');
if (isset($_POST['addBtn'])) {
    $msg = $_POST['msg'];
    // echo $msg;
    // make Obj  
    $writeLog = new LogEntry($msg);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogEntry</title>
    <style>
        * {
            outline: none;
            border: none;
            margin: 0px;
            padding: 0px;
            font-family: Courier, monospace;
        }

        body {
            background: #333 url(https://static.tumblr.com/maopbtg/a5emgtoju/inflicted.png) repeat;
        }

        #paper {
            color: #FFF;
            font-size: 20px;
        }

        #margin {
            margin-left: 12px;
            margin-bottom: 20px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        #text {
            width: 650px;
            overflow: hidden;
            background-color: #FFF;
            color: #222;
            font-family: Courier, monospace;
            font-weight: normal;
            font-size: 16px;
            resize: none;
            line-height: 25px;
            padding-left: 40px;
            padding-right: 40px;
            padding-top: 45px;
            padding-bottom: 34px;
            background-image: url(https://static.tumblr.com/maopbtg/E9Bmgtoht/lines.png), url(https://static.tumblr.com/maopbtg/nBUmgtogx/paper.png);
            background-repeat: repeat-y, repeat;
            -webkit-border-radius: 12px;
            border-radius: 12px;
            -webkit-box-shadow: 0px 2px 14px #000;
            box-shadow: 0px 2px 14px #000;
            border-top: 1px solid #FFF;
            border-bottom: 1px solid #FFF;
        }

        #title {
            background-color: transparent;
            border-bottom: 3px solid #FFF;
            color: #FFF;
            font-size: 20px;
            font-family: Courier, monospace;
            /* height: 28px; */
            font-weight: bold;
            width: 100%;
            min-height: 100px;
        }

        #button {
            cursor: pointer;
            margin-bottom: 50px;
            float: right;
            height: 40px;
            padding-left: 24px;
            padding-right: 24px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 20px;
            color: #FFF;
            text-shadow: 0px -1px 0px #000000;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            border-top: 1px solid #FFF;
            -webkit-box-shadow: 0px 2px 14px #000;
            box-shadow: 0px 2px 14px #000;
            background-color: #62add6;
            background-image: url(https://static.tumblr.com/maopbtg/ZHLmgtok7/button.png);
            background-repeat: repeat-x;
        }

        #button:active {
            zoom: 1;
            filter: alpha(opacity=80);
            opacity: 0.8;
        }

        #button:focus {
            zoom: 1;
            filter: alpha(opacity=80);
            opacity: 0.8;
        }

        #wrapper {
            width: 700px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 24px;
            margin-bottom: 100px;
        }

        #text p {
            padding-top: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #c4c4c4;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <form id="paper" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

            <div id="margin"><textarea placeholder="Enter Message Here" id="title" type="text" name="msg"></textarea></div>

            <br>
            <input id="button" type="submit" name="addBtn" value="Add to File">

        </form>
        <div id="text" name="text" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; min-height: 160px; position: relative; ">
            <span style="position: absolute;
            top: 4px;
            background: black;
            color: white;
            left: 10px;
            border-radius: 23px;
            padding: 4px 10px;">MyFile.txt</span>

            <!-- ================================== -->
            <?php
            $file = 'logs.txt';
            $aws = file($file);
            // echo count($aws);
            for ($i = 0; $i < count($aws); $i++) {  ?>
                <p><?php echo $aws[$i]; ?></p>
            <?php  } ?>

        </div>
    </div>
</body>

</html>