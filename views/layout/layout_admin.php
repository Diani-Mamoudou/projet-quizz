<?php require_once("./views/layout/inc/header.inc.php") ?>
<div class="container col-9 fixed-top fixed-bottom rounded p-0 bg-colorD" style="top: 13%; bottom: 1%;">
    <div class="container-fluid rounded-top w-100 bg-colorA d-flex justify-content-center p-3">
        <div class="col-9 w-100">
            <h3 class="text-white float-right">CREER ET PARAMETRER VOS QUIZZ</h3>
        </div>

        <div class="col-3">
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn bg-colorC float-right border-top rounded text-white shadow" style="text-shadow:1px 1px 2px black;"><a class="text-decoration-none text-white">Deconnexion</a></button>
        </div>
    </div>
    <div class="container col-11 w-100 m-auto d-flex justify-content-space-around p-auto " style="top:3%; height:83%; margin-right: 10px;padding-left: 10px;padding-right: 10px;">
        <div class="container col-4 h-75 bg-white rounded" style="top:10%;margin-left:15px; margin-right:15px">
            <div class="container-fluid bg-gradient text-white w-100" style="height:50%;">
                <img src="<?= WEBROOT ?>/assets/image/upload/<?= $_SESSION['user']->getAvatar() ?>" alt="..." class="rounded-circle border-dark" style="height:107px; width:107px; margin-left: 10px;margin-top: 58px;">
                <a href="#" class="text-decoration-none text-white">
                    <div><?= $_SESSION['user']->getFullName() ?></div>
                </a>

            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-blanc">
                <div class="container">
                    <a class="navbar-brand text-secondary" href="<?= WEBROOT ?>admin/listerQuestions">Liste question</a>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-blanc">
                <div class="container">
                    <a class="navbar-brand text-secondary" href="<?= WEBROOT ?>security/loadViewInscrip">Creer admin</a>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand text-secondary" href="<?= WEBROOT ?>admin/listeJoueurs">Listes joueurs</a>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light .bg-blanc">
                <div class="container">
                    <a class="navbar-brand text-secondary" href="<?= WEBROOT ?>admin/loadViewcreerQuestion">Creer question</a>
                </div>
            </nav>
        </div>

        <div class="col-8">
            <?php echo $content_for_layout; ?>

        </div>

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