<?php


$link = mysqli_connect("127.0.0.1", "root", "", NULL, "3306", NULL)
       or die(mysqli_error());

mysqli_select_db($link, "projetoalbum") or die(mysqli_error($link));

//$localhost ='localhost';
//$user = 'root';
//$passw = '';
//$banco = 'projetoalbum';

       
 //      $pdo = new PDO ("mysql:dbname =" .$banco."; host = ".$localhost, $user, $passw);
  //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        


?>