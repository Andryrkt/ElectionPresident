
<?php ob_start(); ?>

<?php // var_dump($candidats, $message)?>

<div class="container  m-5">
<div>

    <table class="table table-dark table-striped">
        <thead class="text-center">
            <tr>
                <th class="text-center">Candidat n°1</th>
                <th class="text-center">Candidat n°2</th>
                <th class="text-center">Candidat n°3</th>
                <th class="text-center">Candidat n°4</th>
            </tr>
        </thead>
        <tbody>  
            <tr>
                <td class="text-center"><?=$candidats[0]->score?> %</td>
                <td class="text-center"><?=$candidats[1]->score?> %</td>
                <td class="text-center"><?=$candidats[2]->score?> %</td>
                <td class="text-center"><?=$candidats[3]->score?> %</td>   
            </tr>
        </tbody>
    </table>
    
    <div class="alert alert-dark text-center fs-1 fw-bolder fw-bolder" role="alert">
        <?=$message?>
    </div>
</div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>