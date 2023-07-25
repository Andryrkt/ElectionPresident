
<?php ob_start(); ?>


<?php if(isset($_GET['sucess'])) :?>

    <div class="alert alert-success">Vous êtes connécté</div>

<?php endif ;?>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">Base de donnée</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="listUser.php" class="nav-link active" aria-current="page">Liste</a></li>
        <?php if(isset($_SESSION['auth'])):?>
            <li class="nav-item"><a href="/andranapoo/public/logout" class="nav-link">déconnexion</a></li>
        <?php endif;?>
      </ul>
    </header>
</div>

<?php if(isset($_GET['userAdd']) && $_GET['userAdd'] == 'ok'): ?>
    <div class="alert alert-success" role="alert">
        Utilisateur Ajouter !!!
    </div>
<?php endif ?>


<div class="container">

    <h2 class=" my-4 text-center">LISTE DES PERSONNES ENREGISTRER</h2>
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
  <a href="/andranapoo/public/addUser" class="btn btn-outline-dark my-2">Add User</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search" autocomplete="off">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
    <table class="table table-dark table-striped">
        <thead class="text-center">
            <tr>
                <th>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th>id</th>
                <th>Nom</th>
                <th>email</th>
                <th>mdp</th>
                <th colspan="2">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
             <tr>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </td>
                <td class="text-center"><?=$user->id?></td>
                <td><?=$user->nom?></td>
                <td><?=$user->email?></td>
                <td><?=$user->mdp?></td>
                <td class="text-center">
                    <a href="/andranapoo/public/editUser?detail_id=<?=$user->id?>" class="btn btn-outline-info">Détail</a>
                </td>
                <td class="text-center">
                    <a href="/andranapoo/public/deleteUser?delete_id=<?=$user->id?>" class= " btn btn-outline-danger" onclick=" return confirm('Vous êtes sûr?')" >delete</a>
                </td>
            </tr>
         <?php endforeach?>
        </tbody>
    </table>
</div>

 


 <?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>