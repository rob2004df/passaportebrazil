<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:telaLogin.php');
  }
  if (($_SESSION['adm']) ==0) {
   header('location:..//Botoes3.php');
   }
$logado = ($_SESSION['id_usuario']);
include_once"..//banco.php";

  if(!empty($_GET['search'])) 
{
  $data = $_GET['search']; 
       

    $sql = "SELECT u.codigo, u.login2, p.andamento,p.id_processo FROM processo AS p INNER JOIN usuario AS u ON (u.codigo = p.id_usuario_processo)WHERE  login2 LIKE '%$data%'order by u.codigo ASC" ;
    } else {    
  
    $sql = "SELECT u.codigo, u.login2, p.andamento,p.id_processo FROM processo AS p INNER JOIN usuario AS u ON (u.codigo = p.id_usuario_processo) order by p.id_processo DESC";
           }
    $result = mysqli_query($link, $sql); 
    

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Processos</title>     
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
  <div class="container">
  <a href="//localhost/albumfotos/telaCadastroCliente.php"class="btn btn-info" >Clientes</a>
  </div>
      <div class="box-search">
        <input type="search"  class="form-control w-25" placeholder="Pesquisar pelo NOME" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>


    <div class="container">
         <div class="row mt-4 mb-2"> 
              <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <h4> Listar Processos</h4>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#cadUsuarioModal">  Cadastrar Processos </button>              
              </div>                
         </div>
    </div>
    <!-- Inicio da Tabela-->
    <?php if(mysqli_num_rows($result)){ ?>
     
                    <div>
                    <table class="table table-hover " id="tabelaDados" >

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Codigo</th>
                      <th scope="col">Andamento do Processo</th>                    
                      <th scope="col">Nome</th>
                      <th scope="col">Opções</th>
                    </tr>
                  </thead>
                  <tbody>   
                   <?php 
                    $i=0;
                    while($rows = mysqli_fetch_assoc($result)){ 
                    $i++;
                    ?>  
                      <tr>                                  
                      <th scope="row"><?=$i?></th>                    
                      <td><?=$rows['codigo']?></td>
                      <td><?=$rows['andamento']?></td>                    
                     <td><?=$rows['login2']?></td>

 <!--btn edição--><td>
  <a href="deleteProcesso.php?id=<?=$rows['id_processo']?>"class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')">delete</a></td>                                                                    
                       </tr>
                       <?php } ?>
                        </tbody>
                      </table> 
                      <?php } ?>

    <!-- Modal Cadastrar Processo -->
<div class="modal fade" id="cadUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadUsuarioModal">Cadastrar Processos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="row g-3" id="cad-processo-form" action="cadastroProcesso.php" method="POST">
              
  <div class="col-12">
    <label for="andamento-form" class="form-label">Andamento</label>
    <input type="text" name="andamento-form" class="form-control" id="andamento-form" placeholder="Andamento Processo" required>
  </div> 
  
  <div class="col-12">
        <input type="submit" class="btn btn-outline-primary btn-lg" id="cadastrar-processo" value="Cadastrar" >
  </div>


  </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>      
      </div>
    </div>
  </div>
</div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'TelaProcesso.php?search='+search.value;
    }
</script>
</html>