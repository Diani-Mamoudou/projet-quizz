<?php
   
  class admin extends Controller {

    public function __construct(){
        parent::__construct();
        $this->dirname="admin";
        $this->layout="layout_admin";
    }
    public function listeJoueurs(){
        $this->views="listeJoueurs";
        $this->render();
    }
    
    public function creerQuestions(){
        $this->views="creerQuestions";
        $this->render();
    }
    public function listerQuestions(){
        $this->views="listerQuestions";
        $this->render();
    }
    public function creerAdmin(){
        $this->dirname="security";
        $this->views="inscription";
        $this->render();
    }
  }