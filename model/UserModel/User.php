<?php

namespace UserModel;
use Database\Sql;

class User extends \Model
{

    public function create($nome, $email, $telefone)
    {

        $sql = new Sql();
        $sql->query("INSERT INTO tb_pessoa(nome, email, telefone) VALUES (:nome, :email, :telefone)", [
            ':nome'=>$nome,
            ':email'=>$email,
            ':telefone'=>$telefone
        ]);

    }

    public static function list()
    {

        $sql = new Sql();
        $results = $sql->select('SELECT * FROM tb_pessoa');
        if(count($results) > 0)
        {
            return $results;
        }

    }

    public static function getUser($id)
    {

        $sql = new Sql();
        $result = $sql->select('SELECT * FROM tb_pessoa WHERE id = :id', [
            ':id'=>$id
        ]);

        if(count($result) > 0)
        {
            return $result[0];
        }

    }

    public function update($nome, $email, $telefone)
    {
        
        //Validação
        $user = User::getUser($this->getid());
        
        if($nome == $user['nome'] && $email == $user['email'] && $telefone == $user['telefone'])
        {
            header('Location: ../view/update.php?id=' . $this->getid());    
        } else 
        {
            $sql = new Sql();
            $result = $sql->query('UPDATE tb_pessoa SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id', [
                ':id'=>$this->getid(),
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone
            ]);
    
            if(count($result) > 0)
            {
                $this->setData($result);
                echo "<script>alert('Dados atualizados com sucesso!')</script>"; 
                header('Location: ../public/index.php'); 
              
            } else 
            {
                echo "<script>alert('Erro na atualização de dados!')</script>";  
                header('Location: ../view/update.php?id=' . $this>getid());
            }
        }

    }

    public function delete()
    {
        $sql = new Sql();
        $data = $this->getValues();
        $sql->select('DELETE * FROM tb_pessoa WHERE id = :id', [
            ':id'=>$data['id']
        ]);
    }

}

