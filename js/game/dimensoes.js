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
    return false;
  } else {
    const selections = {
      selectedGame,
      selectedSize,
    };
    let xhttp = new XMLHttpRequest();

    let url = "selections.php";


    xhttp.open("POST", url);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');

    try {
      xhttp.send(JSON.stringify(selections));
      if (xhttp.status != 200) {
         window.location.href="game.php"
      }
    } catch (err) { // instead of onerror
      alert("Request failed");
    }
    window.sessionStorage.setItem("selections", JSON.stringify(selections));
    return true;
  }
}
