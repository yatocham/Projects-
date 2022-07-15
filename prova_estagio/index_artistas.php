<?php
include("conexao.php");
$consulta = "SELECT * FROM artistas";
$con = mysqli_query($db, $consulta);
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
            <div class="col-6">
                <h1>Artistas</h1>
            </div>
            <div class="col-6">
                <a href="create_artistas.php" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Novo Artista</a>
            </div>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do Artista</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dado = $con->fetch_array()) { ?>
                        <tr>

                            <td scope="row"><?php echo $dado["id"]; ?></td>
                            <td scope="row"><?php echo $dado["nome_artista"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>

    </div>
    <?php include 'footer.php' ?>
</body>

</html>