<script>
        var arr = <?php echo json_encode($results); ?>;
        if (Array.isArray(arr) && arr.length > 0) {
            var copiedArray = [...arr];
            arr = null;
            const firstDice = document.getElementById('dice1');
            const secondDice = document.getElementById('dice2');
            // console.log(copiedArray);

            const getFace = () => {
                return Math.floor(Math.random() * 6) + 1;
            };

            const getActiveFace = () => {
                return getFace();
            };

            const faceArray = [1, 2, 3, 4, 5, 6];

            const rollBothDice = () => {
                const activeFace1 = copiedArray[1];
                const activeFace2 = copiedArray[2];

                let rollCount = 0;
                const rollInterval = 100; 

                const rollIntervalId = setInterval(() => {
                    const randomFace1 = copiedArray[2];
                    const randomFace2 = copiedArray[1];

                    faceArray.forEach((x) => {
                        x === randomFace1 ?
                            firstDice.classList.add(`show-${x}`) :
                            firstDice.classList.remove(`show-${x}`);

                        x === randomFace2 ?
                            secondDice.classList.add(`show-${x}`) :
                            secondDice.classList.remove(`show-${x}`);
                    });

                    rollCount++;

                    // Stop rolling after a certain number of iterations (adjust as needed)
                    if (rollCount >= 10) {
                        clearInterval(rollIntervalId);
                        // Show the final face
                        faceArray.forEach((x) => {
                            x === activeFace1 ?
                                firstDice.classList.add(`show-${x}`) :
                                firstDice.classList.remove(`show-${x}`);

                            x === activeFace2 ?
                                secondDice.classList.add(`show-${x}`) :
                                secondDice.classList.remove(`show-${x}`);
                        });
                    }
                }, rollInterval);
            };


            rollBothDice();
        }
    </script>