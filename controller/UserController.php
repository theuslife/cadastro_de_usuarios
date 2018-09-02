<?php 

require_once '../config.php';
use UserModel\User;

if(isset($_POST['post']))
{

    $user = new User();
    $user->create($_POST['nome'], $_POST['email'], $_POST['telefone']);
    if(count($user) > 0)
    {
        header('Location: ../public/index.php');
    } else 
    {
        header('Location: ../public/index.php');
    }

}

function userList()
{
    $GLOBALS['results'] = User::list();
    foreach($GLOBALS['results']  as $GLOBALS['result']);
}


?>