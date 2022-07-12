<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passaporte</title>
    <link rel="shortcut icon" href="fotos/Logo-Passaporte-Brazil-540w.png" type="image/x-icon">
    <!-- css bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- icones bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Css do Projeto-->
    <link rel="stylesheet" href="css/style.css">
    <!-- javaScript bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   

</head>
<body id="fundo">          
         

            <!-- Login Usuário-->
        <form class ="form-signin"  method ="POST" action="login2.php">
            <div class="card"  id="form">
              <div class="card-body">

                <form>
                  <div class="form-group">
                    <label for="login2">Login</label>
                    <input type="text" name ="login2" class="form-control"  id="login2" aria-describedby="Seu Usuário" placeholder="Seu Usuário" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                  </div>
                  
                  <button type="submit" id="botaoEntrar"  class="btn btn-primary">Entrar</button>
                </form>
              </div>
            </div>
        </form>
       

</html>