<?php
  include 'partials/header.php';
  $firstname = $_SESSION['addUserData']['firstname'] ?? null;
  $lastname = $_SESSION['addUserData']['lastname'] ?? null;
  $username = $_SESSION['addUserData']['username'] ?? null;
  $email = $_SESSION['addUserData']['email'] ?? null;
  $createPassword = $_SESSION['addUserData']['createPassword'] ?? null;
  $confirmPassword = $_SESSION['addUserData']['confirmPassword'] ?? null;
  $userRole = $_SESSION['addUserData']['userRole'] ?? null;

  unset($_SESSION['addUserData']);
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add User</h2>
      <?php if (isset($_SESSION['addUser'])) : ?>
        <div>
          <p class="alertMessage error">
            <?= $_SESSION['addUser'];
            unset($_SESSION['addUser'])
            ?></p>
        </div>
      <?php endif; ?>
      <form action="<?=rootURL?>admin/addUserLogic.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="firstname" value="<?= $firstname ?>" placeHolder="First Name">
        <input type="text" name="lastname" value="<?= $lastname ?>" placeHolder="Last Name">
        <input type="text" name="username" value="<?= $username ?>" placeHolder="Username">
        <input type="email" name="email" value="<?= $email ?>" placeHolder="Email">
        <input type="password" name="createPassword" value="<?= $createPassword ?>" placeHolder="Create Password">
        <input type="password" name="confirmPassword" value="<?= $confirmPassword ?>" placeHolder="Confirm Password">
        <select name="userRole">
          <option selected value="0">Author</option>
          <option value="1">Admin</option>
        </select>
        <div class="formControl">
          <label for="avatar" >User Avatar</label>
          <input type="file" name="avatar" id="avatar">
        </div>
        <button type="submit" name="submit" class="btn">Add User</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>