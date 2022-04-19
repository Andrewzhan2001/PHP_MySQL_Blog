<?php
  include 'partials/header.php';

  $title = $_SESSION['addCategoryData']['title'] ?? null;
  $description = $_SESSION['addCategoryData']['description'] ?? null;
  unset($_SESSION['addCategoryData']);
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add Category</h2>
      <?php if(isset($_SESSION['addCategory'])) : ?>
        <div class="alertMessage error">
          <p>
            <?= $_SESSION['addCategory'];
            unset($_SESSION['addCategory']);
            ?>
          </p>
        </div>
      <?php endif ?>
      <form action="<?= rootURL ?>admin/addCategoryLogic.php" method="POST">
        <input type="text" name="title" value="<?= $title ?>"  placeHolder="Title">
        <textarea rows="4" name="description" placeholder="Description"><?= $description ?></textarea>
        <button type="submit" name="submit" class="btn">Add Category</button>
      </form>
    </div>
  </section>  


<?php
  include '../partials/footer.php';
?>