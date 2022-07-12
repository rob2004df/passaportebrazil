<?php
include_once 'banco.php';
$nomeForm = @$_POST["nome-form"];
$senhaForm = @$_POST['senha-form'];
$codigoForm = @$_POST['codigo-form'];
$checkBoxForm = @$_POST['financeiro'];
//var_dump($filtro);

 
//verifica se existe usuario
$query = "SELECT * FROM usuario  WHERE codigo = '$codigoForm' ";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result)){                
                    echo "<script>  alert('Usuário já existe');  window.location.replace('telaCadastroCliente.php');</script>";
                    }
                                  
            
    else{
    $result_usuario = "INSERT INTO usuario (login2,senha,debitos,codigo) VALUES ('$nomeForm','$senhaForm','$checkBoxForm','$codigoForm')";
   $resultado_insert = mysqli_query($link, $result_usuario);
 
echo "<script>  alert('Usuário cadastrado com Sucesso'); window.location.replace('telaCadastroCliente.php');</script>";
        
    
    }
                 




?>
