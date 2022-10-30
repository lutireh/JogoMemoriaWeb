const usuario = document.getElementById("usuario");
const senha = document.getElementById("senha");
let usuario1 = usuario.value,
  senha1 = senha.value;

const loginButton = document.getElementById("loginButton");
loginButton.addEventListener("click", (event) => {
  event.preventDefault();
  usuario1 = usuario.value;
  senha1 = senha.value;
  if (usuario1 === "" || senha1 === "") {
    alert("Preencha todas as suas informações!");
  } else window.location = "./mododejogo.html";
});

function saveNames() {
  window.sessionStorage.removeItem("user");

  const user = {
    usuario1,
    senha1,
  };

  window.sessionStorage.setItem("user", JSON.stringify(user));
}
