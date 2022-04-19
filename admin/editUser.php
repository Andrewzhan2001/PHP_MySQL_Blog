<?php
  include 'partials/header.php';

  if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
  } else {
    header('location: ' . rootURL . 'admin/manageUsers.php');
    die();
  }
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Edit User</h2>
      <form action="<?=rootURL?>admin/editUserLogic.php" method="POST">
        <input type="hidden" value="<?=$user['id']?>" name="id">
        <input type="text" value="<?=$user['firstname']?>" name="firstname" placeHolder="First Name">
        <input type="text" value="<?=$user['lastname']?>" name="lastname" placeHolder="Last Name">
        <select name="userRole">
          <option value="0">Author</option>
          <option <?= $user['is_admin'] ? 'selected' : '' ?> value="1">Admin</option>
        </select>
        <button type="submit" name="submit" class="btn">Update User</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>