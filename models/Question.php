<?php
class Question implements IManager
{
    private $idQuestion;
    private $libelle;
    private $type;
    private $nbRep;
    private $reponse;
    private $point;

    public function __construct($row = null)
    {
        if ($row != null) {
            $this->hydrate($row);
        }
    }

    public function hydrate($row)
    {
        $this->idQuestion = $row['idQuestion'];
        $this->libelle = $row['libelle'];
        $this->type = $row['type'];
        $this->nbRep = $row['nbRep'];
        $this->reponse = $row['reponse'];
        $this->point = $row['point'];
    }

    /**
     * Get the value of idQuestion
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * Set the value of idQuestion
     *
     * @return  self
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get the value of libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of reponse
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set the value of reponse
     *
     * @return  self
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get the value of point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set the value of point
     *
     * @return  self
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get the value of nbRep
     */
    public function getNbRep()
    {
        return $this->nbRep;
    }

    /**
     * Set the value of nbRep
     *
     * @return  self
     */
    public function setNbRep($nbRep)
    {
        $this->nbRep = $nbRep;

        return $this;
    }
}
