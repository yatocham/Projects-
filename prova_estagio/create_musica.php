<?php
include("conexao.php"); // aqui já ocorre a conexão com o banco 
$consulta = "SELECT * FROM artistas"; // monta a carry que busca os artistas
$con = mysqli_query($db, $consulta); // aqui executa a carry

if (isset($_POST["nome_musica"])) { // aqui verifica que tem algo dentro de post, dentro de nome_musica
    // include_once('conexao.php');

    $nome_musica = $_POST['nome_musica']; // aqui atribuiu o valor a variavel 

    $musica_artista = $_POST['musica_artista']; // aqui também, pegamos o que o usuario colocou

    // echo "INSERT INTO artistas(nome) VALUES ('$nome')" ;  //


    $result = mysqli_query($db, "INSERT INTO musicas(nome_musica, id_artista) VALUES ('$nome_musica', '$musica_artista')") or die(mysqli_error($db));

?>

    <script>
        alert('Cadastrado com sucesso!');
        window.location.href = 'index_musica.php'; // esse comando é pra mandar pra um link 
    </script>
<?php

}

?>

<!DOCTYPE html>
<html lang="PT_BR">
<?php include 'head.php' ?>

<body>
    <?php include 'navbar.php' ?>
    <div class="container py-5">
        <div class="row">
            <form action="create_musica.php" method="POST">
                <!-- o metodo post é uma forma de enviar dados-->
                <h1> Cadastro de Músicas </h1>
                <div class="mb-3 col-lg-3">
                    <select id="musica_artista" name="musica_artista" class="form-select" aria-label="Default select example">
                        <option selected>Selecione um Artista</option>
                        <?php while ($dado = $con->fetch_array()) { ?>
                            <option value="<?php echo $dado["id"]; ?>"><?php echo $dado["nome_artista"]; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="nome_musica" class="form-label">Informe o nome da música</label>
                    <input type="text" class="form-control" id="nome_musica" name="nome_musica">
                </div>


                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar </button>
            </form>
        </div>
    </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>