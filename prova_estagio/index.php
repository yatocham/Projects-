<?php

// $_POST['musica_artista'] = 9;



include("conexao.php"); // conexão com o bd
$busca = "SELECT * FROM artistas"; //busca artistas
$join = "SELECT * FROM artistas inner join musicas on musicas.id_artista = artistas.id";

if (isset($_POST["musica_artista"]) && !empty($_POST["musica_artista"]) && $_POST["musica_artista"] != 0) {
    $join .= " where artistas.id= {$_POST['musica_artista']}";
    // isset verifica se a variavel existe e é nula e o empty verifica se tem alguma coisa pelo menos um numero e verifica se é 
    // diferente de 0 
    // primeiro vc monta a carry e dps vc execurta 
}

// echo $_POST["musica_artista"];

$executa = mysqli_query($db, $busca); //execução
$execucao = mysqli_query($db, $join);
// $teste = "SELECT * FROM artistas left join musicas on musicas."

?>
<!DOCTYPE html>
<html lang="PT_BR">
<?php include 'head.php' ?>

<head>
    <style>
        .bgbody {
            background: url('imagens/musica.jpg.jpg');
            background-size: cover;
        }
    </style>
</head>

<body class="bgbody">

    <?php include 'navbar.php' ?>
    <div class="container py-5">
        <div class="row">
            <form action="index.php" method="POST">

                <!-- é um metodo de transmissão de dados, post é melhro para cadastrar alguma coisa  -->
                <!-- o metodo post é uma forma de enviar dados-->
                <h1>Artistas</h1>
                <div class="mb-3 col-lg-3">
                    <select id="musica_artista" name="musica_artista" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecione um Artista</option>
                        <?php while ($dado = $executa->fetch_array()) : ?>
                            <option value="<?php echo $dado["id"]; ?>"><?php echo $dado["nome_artista"]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary"> BUSCAR </button>
                        <!-- <a href="index.php" class="btn btn-primary float-end"><i class="fa fa-plus"></i>Buscar Músicas</a>  -->
                        <!-- aqui é o botão que joga para o create_musica.php -->
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Musicas </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_POST["musica_artista"]) && !empty($_POST["musica_artista"]) && $_POST["musica_artista"] != 0) : ?>
                                    <?php while ($dado = $execucao->fetch_array()) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $dado["nome_musica"]; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>