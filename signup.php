<?php
  include 'partials/header.php';

  //get back the form data just submitted if there was a error of registration.
  $firstname = $_SESSION['signupData']['firstname'] ?? null;
  $lastname = $_SESSION['signupData']['lastname'] ?? null;
  $username = $_SESSION['signupData']['username'] ?? null;
  $email = $_SESSION['signupData']['email'] ?? null;
  $createPassword = $_SESSION['signupData']['createPassword'] ?? null;
  $confirmPassword = $_SESSION['signupData']['confirmPassword'] ?? null;

  // delete session
  unset($_SESSION['signupData']);
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Sign Up</h2>
      <?php if(isset($_SESSION['signup'])): ?>
        <div class="alertMessage error">
          <p>
            <?= $_SESSION['signup'];
            unset($_SESSION['signup']);
            ?>
          </p>
        </div>
      <?php endif ?>
      <form action="signupLogic.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="firstname" value="<?=$firstname?>" placeHolder="First Name">
        <input type="text" name="lastname" value="<?=$lastname?>" placeHolder="Last Name">
        <input type="text" name="username" value="<?=$username?>" placeHolder="Username">
        <input type="email" name="email" value="<?=$email?>" placeHolder="Email">
        <input type="password" name="createPassword" value="<?=$createPassword?>" placeHolder="Create Password">
        <input type="password" name="confirmPassword" value="<?=$confirmPassword?>" placeHolder="Confirm Password">
        <div class="formControl">
          <label for="avatar" >User Avatar</label>
          <input type="file" name="avatar" id="avatar">
        </div>
        <!-- button with type submit will send form information to the server -->
        <button type="submit" name="submit" class="btn">Sign Up Now ! ! !</button>
        <small>Already have an account ? <a href="signin.php">Sign In</a></small>
      </form>
    </div>
  </section>  

<?php 
  include 'partials/footer.php';
?>
