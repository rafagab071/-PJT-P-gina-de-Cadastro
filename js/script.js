function validarFormulario() {
    limparMensagensErro();

    // Validação do nome
    var nome = document.getElementById("nome").value;
    var regexNome = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s']+$/;
    if (!regexNome.test(nome) || nome.length < 3) {
        exibirErro("Nome inválido.", "erro-nome", "erro-nome");
        return false;
    }

    // Validação do e-mail
    var email = document.getElementById("email").value;
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) {
        exibirErro("E-mail inválido.", "erro-email", "erro-email");
        return false;
    }

    // Validação do CPF
    var cpf = document.getElementById("cpf").value.replace(/[^\d]/g, ''); // Remove caracteres não numéricos
    if (cpf.length !== 11 || isNaN(cpf)) {
        exibirErro("CPF inválido. Deve conter 11 números.", "erro-cpf", "erro-cpf");
        return false;
    }

    // Validação do CEP
    var cep = document.getElementById("cep").value;
    if (cep.length !== 8 || isNaN(cep)) {
        exibirErro("CEP inválido. Deve conter 8 números.", "erro-cep", "erro-cep");
        return false;
    }

    // Validação do telefone
    var telefone = document.getElementById("telefone").value;
    if (isNaN(telefone) || telefone.length !== 11) {
        exibirErro("Telefone inválido. Deve conter 11 números.", "erro-telefone", "erro-telefone");
        return false;
    }

    // Validação de senha
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarSenha").value;

    if (senha.length < 6 || senha.length > 10) {
        exibirErro("A senha deve conter entre 6 a 10 caracteres.", "erro-senha", "erro-confirmarSenha");
        return false;
    }
    if (senha !== confirmarSenha) {
        exibirErro("As senhas não coincidem.", "erro-senha", "erro-confirmarSenha");
        return false;
    }

    // Se todas as verificações passarem, permite o envio do formulário

    return true;
}

function exibirErro(mensagem, idCampo, idErro) {
    document.getElementById(idErro).textContent = mensagem;
    document.getElementById(idCampo).classList.add("erro");
}

function limparMensagensErro() {
    var campos = ["nome", "email", "cpf", "cep", "telefone", "senha", "confirmarSenha"];
    campos.forEach(function (campo) {
        document.getElementById("erro-" + campo).textContent = "";
        document.getElementById(campo).classList.remove("erro");
    });
}