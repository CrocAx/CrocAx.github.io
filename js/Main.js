const squares = document.querySelectorAll('.square');
const resultElement = document.querySelector('#result');
const resetButton = document.querySelector('#reset-button');
let xIsNext = true;

function handleClick(event) {
  const square = event.target;
  const currentText = square.textContent;

  if (currentText === 'X' || currentText === 'O') {
    return;
  }

  square.textContent = xIsNext ? 'X' : 'O';
  xIsNext = !xIsNext;

  checkForWin();
}

function checkForWin() {
  const winningCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ];

  let isWin = false;

  for (const combination of winningCombinations) {
    const [a, b, c] = combination;
    const squareA = squares[a];
    const squareB = squares[b];
    const squareC = squares[c];

    if (squareA.textContent === '') {
      continue;
    }

    if (squareA.textContent === squareB.textContent &&
        squareA.textContent === squareC.textContent) {
      resultElement.textContent = `${squareA.textContent} won!`;
      isWin = true;
      break;
    }
  }

  if (!isWin && Array.from(squares).every(square => square.textContent !== '')) {
    resultElement.textContent = 'Draw!';
  }

  if (isWin || Array.from(squares).every(square => square.textContent !== '')) {
    Array.from(squares).forEach(square => square.removeEventListener('click', handleClick));
  }
}

function resetBoard() {
  Array.from(squares).forEach(square => {
    square.textContent = '';
    square.addEventListener('click', handleClick);
  });

  xIsNext = true;
  resultElement.textContent = '';
}

Array.from(squares).forEach(square => square.addEventListener('click', handleClick));
resetButton.addEventListener('click', resetBoard);

//Background

function changeBackgroundColor() {
    const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#00ffff', '#ff00ff'];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    document.body.style.backgroundColor = randomColor;
  }

  setInterval(changeBackgroundColor, 1000);

  // Function to update the score in session storage
function updateScore(result) {
    let xScore = sessionStorage.getItem("xScore") || 0;
    let oScore = sessionStorage.getItem("oScore") || 0;
    
    if (result === "X") {
      xScore++;
      sessionStorage.setItem("xScore", xScore);
    } else if (result === "O") {
      oScore++;
      sessionStorage.setItem("oScore", oScore);
    }
  }
  
  // Function to display the score from session storage
  function displayScore() {
    let xScore = sessionStorage.getItem("xScore") || 0;
    let oScore = sessionStorage.getItem("oScore") || 0;
    
    document.querySelector("#x-score").textContent = xScore;
    document.querySelector("#o-score").textContent = oScore;
  }
  
  // Call the displayScore function to show the score on page load
  displayScore();
  
  // Call the updateScore function when a player wins or there is a draw
  if (result === "X" || result === "O" || result === "Draw") {
    updateScore(result);
  }
  