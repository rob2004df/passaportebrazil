
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
    <!--******** Verifica se o usuário está logado ********--> 
    <?php
   session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:telaLogin.php');
  }
if (($_SESSION['debitos']) ==1) {
   header('location:Botoes.php');
   }
$logado = ($_SESSION['id_usuario']);


    
?>
 
    <body style="background-color: #dbdbdb">
       <!--menu--> 
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Passaporte Brazil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Botoes.php">Inicio <span class="sr-only"></span></a>
      </li> 
     
     
    </ul>
    <div class = "form-inline my-2 my-lg-0" >
            <a> <span style="color: white;"> <?php echo ($_SESSION['login']); ?> </span> </a>
            <a></a>
        </div>
        <div class = "form-inline my-2 my-lg-0">
            <a href="logout.php"> SAIR</a>
        </div>
  </div>
</nav>
<!--*****************************************************--> 
        <div class="container text-center">
            <h2 class="text-primary"> Bem Vindo  <?php echo ($_SESSION['login']); ?></h2>
             <h2 class="text-primary">Aqui você poderá acompanhar seu processo</h2>
            <hr>
            <h2 class="text-primary">Envio de Arquivos Passaporte Brazil</h2>
            <hr>
            <form method="post" action="upload.php?acao=salvar" 
                                    enctype="multipart/form-data">
                <input type="file" name="arquivo" required>
                <input class="btn btn-primary" type="submit" value="Upload">
            </form>
            
            <hr>
            <h2 class="text-primary">Arquivos</h2>
            
            <?php 
                include_once 'banco.php';
                $query = "SELECT * FROM upload  WHERE id_usuario = '$logado' ";
                $result = mysqli_query($link, $query);
                while($array = mysqli_fetch_assoc($result)){
                    $filtro = ($array);
                   
            ?>
            
            <div style="float: left; margin: 10px">
                <img class="img-thumbnail" src="fotos/<?=$array['foto']?>" alt="Foto Álbum" 
                     width="120px"> <br>

                <!--<a href="editar.php?id=<?=$array['id']?>" class="btn btn-warning">Editar</a>-->
                <a href="fotos/<?=$array['foto']?>" class="btn btn-sm btn-success">Visualizar</a>
                
                <a href="upload.php?acao=excluir&id=<?=$array['id']?>" class="btn btn-sm     btn-danger" 
                                onclick="return confirm('Deseja excluir a imagem?')">Excluir</a>

            </div>
            
            <?php } ?>
        </div>

 

  
    </body>
</html>
