//verificar o modo de jogo do usuário
const contraTempo = document.getElementById("contraTempo");
console.log(contraTempo)
contraTempo.addEventListener("change",()=>{
    if(contraTempo.checked){
        gameMode= 1
        window.sessionStorage.setItem("gameMode", gameMode);
    }else{
        gameMode= 2
        window.sessionStorage.setItem("gameMode", gameMode);
    }
})