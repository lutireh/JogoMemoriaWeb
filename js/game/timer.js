//timer para o modo de jogo contra o tempo
var segundos;
var minutos;
var gamemodeTimer;
var totalTime = 0;
const gameMode = window.sessionStorage.getItem("gameMode").toString();

//verificar o modo de jogo
if (gameMode != 1) {
  timer();
} else {
  timerContraTempo();
}

//timer funcionando
function timer() {
  document.getElementById("timer").innerText = "00:00";
  gamemodeTimer = setInterval(() => {
    const countTime = document.getElementById("timer");
    const newTime = countTime.innerText.split(":");
    const timeMin = parseInt(newTime[0]) + 1;
    const timeSec = parseInt(newTime[1]) + 1;

    if (newTime[1] >= 59) {
      minutos = timeMin < 10 ? `0${timeMin}` : timeMin;
      segundos = `00`;
    } else {
      minutos = newTime[0];
      segundos = timeSec < 10 ? `0${timeSec}` : timeSec;
    }
    countTime.innerHTML = `${minutos}:${segundos}`;
    totalTime++;
  }, 1000);
}

//timer contra o tempo para os diferentes tamanhos de tabuleiro
function timerContraTempo() {
  switch (selectedSize) {
    case "2x2":
      document.getElementById("timer").innerText = "00:05";
      break;
    case "4x4":
      document.getElementById("timer").innerText = "01:00";
      break;
    case "6x6":
      document.getElementById("timer").innerText = "02:00";
      break;
    case "8x8":
      document.getElementById("timer").innerText = "03:00";
      break;
    default:
      break;
  }
  gamemodeTimer = setInterval(() => {
    const countTime = document.getElementById("timer");
    const newTime = countTime.innerText.split(":");
    const timeMin = parseInt(newTime[0]) - 1;
    const timeSec = parseInt(newTime[1]) - 1;

    if (newTime[1] === "00") {
      minutos = timeMin < 10 ? `0${timeMin}` : timeMin;
      segundos = `59`;
    } else {
      minutos = newTime[0];
      segundos = timeSec < 10 ? `0${timeSec}` : timeSec;
    }
    countTime.innerHTML = `${minutos}:${segundos}`;
    if (parseInt(minutos) === 0 && parseInt(segundos) === 0) {
      alert("Você perdeu!");
      lockBoard = true;
      paraTempo();
    }
  }, 1000);
}

function paraTempo() {
  clearInterval(gamemodeTimer);
}

//Parcelas do código foram insipiradas em https://github.com/arthurgconti/SI401B-Projeto-CampoMinado/blob/main/js/CampoMinado/timer.js
