<?php ob_start(); ?>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="nom" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="mdp" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="/andranapoo/public/addUser">Signup</a>
        </div>
      </form>
    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('layout.php') ?>
