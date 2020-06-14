<div class="container w-100 h-100 bg-white rounded" style="margin-right=1%;margin-left:10px; width:450px">
    <div class="container " style=" width:500px;">
        <h2 class="font-weight-bold mb-3" style=" font-size:1.4em;color:#51bfd0"> PARAMETRER VOTRE QUESTION</h2>




        <form method="post" action="" id="question" class=" rounded p-3" style="border:solid 1px #51bfd0;">
            <?php
            if (isset($success[0])) {
            ?>
                <small id="helpId" class="text-danger"><?= $success[0] ?> </small>
            <?php
            }
            ?>
            <div class="form-group row">
                <label for="" class="col-sm-2 text-secondary font-weight-bold col-form-label m-auto" style="font-size:0.9em;"> Questions </label>
                <div class="col-sm-10">
                    <textarea name="libelleQuestion" id="libelleQuestion" class="form-control rounded-0" style=" height:70px; box-shadow: 1px 1px #51bfd0; background-color:#f5f5f5;" placeholder="" aria-describedby="helpId"></textarea>
                    <?php
                    if (isset($erreurs['libelleQuestion'])) {
                    ?>
                        <small id="helpId" class="text-danger"><?= $erreurs['libelleQuestion'] ?> </small>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-4 text-secondary font-weight-bold col-form-label" style="font-size:0.9em;"> Nbre de Points </label>
                <select class="custom-select col-sm-2 rounded-0" name="nbrPoint" id="nbrPoint" style="box-shadow: 1px 1px #51bfd0; background-color:#f5f5f5;">
                    <option value="1">1</option>
                    <option value="2">3</option>
                    <option value="3">5</option>
                    <option value="4">7</option>
                </select>
                <?php
                if (isset($erreurs['nbrePoint'])) {
                ?>
                    <small id="helpId" class="text-danger"><?= $erreurs['nbrePoint'] ?> </small>
                <?php
                }
                ?>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-4 text-secondary font-weight-bold  col-form-label" style="font-size:0.9em;"> Types de réponses </label>
                <select class="custom-select col-sm-7 rounded-0" name="typeReponse" id="typeReponse" style="box-shadow: 1px 1px #51bfd0; background-color:#f5f5f5;">
                    <option value="radio">Bouton radio </option>
                    <option value="checkbox">Bouton checkbox</option>
                    <option value="text">Champ de saisie</option>
                </select>
                <div class="col-sm-1" id="icAjoutReponse">
                    <img src=" <?= WEBROOT ?>/assets/image/ic-ajout-réponse.png" style="margin-left:-10px;">
                </div>
                <?php
                if (isset($erreurs['typeReponse'])) {
                ?>
                    <small id="helpId" class="text-danger"><?= $erreurs['typeReponse'] ?> </small>
                <?php
                }
                ?>
            </div>


            <div class="form-group row" id="champReponse">

            </div>


            <div class="row " style="margin-top:100px;">
                <div class="col-sm-9"> </div>
                <div class="col-sm-3" style="margin-left:-5px;">
                    <button type="submit" class="btn btn-primary rounded-0" name="btn_register" onclick="" style="background-color:#51bfd0; border:none;">Enregistrer</button>
                    <?php
                    if (isset($createSuccess)) {
                    ?>
                        <div class="bg-success rounded p-2 text-white text-center col-5 my-3 mx-auto"><?= $createSuccess ?></div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($createFailed)) {
                    ?>
                        <div class="bg-danger rounded p-2 text-white text-center col-5 my-3 mx-auto"><?= $createFailed ?></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript" src="<?= WEBROOT ?>/assets/js/creerQuestion.js"></script>

</div>