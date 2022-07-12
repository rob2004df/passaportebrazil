<?php

    if(!empty($_GET['id']))
    {
        include_once 'banco.php';

        $id = $_GET['id'];
        

        $result_usuario = "SELECT *  FROM usuario WHERE id_usuario=$id";

        $resultado_insert = mysqli_query($link, $result_usuario);

        if($resultado_insert->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuario WHERE id_usuario=$id";
            $resultDelete = mysqli_query($link, $sqlDelete);
        }
    }
    header('Location: telaCadastroCliente.php');
   
?>