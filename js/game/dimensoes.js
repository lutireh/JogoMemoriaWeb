const gameRadio = document.querySelectorAll("input[name='radio']");
const labelRadio2 = document.querySelectorAll("input[name='radio2']");

const button = document.querySelector("button");

function clickMe(event) {
  let selectedGame = false,
    selectedSize = false;
  for (const radioButton of labelRadio2) {
    if (radioButton.checked) {
      selectedSize = radioButton.id;
      break;
    }
  }
  for (const radioButton of gameRadio) {
    if (radioButton.checked) {
      selectedGame = radioButton.id;
      break;
    }
  }

  if (!selectedGame || !selectedSize) {
    alert("Selecione os dois");
  } else {
    const selections = {
      selectedGame,
      selectedSize,
    };

    window.sessionStorage.setItem("selections", JSON.stringify(selections));
    window.location.assign("game.html");
  }
}
