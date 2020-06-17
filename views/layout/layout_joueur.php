<?php require_once("./views/layout/inc/header.inc.php") ?>
<div class="container col-9 fixed-top fixed-bottom rounded p-0 bg-colorD" style="top: 13%; bottom: 1%;">
    <div class="container-fluid rounded-top w-100 bg-colorA d-flex justify-content-center p-3">
        <div class="container">
            <div class="">
                <img src="<?= WEBROOT ?>/assets/image/upload/<?= $_SESSION['user']->getAvatar() ?>" alt="" class="rounded-circle float-left mr-5" style="width:60px;height:50px;">
                <h6 class="text-white"><?= $_SESSION['user']->getFullName() ?></h6>
            </div>
        </div>
        <div class="col-8 w-100">
            <h3 class="text-white float-right " style="font-size: 1.30rem;margin-right:180px;">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3>
            <h3 class="text-white float-right" style="font-size: 1.30rem;margin-right:145px;">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</h3>
        </div>

        <div class="col-3">
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn bg-colorC float-right border-top rounded text-white shadow" style="text-shadow:1px 1px 2px black;"><a class="text-decoration-none text-white">Deconnexion</a></button>
        </div>
    </div>

    <div class="h-100">
        <?php echo $content_for_layout; ?>

    </div>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Déja?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment vous déconnecter ?
            </div>
            <form action="<?= WEBROOT ?>security/seDeconnecter" method="post">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <button type="submit" name="btn_logout" class="btn btn-success">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once("./views/layout/inc/footer.inc.php") ?>