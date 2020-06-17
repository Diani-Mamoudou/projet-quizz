<?php
class QuestionManager extends Manager
{

    function __construct()
    {
        $this->className = "Question";
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


    public function add($objet)
    {
        $sql = "INSERT INTO `Question` (`idQuestion`, `libelle`, `type`, `nbRep`, `reponse`, `point`) VALUES (NULL, '" . $objet->getLibelle() . "', '" . $objet->getType() . "',  '" . $objet->getNbRep() . "', '" . $objet->getReponse() . "', '" . $objet->getPoint() . "');";
        return  $this->executeUpdate($sql) != 0;
    }

    public function selectQ()
    {
        $sql = "SELECT * FROM $this->className LIMIT 5 ";
        $veri = $this->ExecuteSelect($sql);
        return $veri;
    }
}
