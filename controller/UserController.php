<?php 

require_once '../config.php';
use UserModel\User;

//Create
if(isset($_POST['post']))
{

    $msg = User::validateError($_POST);
    if(!empty($msg))
    {
         header('Location: ../public/index.php?msg=' . $msg);
    }
    else
    {
        $user = new User();
        $user->create($_POST['nome'], $_POST['email'], $_POST['telefone']);
        if(count($user) > 0)
        {
            $msg = User::getSuccess('Usuário criado com sucesso!');
            header('Location: ../public/index.php?msg=' . $msg);
        }
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
        echo "<th class='scope'>" . $result['id'] . "</th>";
        echo "<td>" . $result['nome'] . "</td>";
        echo "<td>" . $result['email'] . "</td>";
        echo "<td>" . $result['telefone'] . "</td>";
        echo 
        "<td>" . 
        "   <a href='../view/update.php?id=$id' class='btn btn-primary'>Atualizar</a>
        <a href='../view/delete.php?id=$id' class='btn btn-danger pr-3 pl-3'>Deletar</a>
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
        echo " <input type='text' id='nome' name='nome' class='form-control' value='" . $listUser['nome'] . "'/>";

        echo "<label for='email' class='mt-4'>E-mail</label>";
        echo " <input type='email' id='email' name='email' class='form-control' value='" . $listUser['email'] . "'/>";

        echo "<label for='telefone' class='mt-4'>Telefone</label>";
        echo " <input type='text' id='telefone' name='telefone' class='form-control' value='" . $listUser['telefone'] . "'/>";

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
            $user->setData($listUser);
            $user->update($_POST);
    }

}

//Delete
function delete()
{
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $user = new User();
        $user->delete($id); 
        $msg = User::getSuccess('Usuário deletado!');    
        header('Location: ../public/index.php?msg=' . $msg);
    }
}

?>