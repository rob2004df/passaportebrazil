
<?php
include_once '..//banco.php';
$andamento = @$_POST["andamento-form"];
$codigoForm = @$_POST['codigo-form'];
var_dump($andamento,$data,$codigoForm);

var_dump($_POST);
 
  $result_usuario = ("INSERT INTO processo (andamento,id_usuario_processo) VALUES ('$andamento','$codigoForm')");
   $resultado_insert = mysqli_query($link, $result_usuario);    
      if ($resultado_insert) {
  echo "<script>  alert('Usuário cadastrado com Sucesso'); window.location.replace('../telaCadastroCliente.php');</script>";
}            
else { echo "<script>  alert('Erro ao Cadastrar'); window.location.replace('../telaCadastroCliente.php');</script>";}

?>