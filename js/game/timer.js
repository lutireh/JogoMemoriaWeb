//timer para o modo de jogo contra o tempo
var seconds;
var minutes;
var gamemodeTimer;
var totalTime = 0; 
const gameMode = window.sessionStorage.getItem("gameMode").toString();

//verificar o modo de jogo
if (gameMode== 1){
    timer();
}else{
    document.getElementById("timer").style.visibility = "hidden";
}

//timer funcionando
function timer() {
        document.getElementById('timer').innerText = '00:00'
        gamemodeTimer = setInterval(() => {
            const countTime = document.getElementById('timer')

            const newTime = countTime.innerText.split(':')
            const timeMin = parseInt(newTime[0]) + 1
            const timeSec = parseInt(newTime[1]) + 1

            if (newTime[1] >= 59) {
                minutes = (timeMin) < 10 ? (`0${timeMin}`) : timeMin
                seconds = `00`
            } else {
                minutes = newTime[0]
                seconds = timeSec < 10 ? `0${timeSec}` : timeSec
            }
            countTime.innerHTML = `${minutes}:${seconds}`
            totalTime++
        }, 1000)
}

