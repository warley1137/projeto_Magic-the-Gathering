document.addEventListener("DOMContentLoaded", () => {
  const linkTema = document.getElementById("tema-css");
  const botaoTema = document.getElementById("btn-tema");

  // Caminhos corretos para o index.php
  const base = "css/";
  const tema1 = "style_1.css";
  const tema2 = "style_2.css";

  // Carregar tema salvo
  let temaSalvo = localStorage.getItem("tema_index");

  if (!temaSalvo) {
    temaSalvo = tema1;
    localStorage.setItem("tema_index", tema1);
  }

  // Aplica o tema salvo
  linkTema.href = base + temaSalvo;

  // Alterna tema
  botaoTema.addEventListener("click", () => {
    temaSalvo = temaSalvo === tema1 ? tema2 : tema1;

    localStorage.setItem("tema_index", temaSalvo);

    linkTema.href = base + temaSalvo;
  });
});
