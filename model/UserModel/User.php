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

    public function update($data = array())
    {
        
        //Pegando o usuário cadastrado no banco
        $user = User::getUser($this->getid());

        //Validando erros
        $msg = User::validateError($data, $user);

        if(!empty($msg))
        {
            $result = http_build_query(['msg' => $msg, 'id' => $this->getid()]);
            header('Location: ../view/update.php?' . $result);
        }

        else 
        {
            $sql = new Sql();
            $result = $sql->query('UPDATE tb_pessoa SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id', [
                ':id'=>$this->getid(),
                ':nome' => $data['nome'],
                ':email' => $data['email'],
                ':telefone' => $data['telefone']
            ]);
    
            if(count($result) > 0)
            {
                $this->setData($result);
                $msg = User::getSuccess("Cadastro do usuário " . $data['nome'] . " atualizado com sucesso!");
                header('Location: ../public/index.php?msg=' . $msg); 
            }
        }

    }

    public function delete($id)
    {
        $sql = new Sql();
        $user = User::getUser($id);
        $sql->select('DELETE FROM tb_pessoa WHERE id = :id', [
            ':id'=>$user['id']
        ]);
      
    }

    public static function getError($msg)
    {

        return "<div class='alert alert-danger'>$msg</div>";

    }

    public static function getSuccess($msg)
    {
       return "<div class='alert alert-success'>$msg</div>"; 
    }

    public static function validateError($data = array(), $user = null)
    {

        if($user != null)
        {
            if($data['nome'] == $user['nome'] && $data['email'] == $user['email'] && $data['telefone'] == $user['telefone'])
            {
                return User::getError('Dados enviados são os mesmos já cadastrados');
            } 
        } 

        if(empty($data['nome']))
        {
            return User::getError('Erro, digite seu nome!');
        } 

        else if(empty($data['email']))
        {
            return User::getError('Erro, digite seu email!');
        } 

        else if(empty($data['telefone']))
        {
            return User::getError('Erro, digite seu telefone!');
        }

        else if(strlen($data['telefone']) < 10)
        {
            return User::getError('Telefone incorreto, digite novamente');
        }     
        else 
        {
            $users = User::list();
            foreach($users as $user)
            {
                if($data['email'] == $user['email'])
                {
                    return User::getError('Email já cadastrado no sistema');
                }
            }
        }

    }

}

