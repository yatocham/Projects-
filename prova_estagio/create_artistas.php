<?php

if (isset($_POST["nome_artista"])) {
    include_once('conexao.php');

    $nome_artista = $_POST['nome_artista'];

    // echo "INSERT INTO artistas(nome) VALUES ('$nome')" ;  //

    $result = mysqli_query($db, "INSERT INTO artistas(nome_artista) VALUES ('$nome_artista')") or die(mysqli_error($db));
?>

    <script>
        alert('Cadastrado com sucesso!');
        window.location.href = 'index_artistas.php' ; // esse comando é pra mandar pra um link 
    </script>
<?php

}

?>
<!DOCTYPE html>
<html lang="PT-BR">
<?php include 'head.php' ?>

<head>
    <style>
        .bgbody {
            background: url('imagens/musica2.jpg.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container py-5">
        <div class="row">
            <form action="create_artistas.php" method="POST">
                <h1> Cadastro de Artistas </h1>
                <div class="mb-3 col-lg-3">
                    <!-- margem de baixo -->
                    <label for="nome_artista" class="form-label">Artista</label>
                    <input type="text" class="form-control" id="nome_artista" name="nome_artista">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>