<?php


namespace App\Model;


use App\Config\DB;
use App\Lib\Crud;

class User extends Crud
{

    protected $tabela = 'user';

    private $name;
    private $mail;
    private $password;


    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }



    public function insert() {
        $sql = "INSERT INTO $this->tabela (name, mail, password) VALUES (:nome, :email, :password)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nome', $this->name);
        $stm->bindParam(':email', $this->mail);
        $stm->bindParam(':password', $this->password);

        return $stm->execute()->lastInsertId();
    }


    public function update($id) {
        $sql = "UPDATE $this->tabela SET name = :nome, mail = :email, password =:password WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->name);
        $stm->bindParam(':email', $this->mail);
        $stm->bindParam(':password', $this->password);

        return $stm->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stm->execute();
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}