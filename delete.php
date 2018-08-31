<?php 

    require_once "config.php";

    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $delete = $pdo->prepare('DELETE FROM tb_pessoa WHERE id = :id');
        if($delete->execute([':id' => $id]))
        {
            $success = "<div class='alert alert-success'> Deletado com sucesso! </div>";
            header("Location: index.php");
        } else 
        {
            header("Location: index.php");
        }

    } else 
    {

        header('Location: index.php');
    
    }

?>