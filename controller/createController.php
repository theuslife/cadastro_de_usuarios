<?php 

require_once '../config.php';

function create()
{
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
            return $GLOBALS['success'] =  "Sucesso! :)";
        } else 
        {
            return $GLOBALS['Error'] = "Erro";
        }
    
    } 
}



?>