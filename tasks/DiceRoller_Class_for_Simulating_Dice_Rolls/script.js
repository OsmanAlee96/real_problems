function rollDiceWithFaces(activeFace1, activeFace2, msg) {
  const firstDice = document.getElementById("dice1");
  const msgBox2 = document.getElementById("msgBox2");
  const msgBox1 = document.getElementById("msgBox1");
  const secondDice = document.getElementById("dice2");
  const rollBtn = document.getElementById("rollBtn");
  const resetBtn = document.getElementById("resetBtn");

  const getActiveFace = () => {
    return Math.floor(Math.random() * 6) + 1;
  };

  const faceArray = [1, 2, 3, 4, 5, 6];

  const rollBothDice = () => {
    let rollCount = 0;
    const rollInterval = 100;

    const rollIntervalId = setInterval(() => {
      const randomFace1 = getActiveFace();
      const randomFace2 = getActiveFace();

      faceArray.forEach((x) => {
        x === randomFace1
          ? firstDice.classList.add(`show-${x}`)
          : firstDice.classList.remove(`show-${x}`);

        x === randomFace2
          ? secondDice.classList.add(`show-${x}`)
          : secondDice.classList.remove(`show-${x}`);
      });

      rollCount++;

      if (rollCount >= 10) {
        clearInterval(rollIntervalId);
        // Show the final face
        faceArray.forEach((x) => {
          x === activeFace1
            ? firstDice.classList.add(`show-${x}`)
            : firstDice.classList.remove(`show-${x}`);

          x === activeFace2
            ? secondDice.classList.add(`show-${x}`)
            : secondDice.classList.remove(`show-${x}`);
        });
        msgBox2.innerHTML = msg;
        msgBox1.innerHTML = `You got : ${activeFace1} & ${activeFace2}`;
        resetBtn.style.display = "block";
      }
    }, rollInterval);
  };
  rollBtn.style.display = "none";
  rollBothDice();
}
function reloadPage() {
  window.location.href = "index.php";
}
