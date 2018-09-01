<?php

namespace User;
use Database\Sql;

class User
{
    private $nome;
    private $success = false;
    private $error = false;

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
        return $result;

    }

    public function update()
    {
        $sql = new Sql();
        $select->select('UPDATE tb_pessoa SET(nome = :nome, email = :email, telefone = :telefone) WHERE id = :id', [
            ':nome' => $this->nome(),
            ':email' => $this->email(),
            ':telefone' => $this->telefone()
        ]);
    }

}

