//verificar o modo de jogo do usuário
const contraTempo = document.getElementById("contraTempo")
const classico = document.getElementById("classico")
let gameMode
contraTempo.addEventListener("change", () => {
    if (contraTempo.checked) {
        gameMode = 1
        window.sessionStorage.setItem("gameMode", gameMode)
    }
})
classico.addEventListener("change", ()=> {
    gameMode = 2
    window.sessionStorage.setItem("gameMode", gameMode);
}
)