<?php

include_once 'banco.php';
session_start();
$id_session = $_SESSION['login'];
$rotulo =$_SESSION['id_usuario'];

$arquivo = @$_FILES["arquivo"]["name"];
$tipo = @$_FILES["arquivo"]["type"];
$dir = "fotos/";
$mimeTypes = array("image/jpeg", "image/jpg", "image/png", "image/bmp", "image/gif", "application/pdf", "text/html");

/* * **************** SALVAR ************** */
if ($_GET['acao'] == 'salvar') {
    if (is_file(@$_FILES["arquivo"]["tmp_name"])) {
        if (file_exists($dir . $arquivo)) {
            $cont = 1;
            while (file_exists("fotos/[$cont]$arquivo")) {
                $cont++;
            }
            $arquivo = "[$cont]$arquivo";
            
        }

        if (in_array($tipo, $mimeTypes)) {
            $query = "INSERT INTO upload(foto,id_usuario)VALUES('$arquivo','$rotulo')";
            if (mysqli_query($link, $query)) {
                if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $dir . $arquivo)) {
                    echo $arquivo;
                    echo "<script>alert('Arquivo enviado com sucesso');location='index.php'</script>";
                }
            }
        } else {
            echo "<script>alert('Tipo de arquivo inválido');location='index.php'</script>";
        }
    }
}

/* * ***************** EXCLUIR ******************* */

if ($_GET["acao"] == "excluir") {
    $id = $_GET["id"];
    $query = "SELECT * FROM upload WHERE id='$id'";
    $result = mysqli_query($link, $query);
    $array = mysqli_fetch_assoc($result);
    $foto_db = $array['foto'];
    $query_del = "DELETE FROM upload WHERE id='$id'";
    if (mysqli_query($link, $query_del)) {
        if (unlink("fotos/$foto_db")) {
            echo "<script>alert('Imagem foi excluida com sucesso');location='index.php'</script>";
        }
    }
}

/* * **************** EDITAR ****************** */
if ($_GET['acao'] == 'alterar') {
    $id = $_GET['id'];
    $query = "SELECT * FROM upload WHERE id='$id'";
    $result = mysqli_query($link, $query);
    $array = mysqli_fetch_assoc($result);
    
    $id_antigo = $array['id'];
    $foto_antiga = $array['foto'];
    
    if (is_file(@$_FILES["arquivo"]["tmp_name"])) {
        if (file_exists($dir . $arquivo)) {
            $cont = 1;
            while (file_exists("fotos/[$cont]$arquivo")) {
                $cont++;
            }
            $arquivo = "[$cont]$arquivo";
        }

        if (in_array($tipo, $mimeTypes)) {
            $query = "UPDATE upload SET foto = '$arquivo' WHERE id='$id_antigo'";
            if (mysqli_query($link, $query)) {
                if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $dir . $arquivo)) {
                    if(unlink("fotos/$foto_antiga")){
                        echo "<script>alert('Arquivo editado com sucesso');location='index.php'</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Tipo de arquivo inválido');location='index.php'</script>";
        }
    }
}