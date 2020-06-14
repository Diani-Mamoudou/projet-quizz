<?php

class admin extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->dirname = "admin";
        $this->layout = "layout_admin";
        session_start();
    }
    
    public function listeJoueurs()
    {
        $this->manager = new userManager();
        $joueur = $this->manager->ListeTTjoueur();
        $this->data['joueur'] = $joueur;
        $_SESSION['joueur'] = $this->data['joueur'];
        $this->views = "listeJoueurs";
        $this->render();
    }
    public function loadViewcreerQuestion()
    {
        $this->views = "creerQuestions";
        $this->render();
    }

    public function creerQuestions()
    {

        $this->validator = new Validator();
        if (isset($_POST['btn_register'])) {
            extract($_POST);
            $this->validator->is_empty($libelleQuestion, 'libelleQuestion', "veuillez entrer une question");
            $this->validator->is_empty($typeReponse, 'typeReponse', "le type de reponse est necessaire");
            if ($this->validator->is_valid()) {

                $question = new Question();
                $question->setLibelle($libelleQuestion);
                $question->setType($typeReponse);

                //partie réponse
                $success = "enregistrement fait";
                $this->data['success'] = $success;
                $this->views = "creerQuestions";
                $this->loadViewcreerQuestion();
            } else {
                $erreurs = $this->validator->getErrors();
                $this->data['erreurs'] = $erreurs;
                $this->views = "creerQuestions";
                $this->loadViewcreerQuestion();
            }
        }
    }

    public function listerQuestions()
    {
        $this->views = "listerQuestions";
        $this->render();
    }


    public function creerAdmin()
    {
        $this->dirname = "security";
        $this->views = "inscription";
        $this->render();
    }
}
