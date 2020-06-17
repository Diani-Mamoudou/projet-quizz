<?php

class admin extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->dirname = "jeu";
    $this->layout = "layout_joueur";
    session_start();
  }

  public function jouer()
  {
    $this->views = "jeu";
    $this->render();
  }

  public function listeQuestion()
  {
    $this->manager = new userManager();
    $question = $this->manager->ListeJoueur();
    $this->data['question'] = $question;
    $_SESSION['question'] = $this->data['question'];
    $this->views = "jeu";
    $this->render();
  }
}
