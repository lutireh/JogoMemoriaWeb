var seconds;
var minutes;
var gamemodeTimer;
var totalTime = 0; 
const gameMode = window.sessionStorage.getItem("gameMode");


// tem que arrumar isso do contraTempo
// se tiver marcado contraTempo no radio, ele roda a funcao timer
// se não, ele deixa invisivel a tag do timer
//tudo isso ta no mododejogo.html
console.log(gameMode)
if (gameMode=="timmer"){
    timer();
}else{
    document.getElementById("timer").style.visibility = "hidden";
}

//NÃO MEXE DAQUI PRA BAIXO
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

