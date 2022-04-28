<?php
  include 'partials/header.php';
  $query = "SELECT * FROM categories";
  $categories = mysqli_query($connection, $query);

  $title = $_SESSION['addPostData']['title'] ?? null;
  $body = $_SESSION['addPostData']['body'] ?? null;
  $userIsAdmin = $_SESSION['userIsAdmin'] ?? null;

  unset($_SESSION['addPostData'])
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add Post</h2>
      <?php if (isset($_SESSION['addPost'])) : ?>
        <div>
          <p class="alertMessage error">
            <?= $_SESSION['addPost'];
            unset($_SESSION['addPost'])
            ?></p>
        </div>
      <?php endif; ?>
      <form action="addPostLogic.php" enctype="multipart/form-data" method = "POST">
        <input type="text" value = "<?= $title ?>" name="title" placeHolder="Title">
        <select name="category">
          <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
          <?php endwhile; ?>
        </select>
        <textarea rows="10" name="body" placeholder="Body"><?= $body ?></textarea>
        <?php if (isset($userIsAdmin)) : ?>
          <div class="formControl inline">
            <input type="checkbox" id="isFeatured" value="1" name="isFeatured" checked>
            <label for="isFeatured">Featured</label>
          </div>
        <?php endif ?>
        <div class="formControl">
          <label for="thumbnail">Add Thumbnail</label>
          <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <button type="submit" name="submit" class="btn">Add Post</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>