<?php

   require_once "config.php";
    
   if(isset($_GET['id']) && is_numeric($_GET['id']))
   {
       $id = (int) $_GET['id'];
       $list = $pdo->prepare('SELECT * FROM tb_pessoa WHERE id = :id'); 
       $list->execute([
           ':id' => $id
       ]);
       $arrayResults = $list->fetchAll(PDO::FETCH_ASSOC);
       foreach($arrayResults as $result);
   } else 
   {
        $error = "<div class='alert alert-danger'>Valor inválido!</div>";
   }

   if(isset($_POST['post']))
   {
   
       $update = $pdo->prepare('UPDATE tb_pessoa SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id');
       if($update->execute([
            ':id'=> $GLOBALS['id'],
            ':nome'=> $_POST['nome'],
            ':email' => $_POST['email'],
            ':telefone' => $_POST['telefone']
       ]))
       {
            header('Location: index.php');
       } else 
       {
            $error = "<div class='alert alert-danger'>Erro na atualização de dados!</div>";
       }
   }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atualizar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row-12">
            <form method="POST" class="form form-group mt-5"> 

                     <h4 class="h1 text-center">Atualizar</h4>

                    <?php 
                        if(isset($GLOBALS['error'])){echo $GLOBALS['error'];} ?>
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" value="<?php 

                        if(isset($GLOBALS['result']['nome']))
                            echo $GLOBALS['result']['nome'];

                        ?>" required/>

                        <label for="email" class="mt-4">E-mail</label>
                        <input type="E-mail" id="email" name="email" class="form-control" value="<?php 

                        if(isset($GLOBALS['result']['email']))
                        {
                            echo $GLOBALS['result']['email'];
                        }
                    
                    ?>" required/>

                    <label for="telefone" class="mt-4">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control" value="<?php 
                    if(isset($GLOBALS['result']['telefone']))
                    {
                        echo $GLOBALS['result']['telefone'];
                    }
                    
                    ?>" required/>

                    <input type="submit" name="post" class="btn btn-dark mt-3" value="Atualizar"/>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

