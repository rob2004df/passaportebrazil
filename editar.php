<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload de Imagens</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-utilities.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php 
        $id = $_GET['id'];
    ?>
    <body style="background-color: #dbdbdb">
        <div class="container text-center">
            <hr>
            <h2 class="text-primary">Edição de Imagens</h2>
            <hr>
            <form method="post" action="upload.php?acao=alterar&id=<?=$id?>" 
                  enctype="multipart/form-data">
                <input type="file" name="arquivo" required>
                <input class="btn btn-primary" type="submit" 
                       onclick="return confirm('Deseja editar a imagem?')" value="Editar">
            </form>
    </body>
</html>
