<?php

    if(!empty($_GET['id']))
    {
        include_once '..//banco.php';

        $id = $_GET['id'];    
        
        $result_processo = "SELECT *  FROM processo WHERE id_processo =$id";

        $resultado_insert = mysqli_query($link, $result_processo);

        if($resultado_insert->num_rows > 0)
        {
            $sqlDelete = "DELETE  FROM processo WHERE id_processo=$id";
            $resultDelete = mysqli_query($link, $sqlDelete);
        }else{ echo('nao deu certo');
        
    }
    header('Location: TelaProcesso.php');
   }
?>