<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Sign Up</h2>
      <div class="alertMessage error">
        <p>This is an test error message</p>
      </div>
      <form action="" enctype="multipart/form-data">
        <input type="text" placeHolder="First Name">
        <input type="text" placeHolder="Last Name">
        <input type="text" placeHolder="Username">
        <input type="email" placeHolder="Email">
        <input type="password" placeHolder="Create Password">
        <input type="password" placeHolder="Confirm Password">
        <div class="formControl">
          <label for="avatar" >User Avatar</label>
          <input type="file" id="avatar">
        </div>
        <button type="submit" class="btn">Sign Up Now ! ! !</button>
        <small>Already have an account ? <a href="signin.php">Sign In</a></small>
      </form>
    </div>
  </section>  

<?php 
  include 'partials/footer.php';
?>
