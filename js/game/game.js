const selections = window.sessionStorage.getItem("selections");

const { selectedGame, selectedSize } = JSON.parse(selections);

let pontos = 0;

let size;
//ícones das peças
const images = [
  ["anchor-solid.svg", 2],
  ["baby-solid.svg", 2],
  ["car-solid.svg", 2],
  ["droplet-solid.svg", 2],
  ["envelope-solid.svg", 2],
  ["flag-solid.svg", 2],
  ["gopuram-solid.svg", 2],
  ["hammer-solid.svg", 2],
  ["landmark-solid.svg", 2],
  ["mountain-sun-solid.svg", 2],
  ["person-dress-solid.svg", 2],
  ["person-solid.svg", 2],
  ["plug-solid.svg", 2],
  ["radiation-solid.svg", 2],
  ["radio-solid.svg", 2],
  ["school-solid.svg", 2],
  ["seedling-solid.svg", 2],
  ["ship-solid.svg", 2],
  ["shirt-solid.svg", 2],
  ["shop-solid.svg", 2],
  ["shower-solid.svg", 2],
  ["snowflake-solid.svg", 2],
  ["stethoscope-solid.svg", 2],
  ["truck-front-solid.svg", 2],
  ["truck-solid.svg", 2],
  ["vihara-solid.svg", 2],
  ["virus-covid-solid.svg", 2],
  ["virus-solid.svg", 2],
  ["volcano-solid.svg", 2],
  ["wheat-awn-solid.svg", 2],
  ["wheelchair-move-solid.svg", 2],
  ["wind-solid.svg", 2],
];
let imagesToGame = [];
const main = document.querySelector("main");

//montando o tabuleiro
if (selectedSize == "2x2") {
  size = 4;
  main.innerHTML +=
    '<div class="board" id="board" style="grid-template-columns: repeat(2, 1fr);"></div>';
}
if (selectedSize == "4x4") {
  size = 16;
  main.innerHTML +=
    '<div class="board" id="board" style="grid-template-columns: repeat(4, 1fr);"></div>';
}
if (selectedSize == "6x6") {
  size = 36;
  main.innerHTML +=
    '<div class="board" id="board" style="grid-template-columns: repeat(6, 1fr);"></div>';
}
if (selectedSize == "8x8") {
  size = 64;
  main.innerHTML +=
    '<div class="board" id="board" style="grid-template-columns: repeat(8, 1fr);"></div>';
}

//colocando as peças
const div = document.getElementById("board");
for (let i = 0; i < size; i++) {
  if (i === 0) imagesToGame = images.slice(0, size / 2);
  const imagePath = aleatorizaImages();
  div.innerHTML += `<div class="piece" data-framework=${
    imagePath.split(".")[0]
  }> <div class="back-piece"> </div><img class="front-piece" id="piece" src="./assets/gameImg/${imagePath}" alt="Frente da Carta"></div>`;
}

resetImages();

//randomizando as peças
function aleatorizaImages() {
  let flag = true;
  let random;
  while (flag) {
    random = Math.floor(Math.random() * (size / 2));
    if (imagesToGame[random][1] != 0) {
      imagesToGame[random][1]--;
      flag = false;
    }
  }
  return imagesToGame[random][0];
}

function resetImages() {
  images.forEach((image) => {
    image[1] = 2;
  });
}

const piece = document.querySelectorAll(".piece");
let hasFlippedPiece = false;
let firstPiece, secondPiece;
var lockBoard = false;

//virar as peças
function flipPiece() {
  if (lockBoard) return;
  if (this === firstPiece) return;
  this.classList.add("flip");
  if (!hasFlippedPiece) {
    hasFlippedPiece = true;
    firstPiece = this;
    return;
  }
  secondPiece = this;
  check();
}

let cont = 0;

//verificando se as peças são iguais
function check() {
  let isMatch = firstPiece.dataset.framework === secondPiece.dataset.framework;
  isMatch && cont++;
  isMatch ? disablePiece() : unflipPiece();
  victory().then(saveTime);
}

//condição de vitória
function victory() {
  return new Promise((resolve) => {
    if (cont == size / 2) {
      clearInterval(gamemodeTimer);
      alert("Você ganhou! Total de " + pontos + " pontos");
      return resolve({ victory: true });
    }
  });
}

function disablePiece() {
  points();
  document.getElementById("points").innerText = "Pontuação: " + pontos;
  firstPiece.classList.add("active");
  if (!firstPiece.classList.contains("flip")) firstPiece.classList.add("flip");
  firstPiece.removeEventListener("click", flipPiece);
  secondPiece.removeEventListener("click", flipPiece);
  secondPiece.classList.add("active");
  if (!secondPiece.classList.contains("flip"))
    secondPiece.classList.add("flip");
  resetBoard();
}

function unflipPiece() {
  points(true);
  document.getElementById("points").innerText = "Pontuação: " + pontos;
  lockBoard = true;
  setTimeout(() => {
    firstPiece.classList.remove("flip");
    secondPiece.classList.remove("flip");
    resetBoard();
  }, 1500);
}

function resetBoard() {
  [hasFlippedPiece, lockBoard] = [false, false];
  [firstPiece, secondPiece] = [null, null];
}
piece.forEach((piece) => piece.addEventListener("click", flipPiece));

//função de trapaça para virar todas as peças
const cheat = document.getElementById("cheat");
toggleOn = false;
cheat.addEventListener("click", () => {
  if (toggleOn) {
    piece.forEach((piece) => {
      if (!piece.classList.contains("active")) piece.classList.remove("flip");
      if (
        piece.classList.contains("active") &&
        !piece.classList.contains("flip")
      )
        piece.classList.add("flip");
    });
  } else {
    piece.forEach((piece) => {
      if (!piece.classList.contains("active")) piece.classList.add("flip");
      if (
        piece.classList.contains("active") &&
        !piece.classList.contains("flip")
      )
        piece.classList.add("flip");
    });
  }

  toggleOn = !toggleOn;
});

function saveTime() {
  let xhttp = new XMLHttpRequest();
  let url = "time.php";
  let timer = document.getElementById("timer");
  let endGameTime = { time: timer.textContent };
  xhttp.open("POST", url);
  xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
  try {
    xhttp.send(JSON.stringify(endGameTime));
  } catch (err) {
    alert("Request failed");
  }
}

function points(missMatch) {
  switch (size) {
    case 4:
      if (selectedGame == "contraTempo") {
        missMatch ? (pontos -= 1) : (pontos += 4);
        if (pontos < 0) pontos = 0;
        return pontos;
      } else {
        missMatch ? (pontos -= 1) : (pontos += 2);
        if (pontos < 0) pontos = 0;
        return pontos;
      }
      break;

    case 16:
      if (selectedGame == "contraTempo") {
        missMatch ? (pontos -= 1) : (pontos += 8);
        if (pontos < 0) pontos = 0;
        return pontos;
      } else {
        missMatch ? (pontos -= 1) : (pontos += 4);
        if (pontos < 0) pontos = 0;
        return pontos;
      }
      break;
    case 36:
      if (selectedGame == "contraTempo") {
        missMatch ? (pontos -= 1) : (pontos += 12);
        if (pontos < 0) pontos = 0;
        return pontos;
      } else {
        missMatch ? (pontos -= 1) : (pontos += 8);
        if (pontos < 0) pontos = 0;
        return pontos;
      }
      break;
    case 64:
      if (selectedGame == "contraTempo") {
        missMatch ? (pontos -= 1) : (pontos += 20);
        if (pontos < 0) pontos = 0;
        return pontos;
      } else {
        missMatch ? (pontos -= 1) : (pontos += 12);
        if (pontos < 0) pontos = 0;
        return pontos;
      }
      break;
    default:
      break;
  }
}
