
<!DOCTYPE html>
<html lang="PT-BR">
<?php include 'head.php' ?>

<body>
    <?php include 'navbar.php' ?>

    <div class="container py-5">
        <div class="col-6">
            <h1>Musicas</h1>
        </div>
        <div class="row">
            <form method="POST" enctype="multipart/form-data" action="controller_fotos.php">
                <!-- da acesso aos $_FILES -->
                <label type="text">
                    <p><label for="">Selecione o arquivo</label>
                        <input name="arquivo" type="file">
                    </p>
                    <br>
                    <button name="upload" type="submit" class="btn btn-primary">Enviar o arquivo</button>
            </form>
        </div>

    </div>
    <?php include 'footer.php' ?>
</body>


</html>