document.addEventListener("DOMContentLoaded", () => {
  console.log("✅ carrega_dados.js foi carregado!");
  fetch("../dados/dados.json")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao carregar dados.json");
      }
      return response.json();
    })
    .then((dados) => {
      const tabelaBody = document.getElementById("tabela-body");

      dados.forEach((item) => {
        const linha = document.createElement("tr");
        linha.innerHTML = `
          <td>${item.nome}</td>
          <td>${item.colecao}</td>
          <td>${item.numero}</td>
        `;
        tabelaBody.appendChild(linha);
      });
    })
    .catch((error) => {
      console.error("Erro:", error);
    });
});
