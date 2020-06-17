<?php


function liste()
{
    foreach ($_SESSION['joueur'] as $key => $value) {
        $fname = explode(" ", $value->getFullName())
?>
        <tr>
            <td><?= $fname[0] ?> </td>
            <td><?= $fname[1] ?> </td>
            <td><?= $value->getScore() ?> pts</td>
        </tr>

<?php
    }
}
?>
<div class="container p-0 col-11  m-15 rounded shadow bg-white d-flex justify-content-center align-items-stretch" style="height:80%;margin-top:20px;">
    <div class="bg-white col-6" style="left:0%;padding:20px; margin-top:15px;margin-bottom:15px;border:solid 2px #51bfd0;border-radius:2px;">
        <div class="text-center w-100 bg-light" style="border-bottom:solid 1px #51bfd0;border-right:solid 1px #51bfd0;">
            <h2 class="font-weight-bolder"><ins>Question 1/5</ins></h2>
            <h3 class="font-weight-normal">les langages web</h3>
        </div>
        <div class="w-100 h-25">
            <a href="#" class="btn btn-light disabled float-right mt-3 bg-light text-dark" style="border-bottom:solid 1px #51bfd0; height:48px;" role="button" aria-disabled="true">3pts</a>
        </div>
        <div class=" col-12 w-100 p-0" style="height: 22%; margin-left: 0px;">
            <input type="hidden" id="" typechoix="#">
            <ul class=" ul admin">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">
                        <h4>Personal Home Page</h4>
                    </label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">
                        <h4>Personal Home Page</h4>
                    </label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                    <label class="custom-control-label" for="customCheck4">
                        <h4>Personal Home Page</h4>
                    </label>
                </div>
            </ul>

        </div>

        <div class="container ml-1 mt-5">
            <button class=" float-right mt-3 bg-colorA text-white btn-lg" type="button">suivant</button>
        </div>
        <div class="container mt-1 bg-">
            <button class="mt-2 text-white bg-secondary btn-lg " type="button">precedant</button>
        </div>
    </div>

    <div class="bg-white col-5 pt-4" style=" margin:15px;">

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Top score
                        </button>
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Mon meilleur score
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="contain_sub h-100" style="border:solid 2px #48d1cc;border-radius: 10px;">
                            <table class="table table-borderless" style="margin-left:10px">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php liste(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <h3>Votre meilleur score est:</h3><?= $_SESSION['user']->getScore() ?> pts
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>