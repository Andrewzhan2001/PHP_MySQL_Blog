<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Edit User</h2>
      <form action="" enctype="multipart/form-data">
        <input type="text" placeHolder="First Name">
        <input type="text" placeHolder="Last Name">
        <select>
          <option value="0">Author</option>
          <option value="1">Admin</option>
        </select>
        <button type="submit" class="btn">Update User</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>