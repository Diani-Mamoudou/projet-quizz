<?php
class UserManager extends Manager
{

    function __construct()
    {
        $this->className = "Question";
    }

    public function add($objet)
    {
        $sql = "INSERT INTO `Question` (`id`, `libelle`, `type`) VALUES (NULL, '" . $objet->getLibelle() . "', '" . $objet->getType() . "');";
        return  $this->executeUpdate($sql) != 0;
    }

    public function findAll($nb)
    {
        $sql = "select * from $this->className";
        return $this->ExecuteSelect($sql);
    }
}
