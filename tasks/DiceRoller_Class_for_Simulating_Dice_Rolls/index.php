<!-- Design a DiceRoller class that simulates rolling two dice. When both dice show the same value, print "Doubles!". Use ternary operators to determine the appropriate output.
Example: new DiceRoller()->rollDice(); might print "You rolled 3 and 3. Doubles!" -->
<?php include "class.php";
if (isset($_POST['roll_btn'])) {
    $dice_roller  = new DiceRoller;
    $results = $dice_roller->rollDice();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiceRoller</title>
    <style>
        :root {
            --skeleton-color: #fff7ea;
            --skeleton-shadow: #867556;
        }

        body {
            margin: 5px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100vw;
            height: 99vh;
            max-height: 99vh;
            font-family: 'Luckiest Guy', cursive;
            letter-spacing: 2px;
            overflow: hidden;
            text-align: center;
            background: radial-gradient(circle, rgba(27, 27, 27, 1) 0%, rgba(0, 0, 0, 1) 100%);
            color: #f1f1f1;
        }

        header {
            padding: 10px 0;
            font-size: 34px;
        }

        div.small {
            font-size: 20px;
            font-family: 'Oswald', sans-serif;
        }

        span.value {
            color: lightgreen;
            font-size: 22px;
            font-family: 'Luckiest Guy', cursive;

        }

        div.content-container {
            width: 90%;
            height: 75%;
            border-radius: 2%;
            border: 4px solid rgba(254, 97, 0, 1)
        }

        div.dice-container {
            display: flex;
            width: 100%;
            height: 100%;
            padding-top: 40px;
            justify-content: center;
            column-gap: 40px;
            aspect-ratio: 1 / 1;
            border-radius: 50%;
        }

        div.dice {
            cursor: pointer;
            align-items: center;
            display: grid;
            width: 120px;
            height: 120px;
            aspect-ratio: 1 / 1;

            justify-items: center;
            position: relative;
            border-radius: 2%;
        }

        div.dice-face-group {
            display: grid;
            width: 100%;
            height: 100%;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            transform-style: preserve-3d;
            transition: transform .75s ease-out;

        }

        div.dice .show-1 {
            transform: rotateX(270deg) rotateY(720deg) rotateZ(360deg);
        }


        div.dice .show-2 {
            transform: rotateX(360deg) rotateY(720deg) rotateZ(360deg);
        }

        div.dice .show-3 {
            transform: rotateX(360deg) rotateY(810deg) rotateZ(360deg);
        }


        div.dice .show-4 {
            transform: rotateX(360deg) rotateY(630deg) rotateZ(360deg);
        }


        div.dice .show-5 {
            transform: rotateX(360deg) rotateY(900deg) rotateZ(360deg);

        }


        div.dice .show-6 {
            transform: rotateX(450deg) rotateY(720deg) rotateZ(360deg);

        }

        div.face {
            display: grid;
            justify-items: center;
            align-items: center;
            grid-column: 1;
            grid-row: 1;
            width: 100%;
            background-color: var(--skeleton-color);
            box-shadow: inset -4px -4px 14px var(--skeleton-shadow);

            grid-template-areas:
                "a . c"
                "e g f"
                "d . b";
        }

        div.face.two {
            display: flex;
            flex-direction: column;
            align-items: center;
            transform: rotate3d(0, 0, 0, 90deg) translateZ(60px);

        }

        div.face:nth-child(2) {
            transform: rotate3d(1, 0, 0, 90deg) translateZ(60px);

        }

        div.face:nth-child(3) {
            transform: rotate3d(0, -1, 0, 90deg) translateZ(60px);
        }

        div.face:nth-child(4) {
            transform: rotate3d(0, 1, 0, 90deg) translateZ(60px);
        }

        div.face:nth-child(5) {
            transform: rotate3d(1, 0, 0, 180deg) translateZ(60px);
            box-shadow: inset 4px 4px 14px var(--skeleton-shadow);

        }

        div.face:nth-child(6) {
            transform: rotate3d(-1, 0, 0, 90deg) translateZ(60px);
        }


        div.dot {
            width: 55%;
            height: 55%;
            background-color: black;
            border-radius: 50%;
        }

        div.dot:nth-child(2) {
            grid-area: b;
        }

        div.dot:nth-child(3) {
            grid-area: c;
        }

        div.dot:nth-child(4) {
            grid-area: d;
        }

        div.dot:nth-child(5) {
            grid-area: e;
        }

        div.dot:nth-child(6) {
            grid-area: f;
        }

        div.dot:nth-child(odd):last-child {
            grid-area: g;
        }


        div.row.eye-row {
            margin-top: 15%;
            justify-content: space-between;
            width: 80%;
            height: 30%;
        }

        div.nose {
            width: 15%;
            height: 26%;
            border-radius: 100%;
            background-color: black;
            clip-path: polygon(29.8% 100%, 50% 88%, 70% 100%, 90% 90%, 100% 65%, 80% 30%, 50.3% 0%, 20% 30%, 0% 65%, 10% 90%);

        }

        div.row.teeth-row {
            width: 100%;
            height: 30%;
            display: flex;
            align-items: flex-end;
            border-collapse: collapse;
            justify-content: center;
        }

        div.tooth {
            border-left: 2px solid black;
            width: 10%;
            height: 55%;
        }

        div.tooth:last-child {
            border-right: 2px solid black;

        }



        div.eye {
            height: 100%;
            width: 35%;
            background-color: black;
            border-radius: 50%;
        }

        div.row {
            display: flex
        }

        @media screen and (min-width: 700px) {

            div.content-container {
                max-width: 45%;
            }

            div.dice-container {
                column-gap: 45px;
            }

        }

        input {
            padding: 3px 30px;
            font-size: 29px;
            font-family: inherit;
            text-transform: capitalize;
            color: black;
            font-weight: 800;
            background: var(--skeleton-color);
            border: none;
            outline: none;
            border-radius: 5px;
        }

        .abs {
            position: absolute;
            top: 70%;
        }
        #resetBtn{
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div>Click dice to roll</div>
    </header>
    <div class="content-container">
        <div class="small">
            <span id="msgBox1" class="total value"></span>
            <div id="msgBox2" class="double skelly">

            </div>
        </div>
        <div class="dice-container " style="position: relative;">
            <div class="dice">
                <div class="dice-face-group" id="dice1">

                    <div class="face two">
                        <div class="eye-row row">
                            <div class="eye"></div>
                            <div class="eye"></div>
                        </div>
                        <div class="nose"></div>
                        <div class="teeth-row row">
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                        </div>
                    </div>
                    <div class="face one">
                        <div class="dot"></div>
                    </div>
                    <div class="face three">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="face four">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="face five">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="face six">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>

                    </div>
                </div>
            </div>
            <div class="dice">
                <div class="dice-face-group" id="dice2">

                    <div class="face two">
                        <div class="eye-row row">
                            <div class="eye"></div>
                            <div class="eye"></div>
                        </div>
                        <div class="nose"></div>
                        <div class="teeth-row row">
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                            <div class="tooth"></div>
                        </div>
                    </div>

                    <div class="face one">
                        <div class="dot"></div>
                    </div>

                    <div class="face three">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                    <div class="face four">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                    <div class="face five">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                    <div class="face six">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
            <div class="abs">
                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="submit" id="rollBtn" name="roll_btn" value="roll">
                    <input type="submit" onclick="reloadPage();" id="resetBtn" name="resetBtn" value="Reset">
                </form>
            </div>
        </div>

    </div>
    <script src="script.js"></script>
    <script>
        var arr = <?php echo json_encode($results); ?>;
        if (Array.isArray(arr) && arr.length > 0) {
            var copiedArray = [...arr];
            arr = null;
            rollDiceWithFaces(copiedArray[1], copiedArray[2], copiedArray[0]);
        }
    </script>





</body>

</html>