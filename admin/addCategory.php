<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add Category</h2>
      <div class="alertMessage error">
        <p>This is a test error message</p>
      </div>
      <form action="">
        <input type="text" placeHolder="Title">
        <textarea rows="4" placeholder="Description"></textarea>
        <button type="submit" class="btn">Add Category</button>
      </form>
    </div>
  </section>  


<?php
  include '../partials/footer.php';
?>