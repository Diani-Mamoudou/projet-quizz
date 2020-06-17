<?php

class Security extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->dirname = "security";
    $this->layout = "layout_connexion";

    session_start();
  }

  public function index()
  {
    $this->views = "connexion";
    $this->render();
  }

  public function loadViewInscrip()
  {
    if (!empty($_SESSION) && $_SESSION['user']->getProfil() == "admin") {
      $this->layout = "layout_admin";
    }
    $this->views = "inscription";
    $this->render();
  }


  public function seConnecter()
  {
    if (isset($_POST['btn_connexion'])) {
      extract($_POST);
      $this->validator->is_empty($login, 'login', 'login obligatoire');
      $this->validator->is_empty($pwd, 'pwd', 'password obligatoire');

      if ($this->validator->is_valid()) {
        $this->manager = new userManager();
        $user = null;
        $user = $this->manager->getUserByLoginAndPwd($login, $pwd);
        if (!empty($user)) {
          $this->data['userConnect'] = $user;
          $_SESSION['user'] = $this->data['userConnect'];
          if ($user->getProfil() === "admin") {
            $this->dirname = "admin";
            $this->layout = "layout_admin";
            $this->views = "listeJoueurs";
            $this->render();
          } elseif ($user->getProfil() === "joueur") {
            $joueur = $this->manager->ListeJoueur();
            $this->data['joueur'] = $joueur;
            $_SESSION['joueur'] = $this->data['joueur'];
            $this->dirname = "jeu";
            $this->layout = "layout_joueur";
            $this->views = "jeu";
            $this->render();
          }
        } else {
          $this->data['err_login'] = "login ou mot de passe incorect";
          $this->views = "connexion";
          $this->render();
        }
      } else {
        $erreurs = $this->validator->getErrors();
        $this->data['erreurs'] = $erreurs;
        $this->views = "connexion";
        $this->render();
      }
    } else {
      $this->index();
    }
  }

  public function seDeconnecter()
  {
    if (isset($_POST['btn_logout'])) {
      $this->data = [];
      $_SESSION['user'] = [];
      session_destroy();
      header("Status: 301 Moved Permanently", false, 301);
      header("Location: " . WEBROOT);
      exit;
    }

    $this->views = "connexion";
    $this->render();
  }



  public function creerUtlisateur()
  {
    $profil = "joueur";
    if (!empty($_SESSION) && $_SESSION['user']->getProfil() == "admin") {
      $profil = "admin";
    }

    $this->manager = new userManager();


    if (isset($_POST['btn_register'])) {
      extract($_POST);

      $this->validator->is_empty($prenom, 'prenom', "Prenom  Obligatoire");
      $this->validator->is_empty($nom, 'nom', "Nom  Obligatoire");
      $this->validator->is_empty($pseudo, 'pseudo', "Login Obligatoire");
      $this->validator->is_empty($password1, 'password1', "Mot de Passe  Obligatoire");
      $this->validator->is_empty($confirmPassword, 'password2', "Mot de Passe  Obligatoire");


      if ($this->validator->is_valid()) {
        $this->validator->is_Egal($password1, $confirmPassword, "password2", "Les deux Mots de Passe ne sont pas identiques");
        if ($this->validator->is_valid()) {
          $this->validator->is_email($pseudo, 'mail', "veillez entrer un mail valide");
          if ($this->validator->is_valid()) {
            $user = $this->manager->loginExist($pseudo);
            if ($user == null) {





              if ($_FILES["imgUser"] !== null) {
                $target_dir = "assets/image/upload/";
                $target_file = $target_dir . basename($_FILES["imgUser"]["name"]); //Affiche le cheminde l'image
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //Extension de l'image
                $check = getimagesize($_FILES["imgUser"]["tmp_name"]); //Renvoie les infos dont la taille
                if ($check !== false) {
                  $nameImg = explode("/", $target_file);
                  $avatar = $nameImg[count($nameImg) - 1];
                  $uploadOk = 1;
                  if (!file_exists($target_file)) {
                    if (!move_uploaded_file($_FILES["imgUser"]["tmp_name"], $target_file)) {
                      $erreurs = "Sorry, there was an error uploading your file.";
                      $this->data['erreurs'] = $erreurs;
                      $this->loadViewInscrip();
                    }
                  } else {
                    $erreurs = "renomer l'image";
                    $this->data['erreurs'] = $erreurs;
                    $this->loadViewInscrip();
                    $uploadOk = 0;
                  }
                } else {
                  $erreurs = "File is not an image.";
                  $this->data['erreurs'] = $erreurs;
                  $this->loadViewInscrip();
                  $uploadOk = 0;
                }
              } else {
                $avatar = "placeholder78787XSDD.jpg";
              }

              $compteUser = new User();
              $compteUser->setLogin($pseudo);
              $compteUser->setPwd($password1);
              $compteUser->setFullName($prenom . " " . $nom);
              $compteUser->setProfil($profil);
              $compteUser->setAvatar($avatar);

              $result = $this->manager->add($compteUser);
              if ($result) {
                $this->data['success_login'] = "Création effectuée";
                $this->loadViewInscrip();
              }
            } else {
              $this->data['err_login'] = "login existe déja";
              $this->loadViewInscrip();
            }
          } else {
            $erreurs = $this->validator->getErrors();
            $this->data['erreurs'] = $erreurs;
            $this->loadViewInscrip();
          }
        } else {
          $erreurs = $this->validator->getErrors();
          $this->data['erreurs'] = $erreurs;
          $this->loadViewInscrip();
        }
      } else {
        $erreurs = $this->validator->getErrors();
        $this->data['erreurs'] = $erreurs;
        $this->loadViewInscrip();
      }
    } else {
      $this->loadViewInscrip();
    }
  }
}
