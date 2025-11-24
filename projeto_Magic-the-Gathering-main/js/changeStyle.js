document.addEventListener("DOMContentLoaded", () => {
  const linkTema = document.getElementById("tema-css");
  const botaoTema = document.getElementById("btn-tema");

  // Detecta se está na raiz (index.php)
  const estaNaRaiz = !window.location.pathname.includes(
    "projeto_Magic-the-Gathering-main"
  );

  // Define prefixos
  const prefixo = estaNaRaiz ? "projeto_Magic-the-Gathering-main/" : "";

  const tema1 = `${prefixo}css/style_1.css`;
  const tema2 = `${prefixo}css/style_2.css`;

  // Se existir tema salvo e o caminho ainda fizer sentido, carrega
  const temaSalvo = localStorage.getItem("tema");

  if (temaSalvo) {
    // Checa se o path salvo precisa de prefixo
    const pathCorrigido = temaSalvo.includes("projeto_Magic")
      ? temaSalvo
      : prefixo + temaSalvo.replace("css/", "css/");

    linkTema.setAttribute("href", pathCorrigido);
  } else {
    linkTema.setAttribute("href", tema1);
  }

  // Alternar tema
  botaoTema.addEventListener("click", () => {
    const temaAtual = linkTema.getAttribute("href");

    const novoTema = temaAtual.includes("style_1.css") ? tema2 : tema1;

    linkTema.setAttribute("href", novoTema);
    localStorage.setItem("tema", novoTema);
  });
});
