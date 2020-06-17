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
        $this->question = new QuestionManager();
        $this->validator = new Validator();
        if (isset($_POST['btn_register'])) {
            extract($_POST);

            $x = count($_POST);
            $y = array_keys($_POST);
            $tab = [];
            for ($i = 0; $i < $x - 1; $i++) {
                if ($y[$i + 1] === "optRadio") {
                    $tab[] = $y[$i];
                }
            }

            if (isset($_POST['reponse2'])) {



                $nbRep = 2;
                $this->validator->is_empty($libelleQuestion, 'libelleQuestion', "veuillez entrer une question");
                $this->validator->is_empty($reponse1, 'reponse', "la reponse est necessaire");
                $this->validator->is_empty($reponse2, 'reponse', "la reponse est necessaire");
                if (isset($_POST['reponse3'])) {
                    $this->validator->is_empty($reponse3, 'reponse', "la reponse est necessaire");
                    $nbRep = 3;
                }
                if (isset($_POST['reponse4'])) {
                    $this->validator->is_empty($reponse4, 'reponse', "la reponse est necessaire");
                    $nbRep = 4;
                }
                $con = " ";
                for ($i = 1; $i <= $nbRep; $i++) {
                    if (in_array("reponse" . $i, $tab)) {
                        $con = $con . ($_POST["reponse" . $i] . "/true/");
                    } else {
                        $con = $con . ($_POST["reponse" . $i] . "/false/");
                    }
                }
                if ($this->validator->is_valid()) {

                    $question = new Question();
                    $question->setLibelle($libelleQuestion);
                    $question->setType($typeReponse);
                    $question->setNbRep($nbRep);
                    $question->setReponse($con);
                    $question->setPoint($nbrPoint);
                    $result = $this->question->add($question);

                    if ($result) {

                        $success = "enregistrement fait";
                        $this->data['success'] = $success;
                        $this->views = "creerQuestions";
                        $this->loadViewcreerQuestion();
                    } else {
                        $erreurs = "enregistrement echoué";
                        $this->data['err'] = $erreurs;
                        $this->views = "creerQuestions";
                        $this->loadViewcreerQuestion();
                    }
                } else {
                    $erreurs = $this->validator->getErrors();
                    $this->data['erreurs'] = $erreurs;
                    $this->views = "creerQuestions";
                    $this->loadViewcreerQuestion();
                }
            } else {
                $erreurs = "le nombre de reponse doit etre au moins 2";
                $this->data['err'] = $erreurs;
                $this->views = "creerQuestions";
                $this->loadViewcreerQuestion();
            }
        }
    }

    public function listerQuestions()
    {
        $this->question = new questionManager();
        $questions = $this->question->selectQ();
        $this->data['questions'] = $questions;
        $_SESSION['questions'] = $questions;
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
