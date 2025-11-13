document.addEventListener("DOMContentLoaded", async () => {
  console.log("📌 carrega_dados.js carregado!");

  try {
    const response = await fetch("dados/dados.json");

    if (!response.ok) {
      throw new Error(`Erro ao carregar JSON: ${response.status}`);
    }

    const dados = await response.json();
    const tabelaBody = document.getElementById("tabela-body");

    if (!tabelaBody) {
      console.error("❌ Elemento #tabela-body não encontrado!");
      return;
    }

    tabelaBody.innerHTML = "";

    dados.forEach(item => {
      const linha = document.createElement("tr");

      linha.innerHTML = `
        <td>${item.quantidade ?? "—"}</td>
        <td>${item.nome ?? "—"}</td>
        <td>${item.colecao ?? "—"}</td>
        <td>${item.numero ?? "—"}</td>
      `;

      tabelaBody.appendChild(linha);
    });

    console.log(`✅ ${dados.length} registros carregados.`);
  } catch (error) {
    console.error("❌ Erro geral:", error);
  }
});
