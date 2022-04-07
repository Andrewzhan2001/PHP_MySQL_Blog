<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add User</h2>
      <div class="alertMessage error">
        <p>This is a test error message</p>
      </div>
      <form action="" enctype="multipart/form-data">
        <input type="text" placeHolder="First Name">
        <input type="text" placeHolder="Last Name">
        <input type="text" placeHolder="Username">
        <input type="email" placeHolder="Email">
        <input type="password" placeHolder="Create Password">
        <input type="password" placeHolder="Confirm Password">
        <select>
          <option value="0">Author</option>
          <option value="1">Admin</option>
        </select>
        <div class="formControl">
          <label for="avatar" >User Avatar</label>
          <input type="file" id="avatar">
        </div>
        <button type="submit" class="btn">Add User</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>