<?php 

require_once '../config.php';
use UserModel\User;

//Create
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

//List
function userList()
{
    $results = User::list();
    foreach($results as $result)
    {
        $id = $result['id'];
        echo "<tr>";
        echo "<td>" . $result['id'] . "</td>";
        echo "<td>" . $result['nome'] . "</td>";
        echo "<td>" . $result['email'] . "</td>";
        echo "<td>" . $result['telefone'] . "</td>";
        echo 
        "<td>" . 
        "   <a href='../view/update.php?id=$id' class='btn btn-primary'>Atualizar</a>
        <a href='../view/delete.php?id=$id' class='btn btn-danger'>Deletar</a>
        " . 
        "</td>";
        echo "</tr>";
    }
}

//Return ID by GET
function returnID()
{
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {

        $user = new User();
        $listUser = User::getUser($_GET['id']);
        return $listUser['id'];
    }
}

//Update get
function userListUpdate()
{
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {

        $user = new User();
        $listUser = User::getUser($_GET['id']);
        $GLOBALS['id'] = $_GET['id'];

        echo "<label for='nome'>Nome</label>";
        echo " <input type='text' id='nome' name='nome' class='form-control' value='" . $listUser['nome'] . "'  required/>";

        echo "<label for='email' class='mt-4'>E-mail</label>";
        echo " <input type='email' id='email' name='email' class='form-control' value='" . $listUser['email'] . "'  required/>";

        echo "<label for='telefone' class='mt-4'>Telefone</label>";
        echo " <input type='text' id='telefone' name='telefone' class='form-control' value='" . $listUser['telefone'] . "'  required/>";

    }

}

//Update post
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = (int) $_GET['id'];
    if(isset($_POST['postUpdate']))
    {

        $user = new User();
        $listUser = User::getUser($id);
        var_dump($listUser['nome']);
        var_dump($_POST['nome']);
  
        $user->setData($listUser);
        $user->update($_POST['nome'], $_POST['email'], $_POST['telefone']);
    }

}

//Delete
if(isset($_POST['delete']))
{
    echo "Deletado!";
}

?>