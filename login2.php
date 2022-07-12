
<?php
include_once 'banco.php';
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login2'];
$senha = $_POST['senha'];


// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios

$query = "SELECT * FROM usuario   WHERE LOGIN2 = '$login' AND SENHA = '$senha' ";
                $result = mysqli_query($link, $query);
                while($array = mysqli_fetch_assoc($result)){
                    $filtro = ($array['id_usuario']);
                    $adm = ($array['adm']);
                    $debitos = ($array['debitos']);
                    var_dump($filtro);
                }

                
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */
if( mysqli_num_rows ($result) > 0 )
    {
      
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      $_SESSION['id_usuario'] = $filtro;
       $_SESSION['adm'] = $adm;
        $_SESSION['debitos'] = $debitos;
   
      
     header('location:telaCadastroCliente.php');
      
      
      
    }
else{
  echo "<script>alert('Usuario nao Cadastrado')</script>";
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
 
  header('location:telaLogin.php');

  }
?>