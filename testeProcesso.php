<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha'])) ) 
{
  header('location:telaLogin.php');

  } 

if (($_SESSION['adm']) ==0) {
   header('location:index.php');
   }
if (isset($_GET['id'])) {
	include "banco.php";
	$id=($_GET['id']);
	
	$query= "SELECT * FROM usuario where codigo = $id "; 
    $result = mysqli_query($link, $query);    
    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);    	
    	
    }else {
    	echo "sem resultados";
    }
}
    
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuário</title>     
       <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-utilities.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- javaScript bootstrap-->            
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
     
</head>
   
<body>
	<!-- Inicio da Tabela-->
                

    <!-- Modal editar Usuario -->


     <div class="container col-4" >
        <form class="row g-3" id="editar-processo-form" action=" Processos/CadastroProcesso.php" method="POST">
      <div class="col-12">    
      <label for="codigo-form" class="form-label">codigo</label>
    <input type="text"  name="codigo-form" value="<?=$row['codigo']?>" class="form-control" id="codigo-form"  >
  </div> 
    <div class="col-12">    
      <label for="andamento-form" class="form-label">id</label>
    <input type="text"  name="id_processo-form" value="<?=$row['id_usuario']?>" class="form-control" id="id_processo-form"  >
  </div>   
  <div class="col-12">    
      <p style="color :blue" ><?=$row['login2']?></p>    
  </div> 
              
  <div class="col-12 mb-3"> 
  <div class="input-group">
  <div class="input-group-prepend">  
    <span class="input-group-text">Andamento</span>
  </div>
  <textarea class="form-control" id="andamento-form"  name="andamento-form" aria-label="Com textarea" placeholder="Andamento Processo" required></textarea>  
  </div>  
  
  <div class="col-12">
        <input type="submit" class="btn btn-outline-primary btn-lg" id="cadastrar-processo" value="Cadastrar" >
  </div>
  
	  </form>
	        
	      </div>
	     </div>
	  </div>
	</div>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>