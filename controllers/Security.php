<?php
   
  class Security extends Controller {

    public function __construct(){
      parent::__construct();
        $this->dirname="security";
        $this->layout="layout_connexion"; 
    }

    public function index(){
       $this->views="connexion";
       $this->render();
      
    }

   public function loadViewInscrip(){
    $this->views="inscription";
    $this->render();
   }


    public function seConnecter(){
      if (isset($_POST['btn_connexion'])){
        extract($_POST);
        $this->validator->is_empty($login,'login','login obligatoire');
        $this->validator->is_empty($pwd,'pwd','password obligatoire');
        
        if($this->validator->is_valid()){
          $this->manager=new userManager();
          $user=null;
          $user=$this->manager->getUserByLoginAndPwd($login,$pwd);
          if(!empty($user)){
            $this->data['userConnect']=$user;
            if($user->getProfil()==="admin"){
              $this->dirname="admin";
              $this->layout="layout_admin"; 
              $this->views="listeJoueurs";
              $this->render();
            }//le else doit contenirle render vers joueur
          }else{
            $this->data['err_login']="login ou mot de passe incorect";
            $this->views="connexion";
            $this->render();
          }
        }else{
          $erreurs= $this->validator->getErrors() ;
          $this->data['erreurs']=$erreurs;
          $this->views="connexion";
          $this->render();
        }
      }else{
        $this->index();
      }
    }

    public function seDeconnecter(){
         echo 0; 
    }
    public function creerUtlisateur(){
        
    }

   }