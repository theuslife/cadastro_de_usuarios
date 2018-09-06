<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php
        require_once  "../config.php";
        require_once "../controller/UserController.php";
    ?>

</head>
<body class="bg-dark">

    <div class="container bg-dark text-white">
        <form class="form-group mt-5" method="POST" action="../controller/UserController.php">

            <h1 class="h1 text-center">PHP MVC</h1>

            <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control"/>

            <label for="email" class="mt-4">E-mail</label>
            <input type="email" id="email" name="email" class="form-control"/>

            <label for="telefone" class="mt-4">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control"/>

            <input type="submit" name="post" class="btn btn-primary mt-3"/>
        </form>

        <div class="row-12">
            <table class="table table-sm table-dark text-light table-hover table-responsive-sm">
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
                     <tr>
                        <?php userList(); ?>
                     </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>