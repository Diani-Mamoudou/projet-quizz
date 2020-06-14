<?php

class UserManager extends Manager
{

    function __construct()
    {
        $this->className = "User";
    }



    public function create($objet)
    {
    }
    public function update($objet)
    {
    }
    public  function delete($id)
    {
    }
    public function findAll()
    {
    }
    public function findById($id)
    {
    }
    public function loginExist($login)
    {
        $sql = "select * from $this->className where login='$login'";
        $veri = $this->ExecuteSelect($sql);
        return $veri;
    }

    public function add($objet)
    {
        $sql = "INSERT INTO `User` (`id`, `login`, `pwd`, `profil`, `fullName`,`avatar`) VALUES (NULL, '" . $objet->getLogin() . "', '" . $objet->getPwd() . "', '" . $objet->getProfil() . "', '" . $objet->getFullName() . "', '" . $objet->getAvatar() . "');";
        return  $this->executeUpdate($sql) != 0;
    }
    public function getUserByLoginAndPwd($login, $pwd)
    {
        $sql = "select * from $this->className where login='$login' and pwd='$pwd'";
        $user = $this->ExecuteSelect($sql);
        return $user[0];
    }

    public function ListeTTjoueur()
    {
        $objet = "joueur";
        //$sql="select * from $this->className where score IS NOT NULL order By DESC";

        $sql = "SELECT * FROM $this->className WHERE score IS NOT NULL ORDER BY score DESC ";
        //"select * from in "
        //"select * from $this->className where score IS NOT NULL"
        return $this->ExecuteSelect($sql);
    }

    public function ListeJoueur()
    {
        $objet = "joueur";
        //$sql="select * from $this->className where score IS NOT NULL order By DESC";

        $sql = "SELECT * FROM $this->className WHERE score IS NOT NULL ORDER BY score DESC LIMIT 5 ";
        //"select * from in "
        //"select * from $this->className where score IS NOT NULL"
        return $this->ExecuteSelect($sql);
    }
}
