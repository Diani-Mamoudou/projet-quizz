<div class="container p-0 w-100 h-100 m-15 rounded shadow bg-white d-flex justify-content-center align-items-stretch">
  <div class="bg-white col-7" style="left:0%;padding:20px;">
    <section class="col-9 d-block" style="left: -13%;">
      <h2 class="w-100 col-6 p-0" style="margin-left: 0%;">
        S'inscrire
      </h2>
      <p class="w-100 m-0 col-12 p-0" style="font-size: 13px;">Pour proposer des quizz</p>
    </section>


    <div style="margin-left: -10%; padding:20px;">

      <form method="post" id="form-inscription" enctype="multipart/form-data" action="<?= WEBROOT ?>/security/creerUtlisateur " class="col-10 p-0">
        <?php
        if (isset($err_login)) {
        ?>
          <small id="fileHelpId" class="form-text text-danger font-weight-bold"><?= $err_login ?></ small>
          <?php
        }
          ?>

          <?php
          if (isset($success_login)) {
          ?>
            <small id="fileHelpId" class="form-text text-success font-weight-bold"><?= $success_login ?></ small>
            <?php
          }
            ?>
            <div class="form-group m-0">
              <label for="formGroupExampleInput" class="m-0">Prénom</label>
              <input type="text" id="prenom" name="prenom" class="form-control" error="error_prenom" placeholder="Entrez votre prénom" style="height:24px;margin:3px">
              <small class="text-danger" style="margin-left:15px;" id="error_prenom"></small>
              <?php
              if (isset($errors['prenom'])) {
              ?>
                <small id="fileHelpId" class="form-text text-danger font-weight-bold"><?= $errors['prenom'] ?></ small>
                <?php
              }
                ?>
            </div>
            <div class="form-group m-0">
              <label for="formGroupExampleInput2" class="m-0">Nom</label>
              <input type="text" name="nom" error="error_nom" id="nom" class="form-control" placeholder="Entrez votre nom" style="height: 24px;margin:3px">
              <small class="text-danger" id="error_nom" style="margin-left:15px;"></small>
              <?php
              if (isset($errors['nom'])) {
              ?>
                <small id="fileHelpId" class="form-text text-danger font-weight-bold"><?= $errors['nom'] ?></ small>
                <?php
              }
                ?>
            </div>
            <div class="form-group m-0">
              <label for="formGroupExampleInput" class="m-0">Login</label>
              <input type="text" name="pseudo" error="error_login" id="pseudo" class="form-control " placeholder="Entrez votre login" style="height: 24px;margin:3px">
              <small class="text-danger" id="error_login" style="margin-left:15px;"></small>
              <?php
              if (isset($errors['pseudo'])) {
              ?>
                <small id="fileHelpId" class="form-text text-danger font-weight-bold"><?= $errors['pseudo'] ?></ small>
                <?php
              }
                ?>
            </div>
            <div class="form-group m-0">
              <label for="formGroupExampleInput2" class="m-0">Password</label>
              <input type="password" name="password1" error="error_password" class="form-control" id="password" placeholder="Entrez votre password" style="height: 24px;margin:3px">
              <small class="text-danger" id="error_password" style="margin-left:15px;"></small>
              <?php
              if (isset($errors['password1'])) {
              ?>
                <small id="fileHelpId" class="form-text text-danger font-weight-bold"><?= $errors['password1'] ?></ small>
                <?php
              }
                ?>
            </div>
            <div class="form-group" style="margin-bottom:0px">
              <label for="formGroupExampleInput2" class="m-0">Confirmer Password</label>
              <input type="password" name="confirmPassword" error="error_confirm" id="confirmPassword" class="form-control" placeholder="Confirmez votre password" style="height: 24px;margin:3px">
              <small class="text-danger" id="error_confirm" style="margin-left:15px;"></small>
            </div>

            <div class="w-100 d-block">
              <span class="d-inline text-dark float-left" style="margin-right: 104px;">Avatar</span>
              <label class="btn btn-default btn-file text-white" style="border:solid 0px; background-color:#51bfd0;">
                choisir un Avatar <input type="file" style="display: none;" id="imgUser" name="imgUser">
              </label>
              <small id="error_avatar" class="text-danger"></small>
            </div>


            <div class="d-flex justify-content-center align-items-center" style="margin-top: 5px;margin-left: 282px;">

              <button style="background-color: #51bfd0;" type="submit" name="btn_register" onclick="" class="btn text-white">Creer compte</button>
            </div>
      </form>
    </div>
  </div>

  <div class="bg-white col-4 pt-4">
    <div class="container rounded-circle" style="height: 150px; width: 150px; border:solid #51bfd0; border-width: 2px;">
      <img style="height: 150px; width: 150px;" id="avatar" class="rounded-circle" src="" alt="">
    </div>

    <p class="text-center w-100">Avatar du joueur</p>
  </div>





  <script type="text/javascript">
    const inputs = document.getElementsByTagName("input");
    for (let input of inputs) {
      input.addEventListener("keyup", function(event) {
        if (event.target.hasAttribute("error")) {
          //recuperer la valeur de l'atribut error
          let idSmall = event.target.getAttribute("error")
          //recuperer l'objet small
          const errorSmall = document.getElementById(idSmall)
          errorSmall.innerText = ""
        }
      });
    }

    document.getElementById("form-inscription").addEventListener("submit", function(event) {
      let valid = true;
      for (let input of inputs) {
        if (!input.value.trim()) {
          valid = false;

          if (input.hasAttribute("error")) {
            //recuperer la valeur de l'atribut error
            let idSmall = input.getAttribute("error")
            //recuperer l'objet small
            const errorSmall = document.getElementById(idSmall)
            errorSmall.innerText = "Champ Obligatoire";
          }
        }
      }
      if (valid == false) {
        event.preventDefault();
        return false;
      }
    });

    // Chargement de l'image
    const imgUpload = document.querySelector("#imgUser");

    const prevUpload = () => {
      // recuperation de l'image du champ
      let fileImg = imgUpload.files[0]
      // transformer l'image en flux d'octets
      let reader = new FileReader();
      if (fileImg) {
        reader.readAsDataURL(fileImg)
        reader.onloadend = function() {
          const avatar = document.querySelector("#avatar")
          avatar.src = reader.result

        }
      }
    }




    // ecouteur evenement
    imgUpload.addEventListener("change", prevUpload)
  </script>
</div>