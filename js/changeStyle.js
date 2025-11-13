document.addEventListener("DOMContentLoaded", () => {
  const linkTema = document.getElementById("tema-css");
  const botaoTema = document.getElementById("btn-tema");

  // Verifica se o usuário já escolheu um tema antes
  const temaSalvo = localStorage.getItem("tema");
  if (temaSalvo) {
    linkTema.setAttribute("href", temaSalvo);
  }

  botaoTema.addEventListener("click", () => {
    const temaAtual = linkTema.getAttribute("href");

    // Alterna entre os temas
    const novoTema = temaAtual.includes("style_1.css")
      ? "css/style_2.css"
      : "css/style_1.css";

    linkTema.setAttribute("href", novoTema);

    // Salva no localStorage
    localStorage.setItem("tema", novoTema);
  });
});
