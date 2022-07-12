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
include_once"banco.php";

$sql = "SELECT u.id_usuario, u.login2, p.andamento FROM processo AS p INNER JOIN usuario AS u ON (u.codigo = p.id_usuario_processo)WHERE  u.id_usuario = $logado order by u.codigo ASC" ;
    
    
    $result = mysqli_query($link, $sql); 
    while($rows = mysqli_fetch_assoc($result)){ 
var_dump($rows);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passaporte</title>
    <link rel="shortcut icon" href="img/Logo.png" type="image/x-icon">
    <!-- css bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- icones bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Css do Projeto-->
   
    <!-- javaScript bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body id="botoes" style="background-color: #dbdbdb">  
<!--menu--> 
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Passaporte Brazil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Meus Documentos <span class="sr-only">(página atual)</span></a>
      </li>  
         </ul>
        <div class = "form-inline my-2 my-lg-0">
            <a href="telaLogin.php">SAIR</a>
        </div>
  </div>
</nav>
<!--*****************************************************--> 


<div class= "container" id="card3"style= "display: block">
<div class ="row">
<div class="media-body">
      <h5 class="mt-0 mb-1">Olá robson</h5>
      <h5 class="mt-0 mb-1">Bem vindo ao Andamento do seu Processo</h5>      
      <p>*Enviado para embaixada dia 01/06/2022.</p>
      
    </div>
    


<div class="card text-white bg-warning mb-3 text-center" style="max-width: 18rem;">
  <div class="card-header"></div>
  <div class="card-body">
    <h5 class="card-title">Em Análise</h5>
    <p class="card-text">Os Documentos foram enviados para análise</p>
  </div>
  </div>
  </div>
  
  <ul class="list-unstyled">
  <li class="media">
  <img class="mr-6" style="max-width: 40rem;" src="fotos/Consulados-Brasil-Eduportugal-1.png" alt="Imagem de exemplo genérica">
    
  </li>
  
  
</ul>



</body>
</html>