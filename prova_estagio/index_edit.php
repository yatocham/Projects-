<?php
include("conexao.php");

if (isset($_POST['nova_musica']) && !empty($_POST["nova_musica"])  && isset($_POST["idmusicas"]) && !empty($_POST["idmusicas"])) {
    // echo "update";
    // die();
    
    $variavel = "UPDATE musicas set nome_musica = '{$_POST["nova_musica"]}' where idmusicas = {$_POST["idmusicas"]}";
    mysqli_query($db, $variavel);

} else if (isset($_POST['idmusicas']) && !empty($_POST["idmusicas"]) && !isset($_POST['nova_musica']) || empty($_POST["nova_musica"])) {
    // aqui está atualizando 
    $delete = "DELETE FROM musicas where idmusicas = {$_POST["idmusicas"]}";
    mysqli_query($db, $delete);
}


$consultas = "SELECT * FROM artistas right join musicas on musicas.id_artista = artistas.id"; // PEGOU DA DIREITA PRA ESQUERDA
$cons = mysqli_query($db, $consultas); // aqui ele está executando a variavel 

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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Musica</th>
                            <th scope="col">Música</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dado = $cons->fetch_array()) : ?>
                            <form action="index_edit.php" method="POST">
                                <tr>
                                    <input type="hidden" name="idmusicas" value="<?php echo $dado["idmusicas"]; ?>"> <!-- type hidden é para ocutar a informação para o usuario -->
                                    <td scope="row"><?php echo $dado["idmusicas"]; ?></td>
                                    <td scope="row"><?php echo $dado["nome_musica"]; ?></td>
                                    <td scope="row"> <input name="nova_musica" type="text" class="form-control" placeholder="<?php echo $dado["nome_musica"] ?>"> </td>
                                    <td> <button class="btn btn-primary" type="submit"> UPDATE </button></td>
                                    <td> <button class="btn btn-primary" type="submit"> DELETE </button></td>
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