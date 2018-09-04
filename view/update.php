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
    <?php
        require_once  "../config.php";
        require_once "../controller/UserController.php";
    ?>

</head>
<body>
    <div class="container">
        <div class="row-12">
            <form class="form-group mt-5" method="POST" action="../controller/UserController.php?id=<?php $id = returnID(); echo $id; ?>">

                <h1 class="h1 text-center">Atualizar</h1>

                <?php userListUpdate(); ?>

                <input type="submit" name="postUpdate" class="btn btn-dark mt-3" value='Atualizar dados'/>

            </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<!--       "<form method='POST' = '../view/update.php'>
            <input type='hidden' name='id' value='$id' />
            <button type='submit' name='update' class='btn btn-primary'>Atualizar</button>
            <button type='submit' name='delete' class='btn btn-danger'>Deletar</button>
        </form>" -->