<?php
  include 'partials/header.php';
  $usernameEmail = $_SESSION['signinData']['usernameEmail'] ?? null;
  $password = $_SESSION['signinData']['password'] ?? null;
  unset($_SESSION['signinData']);
?>
  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Sign In</h2>
      <?php if(isset($_SESSION['signupSuccess'])) : ?>
        <div class="alertMessage success">
          <p>
            <?= $_SESSION['signupSuccess'];
                unset($_SESSION['signupSuccess']);
            ?>
          </p>
        </div>
      <?php elseif (isset($_SESSION['signin'])) : ?>
				<div>
					<p class="alertMessage error">
						<?= $_SESSION['signin'];
						unset($_SESSION['signin']);
						?>
					</p>
				</div>
			<?php endif; ?>
      <form action="signinLogic.php" method="POST">
        <input type="text" name="usernameEmail" value="<?=$usernameEmail?>" placeHolder="Username or Email">
        <input type="password" name="password" value="<?=$password?>"  placeHolder="Password">
        <button type="submit" name="submit" class="btn">Sign In</button>
        <small>Don't have account ? <a href="signup.php">Sign Up</a></small>
      </form>
    </div>
  </section>  

<?php 
  include 'partials/footer.php';
?>
