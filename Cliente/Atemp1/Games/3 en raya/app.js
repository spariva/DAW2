//Creating a tic tac toe game using node.js 
const prompt = require('prompt-sync')();
let gameBoard = [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '];
let currentPlayer = 'X';
let gameActive = true;

// Concatenation works worse than interpolation due to the fact that it is more difficult to read and understand.
// function printBoard() {
//     console.log(gameBoard[0] + '|' + gameBoard[1] + '|' + gameBoard[2]);
//     console.log(gameBoard[3] + '|' + gameBoard[4] + '|' + gameBoard[5]);
//     console.log(gameBoard[6] + '|' + gameBoard[7] + '|' + gameBoard[8]);
// }

function printBoard() {
  console.log(`
      ${gameBoard[0]} | ${gameBoard[1]} | ${gameBoard[2]}
      ---------
      ${gameBoard[3]} | ${gameBoard[4]} | ${gameBoard[5]}
      ---------
      ${gameBoard[6]} | ${gameBoard[7]} | ${gameBoard[8]}
    `);
}

function handleMove(position) {
  if (gameBoard[position] === ' ') {
    gameBoard[position] = currentPlayer;
  } else {
    console.log('You can´t go there!');
    return false;
  }

  if (checkWin()) {
    printBoard();
    console.log(`Player ${currentPlayer} wins!`);
    gameActive = false;
    return true;
  }

  if (gameBoard.includes(' ')) {
    printBoard();
    console.log('The game is a tie!');
    gameActive = false;
    return true;
  }

  currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
}

function checkWin() {
  const winConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];

  // for (let condition of winConditions) {
  //   let a = condition[0];
  //   let b = condition[1];
  //   let c = condition[2];

  //   if (gameBoard[a] === ' ' || gameBoard[b] === ' ' || gameBoard[c] === ' ') {
  //     continue;
  //   }

  //   if (gameBoard[a] === gameBoard[b] && gameBoard[b] === gameBoard[c]) {
  //     return true;
  //   }
  // }

  //return false si no encuentra ninguna condición de victoria y true en cuanto encuentre una.
  return winConditions.some(condition => {
    const [a, b, c] = condition;
    return gameBoard[a] === currentPlayer && gameBoard[b] === currentPlayer && gameBoard[c] === currentPlayer;
  });
}





