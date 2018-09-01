<?php

    require_once "config.php";
    use Database\Sql;
    use User\User;

    $sql = new Sql();

    //Criando
    $user = new User();
    $user->create($_POST['nome'], $_POST['email'], $_POST['telefone']);

    //Lista
    $list = User::list();

    //Update
    $user = new User();
    $user->create();
    $user->getUser($_GET['id']);
    $user->update();
    $user->delete();

    if(isset($_POST['post']))
    {   
        $results = $sql->query('INSERT INTO tb_pessoa(nome, email, telefone) VALUES(:nome, :email, :telefone)', [
            ':nome'=>$_POST['nome'],
            ':email'=>$_POST['email'],
            ':telefone'=>$_POST['telefone']
        ]);

        echo "<pre>";

        if(isset($results) && count($results) > 0)
        {
            $GLOBALS['success'] =  "Sucesso! :)";
        } else 
        {
            $GLOBALS['Error'] = "Erro";
        }

    } 

     //Listagem
     $GLOBALS['list'] = $sql->select("SELECT * FROM tb_pessoa");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>

    <div class="container">

        <div class="row-12">
            <form class="form-group mt-5" method="POST">

                <h1 class="h1 text-center">Crud com PHP Puro</h1>

                <?php   
                    if(isset($GLOBALS['success']))
                    {
                        echo "<div class='alert alert-success'>". $GLOBALS['success'] ."</div>";
                    }
                    if(isset($GLOBALS['error']))
                    {
                        echo "<div class='alert alert-success'>". $GLOBALS['error'] ."</div>";
                    }
                ?>

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required/>

                <label for="email" class="mt-4">E-mail</label>
                <input type="E-mail" id="email" name="email" class="form-control" required/>

                <label for="telefone" class="mt-4">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required/>

                <input type="submit" name="post" class="btn btn-dark mt-3"/>
            </form>
        </div>

        <div class="row-12">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 

                                if(count($GLOBALS['list']) > 0)
                                {
                                    foreach($GLOBALS['list'] as $data)
                                    {   
                                        echo "<tr>";
                                        echo "<td>" . $data['id'] . "</td>";  
                                        echo "<td>" . $data['nome'] . "</td>";    
                                        echo "<td>" . $data['email'] . "</td>";    
                                        echo "<td>" . $data['telefone'] . "</td>";  
                                        echo "<td>" . "<a class='btn btn-primary' href=atualizar.php?id=" . $data['id'] . "> Atualizar </a>" . "<a class='btn btn-danger' href=delete.php?id=" . $data['id'] . "> Deletar </a>"  . "</td>";
                                        echo "</tr>";
                                    }    
                                }

                            
                        ?>
                     
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>