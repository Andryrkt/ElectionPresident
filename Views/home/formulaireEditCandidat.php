
<?php ob_start(); ?>

<div class="container d-flex justify-content-center ">
  <main>
    <div class="text-center">
      <h2>Enregistrer un candidat</h2>
      
    </div>

    <div class="row g-5>
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Renseignement principal</h4>
      

        <form class="needs-validation" id="addUserForm" method="POST">
          <div class="row g-3">

            <div class="col-12">
              <label for="numero" class="form-label">Numero</label>
              <input type="number" class="form-control" id="numero" name="numero" min="0" value="<?=$candidats->numero?>" required>
              <small></small>
            </div>

            <div class="col-12">
              <label for="prenoms" class="form-label">Last Name <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="prenoms" name="nom" value="<?=$candidats->nom?>">
              <small></small>
            </div>

            <div class="col-12 mb-4">
              <label for="score" class="form-label">Score en pourcent</label>
              <input type="number" class="form-control" id="score" name="score" min="0" max="100" value="<?=$candidats->score?>">
              <small></small>
            </div>
         
          <button class="w-100 btn btn-primary btn-lg mb-2"  type="submit" id="liveToastBtn" >Enregistrer La modification</button>
          <button class="w-100 btn btn-secondary btn-lg" type="reset">Annuler</button>

        </form>
        <a href="login.php">Login</a>
      </div>
    </div>
  </main>

  
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

