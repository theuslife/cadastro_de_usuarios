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

    public function getUser($id)
    {

        $sql = new Sql();
        $result = $sql->select('SELECT * FROM tb_pessoa WHERE id = :id', [
            ':id'=>$id
        ]);

        if(count($result) > 0)
        {
            $this->setValues($result[0]);
        }

    }

    public function update()
    {
        $sql = new Sql();
        $select->select('UPDATE tb_pessoa SET(nome = :nome, email = :email, telefone = :telefone) WHERE id = :id', [
            ':id'=>$this->getid(),
            ':nome' => $this->getnome(),
            ':email' => $this->getemail(),
            ':telefone' => $this->gettelefone()
        ]);
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

