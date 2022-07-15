<?php
include("conexao.php");

if(isset($_POST["musica_atualizada"]) && !empty($_POST["musica_atualizada"])){
    // print_r($_POST);
    $variavel = "UPDATE musicas set nome_musica = '{$_POST["musica_atualizada"]}' WHERE idmusicas = {$_POST["idmusicas"]} ";
    mysqli_query($db, $variavel);
}
// empty é vazio , o !"empty é preenchido 
$consulta = "SELECT * FROM artistas right join musicas on musicas.id_artista = artistas.id"; // PEGOU DA DIREITA PRA ESQUERDA
$con = mysqli_query($db, $consulta);
?>
<!DOCTYPE html>
<html lang="PT-BR">
<?php include 'head.php' ?>

<body>
    <?php include 'navbar.php' ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-6">
                <h1>Musicas</h1>
            </div>
            <div class="col-6">
                <a href="create_musica.php" class="btn btn-primary float-end"><i class="fa fa-plus"></i>Novas Músicas</a> 
                <!-- aqui é o botão que joga para o create_musica.php --> 
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Musica</th>
                        <th scope="col">Música</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($dado = $con->fetch_array()) : ?>
                    <form action="index_musica.php" method="POST">
                    <tr>
                        <input type="hidden" name="idmusicas" value="<?php echo $dado["idmusicas"];?>">
                        <td scope="row"><?php echo $dado["idmusicas"]; ?></td>
                        <td scope="row"><?php echo $dado["nome_musica"]; ?></td>
                    </tr>
                </form>
                    <?php endwhile ?>     
                </tbody>

            </table>
        </div>

    </div>
    <?php include 'footer.php' ?>
</body>

</html>