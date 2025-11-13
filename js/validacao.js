// Declaração de variáveis
let cpfCheck = false;
let emailCheck = false;

const cpfInput = document.getElementById("cpfBody");
const emailInput = document.getElementById("emailBody");
const msgEmail = document.getElementById("msgEmail");
const msgEnviar = document.getElementById("msgEnviar");

// ----- Validação e formatação do CPF -----
cpfInput.addEventListener("input", () => {
  let cpf = cpfInput.value.replace(/\D/g, "");

  if (cpf.length > 11) cpf = cpf.slice(0, 11);

  if (cpf.length > 9) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, "$1.$2.$3-$4");
  } else if (cpf.length > 6) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{1,3})/, "$1.$2.$3");
  } else if (cpf.length > 3) {
    cpf = cpf.replace(/(\d{3})(\d{1,3})/, "$1.$2");
  }

  cpfInput.value = cpf;

  if (cpf.replace(/\D/g, "").length === 11) {
    cpfCheck = true;
  } else {
    cpfCheck = false;
  }
});

// ----- Validação do e-mail -----
emailInput.addEventListener("blur", () => {
  const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailValido.test(emailInput.value)) {
    msgEmail.textContent =
      "E-mail inválido. Verifique o formato (ex: nome@dominio.com).";
    msgEmail.style.color = "red";
    emailCheck = false;
  } else {
    emailCheck = true;
    msgEmail.textContent = "";
  }
});

// ----- Verificação ao enviar -----
document.getElementById("send").addEventListener("click", (event) => {
  if (!cpfCheck || !emailCheck) {
    msgEnviar.textContent = "E-mail e CPF devem ser devidamente preenchidos.";
    msgEnviar.style.color = "red";
    event.preventDefault();
  } else {
    msgEnviar.textContent = "Formulário enviado com sucesso!";
    msgEnviar.style.color = "green";
  }
});
