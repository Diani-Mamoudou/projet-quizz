<?php
class Question implements IManager
{
    private $idQuestion;
    private $libelle;
    private $type;

    public function __construct($row = null)
    {
        if ($row != null) {
            $this->hydrate($row);
        }
    }

    public function hydrate($row)
    {
        $this->id = $row['idQuestion'];
        $this->fullName = $row['libelle'];
        $this->login = $row['type'];
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
}
