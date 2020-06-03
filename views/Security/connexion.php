
<?php
  //var_dump($erreurs);
?>



  <div class="p-0 container-fluid">
    

    
    <div class="d-block top m-0 p-0 col-4 bg-white m-auto font-weight-bold rounded shadow-sm" style="z-index:1;">
      <h2 class=" m-0 col-12 text-white w-100 bg-colorA" style="font-size: 20px;">
        <p class="p-4">Login Form</p>
      </h2>
      <?php
              if (isset($err_login)){
            ?>
            <small id="helpId" class="text-danger font-weight-bold" style="margin-left: 70px"><?=$err_login?>!!! </small>
            <?php
              }
            ?>
      <form method="post" action="<?=WEBROOT?>security/seConnecter">
        <div class="m-4 pb-2">
          <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Login" style="height: 60px;">
            <?php
              if (isset($erreurs['login'])){
            ?>
            <small id="helpId" class="text-danger"><?=$erreurs['login']?> </small>
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="pwd" id="" placeholder="Password" style="height: 60px;">
            <?php
              if (isset($erreurs['pwd'])){
            ?>
            <small id="helpId" class="text-danger"><?=$erreurs['pwd']?> </small>
            <?php
              }
            ?>
          </div>
          <div class="mb-5">
            <button style="background-color: #51bfd0;" type="submit" name="btn_connexion" class="mr-5 btn text-white" style="height: 60px; width:140px;"  >Connexion</button>
            <a href="/projet-quizz/security/loadViewInscrip" class="text-black-50">S'inscrire pour jouer?</a>
          </div>
        </div>
      </form>
    </div>

  </div>
