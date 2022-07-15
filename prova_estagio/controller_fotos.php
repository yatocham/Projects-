<?php

// if(isset($_FILES['arquivo'])){
//     echo "arquivo enviado ";
// }

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
}

$pasta = "imagens/";
$nomeDoArquivo = $arquivo['name'];
$novoNomeDoArquivo = uniqid(); // aqui ele da um nome unico pro arquivo
// $extensao = pathinfo($nomeDoArquivo. PATHINFO_EXTENSION);
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
// strtolower é um comando para colocar asletras em minusculo
//pathinfo é o caminho, o caminho do arquivo
if ($extensao != "jpg" && $extensao != 'png') {
    die("Tipo de arquivo não aceito");
}



$deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeDoArquivo . "." . $extensao);
if ($deu_certo) {
    echo "<p>Arquivo enviado com sucesso ! Para acessá-lo <a target=\"_blank\" href=\"imagens/$nomeDoArquivo.$extensao\">Clique aqui</a</p>";
} else {
    echo "<p>Falha ao enviar arquivo</p>";
}
?>