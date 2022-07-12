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
	
	$query= "SELECT * FROM usuario where id_usuario = $id "; 
    $result = mysqli_query($link, $query);    
    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);    	
    	
    }else {
    	header("lcoation:telaCadastroCliente");
    }

    }else if (isset($_POST['editar'])) {
      echo "string";
    

}else {
	header("lcoation:telaCadastroCliente");
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


     <div class="container">
        <form class="row g-3" id="editar-usuario-form" action="editarUsuario.php" method="POST">
           <div class="col-12">
    
    <input type="text"  name="id-form" value="<?=$row['id_usuario']?>" class="form-control" id="id-form" hidden >
  </div>
    <div class="col-12">
    <label for="nome-form" class="form-label">Nome</label>
    <input type="text" name="nome-form" value="<?=$row['login2']?>" class="form-control" id="nome-form"  >
  </div>
  <div class="col-12">
    <label for="senha-form" class="form-label">Senha</label>
    <input type="text" name="senha-form" value="<?=$row['senha']?>" class="form-control" id="senha-form"  required>
  </div>
  <div class="col-12">
    <label for="codigo-form" class="form-label">Codigo</label>
    <input type="number" name="codigo-form" value="<?=$row['codigo']?>" class="form-control" id="codigo-form"  required>
  </div>
  <div class="col-12"><p>Situação Financeiro</p> <!-- exibe opção de radio-->   
              <input type="radio" id="financeiro" name="financeiro" 
              value="1" <?php echo ($row['debitos']) == '1' ? 'checked' : '' ?> required> 
              <label for="financeiro">Sim</label>
              <br>
              <input type="radio" id="financeiro" name="financeiro" value="0"<?php echo ($row['debitos']) == '0' ? 'checked' : '' ?> required>
              <label for="financeiro">Não</label>
              <br>  
              <? var_dump($row['debitos'])?>  
    </div>

  <div class="col-12"><p>ADM</p> <!-- exibe opção de radio-->   
              <input type="radio" id="adm" name="adm" 
              value="1" <?php echo ($row['adm']) == '1' ? 'checked' : '' ?> required> 
              <label for="adm">Sim</label>
              <br>
              <input type="radio" id="adm" name="adm" value="0"<?php echo ($row['adm']) == '0' ? 'checked' : '' ?> required>
              <label for="adm">Não</label>
              <br>               
    </div>
          <div class="col-12">
          <input type="submit" name="editar" class="btn btn-outline-primary btn-lg" id="editar" value="Editar" >
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