
<?php ob_start(); ?>

<div class="container d-flex justify-content-center ">
  <main>
    <div class="text-center">
      <h2>Enregistrer un utilisateur</h2>
      
    </div>

    <div class="row g-5>
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Renseignement principal</h4>
      

        <form class="needs-validation" id="addUserForm" method="POST">
          <div class="row g-3">

            <div class="col-12">
              <label for="nom" class="form-label">First Name</label>
              <input type="text" class="form-control" id="nom" name="nom" required >
              <small></small>
            </div>

            <div class="col-12 mb-4">
              <label for="email" class="form-label">email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Tsarahomba@code.com" >
              <small></small>
            </div>
         
            <div class="col-12 mb-4">
              <label for="mdp" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="mdp" name="mdp"  >
              <small></small>
            </div>


            <!-- <div class="col-12">
              <select class="form-select" name="groupe" aria-label="Default select example"> -->
                <!-- <option selected disabled>Choisir votre civilité</option> -->
               <!-- <option value="1">Admin</option>
                <option value="2">Operateur de saisie</option>
              </select>
            </div> -->
          <button class="w-100 btn btn-primary btn-lg mb-2" type="submit" name="enregistrer" id="liveToastBtn" >Enregistrer</button>
          <button class="w-100 btn btn-secondary btn-lg" type="reset">Annuler</button>

        </form>
        <a href="login.php">Login</a>
      </div>
    </div>
  </main>

  
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

use view\home\Form;

