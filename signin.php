<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Sign In</h2>
      <div class="alertMessage success">
        <p>This is a test success message</p>
      </div>
      <form action="">
        <input type="text" placeHolder="Username or Email">
        <input type="password" placeHolder="Password">
        <button type="submit" class="btn">Sign In</button>
        <small>Don't have account ? <a href="signup.php">Sign Up</a></small>
      </form>
    </div>
  </section>  

<?php 
  include 'partials/footer.php';
?>
