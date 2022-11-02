const selections = window.sessionStorage.getItem("selections");

const { selectedGame, selectedSize } = JSON.parse(selections);

let size;

const images = [
  ["baleia.png", 2],
  ["bambi.png", 2],
  ["cacto.jpg", 2],
  ["cavalo.png", 2],
  ["coala.png", 2],
  ["coelho.png", 2],
  ["coruja.png", 2],
  ["dino.png", 2],
  ["dog.png", 2],
  ["elefante.png", 2],
  ["espinho.png", 2],
  ["foca.png", 2],
  ["galinha.jpg", 2],
  ["gato.png", 2],
  ["gatoDormindo.png", 2],
  ["girafa.png", 2],
  ["girafaClose.png", 2],
  ["leao.png", 2],
  ["lula.png", 2],
  ["macaco.png", 2],
  ["ovelha.png", 2],
  ["panda.png", 2],
  ["passaro.png", 2],
  ["pintinho.png", 2],
  ["porco.png", 2],
  ["preguica.png", 2],
  ["raposa.png", 2],
  ["touro.png", 2],
  ["urso.png", 2],
  ["ursoFit.png", 2],
  ["vaca.png", 2],
  ["zebra.png", 2],
];
let imagesToGame = [];
const main = document.querySelector("main");
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

const div = document.getElementById("board");
for (let i = 0; i < size; i++) {
  if (i === 0) imagesToGame = images.slice(0, size / 2);

  const imagePath = aleatorizaImages();
  div.innerHTML += `<div class="piece" data-framework=${
    imagePath.split(".")[0]
  }> <div class="back-piece"> </div><img class="front-piece" src="./assets/gameImg/${imagePath}" alt="Frente da Carta"></div>`;
}

resetImages();

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
let lockBoard = false;

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

function check() {
  let isMatch = firstPiece.dataset.framework === secondPiece.dataset.framework;
  isMatch && cont++;
  isMatch ? disablePiece() : unflipPiece();
  vitory();
}

function vitory() {
  if (cont == size / 2) {
    alert("Você ganhou!");
  }
}

function disablePiece() {
  firstPiece.removeEventListener("click", flipPiece);
  secondPiece.removeEventListener("click", flipPiece);
  resetBoard();
}

function unflipPiece() {
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
