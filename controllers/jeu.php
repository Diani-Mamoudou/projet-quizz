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

  public function listeJoueurs()
  {
    $this->manager = new userManager();
    $joueur = $this->manager->ListeJoueur();
    $this->data['joueur'] = $joueur;
    $_SESSION['joueur'] = $this->data['joueur'];
    $this->views = "listeJoueurs";
    $this->render();
  }
}
