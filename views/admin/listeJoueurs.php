<?php



function liste()
{
  foreach ($_SESSION['joueur'] as $key => $value) {
    $fname = explode(" ", $value->getFullName())
?>
    <tr>
      <td><?= $fname[0] ?> </td>
      <td><?= $fname[0] ?> </td>
      <td><?= $value->getScore() ?> pts</td>
    </tr>

<?php
  }
}
?>

<div class="container w-100 h-100 bg-white rounded" style="margin-right=1%;margin-left:10px">
  <h4 class="text-center font-family: 'Open Sans', sans-serif">LISTE DES JOUEUR PAR SCORE</h4>





  <div class="contain_sub " style="border:solid 2px #48d1cc;border-radius: 10px; height: 539px;">
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