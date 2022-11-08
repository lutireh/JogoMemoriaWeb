const contraTempo = document.getElementById("contraTempo");
console.log(contraTempo)
contraTempo.addEventListener("change",()=>{
    if(contraTempo.checked){
        gameMode="timmer"
        window.sessionStorage.setItem("gameMode", JSON.stringify(gameMode));
    }else{
        gameMode="classical"
        window.sessionStorage.setItem("gameMode", JSON.stringify(gameMode));
    }
})