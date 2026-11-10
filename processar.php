<?php

header("Content-Type: application/json; charset=utf-8");

$dados = json_decode(file_get_contents("php://input"), true);

$pergunta = trim($dados["pergunta"] ?? "");

// Verificar se existe uma pergunta
if ($pergunta == "") {

    echo json_encode([
        "erro" => "Pergunta vazia!"
    ]);

    exit;
}

// Filtro de entrada
$bloqueios = [
    "invadir",
    "roubar senha",
    "criar malware"
];

foreach ($bloqueios as $termo) {

    if (stripos($pergunta, $termo) !== false) {

        echo json_encode([
            "erro" => "Pergunta bloqueada pelo Guardrails!"
        ]);

        exit;
    }

}

// Simulação de resposta da IA
$respostaIA = "Sua pergunta foi aprovada pelo filtro e chegou ao processamento da IA.";

// Filtro de saída
if ($respostaIA == "") {

    echo json_encode([
        "erro" => "Resposta bloqueada!"
    ]);

    exit;
}

// Retornar resposta
echo json_encode([
    "resposta" => $respostaIA
]);

?>
