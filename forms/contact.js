function enviar_mensagem_whatsapp_redirecionar() {

    document.getElementsByClassName("error-message")[0].style.display = "none";
    document.getElementsByClassName("error-message")[0].innerText = "";

    let seu_nome = document.getElementById("name-field").value;
    let seu_email = document.getElementById("email-field").value;
    let assunto = document.getElementById("subject-field").value;
    let mensagem = document.getElementById("message-field").value;

    if (seu_nome == "") {
        document.getElementsByClassName("error-message")[0].style.display = "block";
        document.getElementsByClassName("error-message")[0].innerText = "Houve um erro. Preencha o campo de nome.";
        return "";
    }

    if (seu_email == "") {
        document.getElementsByClassName("error-message")[0].style.display = "block";
        document.getElementsByClassName("error-message")[0].innerText = "Houve um erro. Preencha o campo de e-mail.";
        return "";
    }

    if (assunto == "") {
        document.getElementsByClassName("error-message")[0].style.display = "block";
        document.getElementsByClassName("error-message")[0].innerText = "Houve um erro. Preencha o campo de assunto.";
        return "";
    }

    if (mensagem == "") {
        document.getElementsByClassName("error-message")[0].style.display = "block";
        document.getElementsByClassName("error-message")[0].innerText = "Houve um erro. Preencha o campo de mensagem.";
        return "";
    }

    let texto = "Olá, Erick! Tudo bem?" + "\n" + "#-------------------------------------------------" + "\n" +
    "Seu Nome: " + seu_nome + "\n" +
    "Seu E-mail: " + seu_email + "\n" +
    "Assunto: " + assunto + "\n" +
    "Mensagem: " + mensagem + "\n" +
    "#-------------------------------------------------" + "\n" + "Aguardo ansiosamente um retorno de sua parte!";

    let url = "https://api.whatsapp.com/send?phone=5516993425009&text=" + encodeURIComponent(texto);

    window.open(url, "_blank");
}