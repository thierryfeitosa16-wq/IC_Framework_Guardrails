function enviarPergunta() {

    let pergunta = document.getElementById("pergunta").value;

    if (pergunta.trim() === "") {
        alert("Digite uma pergunta!");
        return;
    }

    fetch("backend/processar.php", {
        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({
            pergunta: pergunta
        })
    })

    .then(resposta => resposta.json())

    .then(dados => {
        document.getElementById("resposta").innerText =
            dados.resposta || dados.erro;
    })

    .catch(erro => {
        console.log(erro);
        alert("Erro ao enviar pergunta!");
    });

}
