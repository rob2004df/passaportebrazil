<?php
include_once 'banco.php';

if (isset($_POST['editar'])) {     
$id = @$_POST["id-form"];     
$nomeForm = @$_POST["nome-form"];
$senhaForm = @$_POST['senha-form'];
$codigoForm = @$_POST['codigo-form'];
$checkBoxForm = @$_POST['financeiro'];
$adm = @$_POST['adm'];

$result_usuario = "UPDATE usuario SET login2='$nomeForm', senha = '$senhaForm', debitos = '$checkBoxForm', codigo='$codigoForm', adm='$adm' WHERE id_usuario=$id ";
$resultado_insert = mysqli_query($link, $result_usuario);
 
echo "<script>
  alert('Usuário Alterado com Sucesso');
  window.location.replace('telaCadastroCliente.php');
</script>";
}
else {
	echo "<script>
  alert('Alteração Cancelada');
  window.location.replace('telaCadastroCliente.php');
</script>";
}
?>