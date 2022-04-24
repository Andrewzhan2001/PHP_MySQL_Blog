<?php
  include 'partials/header.php';
  $categoryQuery = "SELECT * FROM categories";
  $categories = mysqli_query($connection, $categoryQuery);

  if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
  } else {
    header('location:' . rootURL . 'admin/');
    die();
  }
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Edit Post</h2>
      <form action="<?=rootURL?>admin/editPostLogic.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>" >
        <input type="hidden" name="previousThumbnail" value="<?= $post['thumbnail'] ?>" >
        <input type="text" name="title" value="<?= $post['title'] ?>" placeHolder="Title">
        <select name="category">
          <?php while($category = mysqli_fetch_assoc($categories)) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
          <?php endwhile; ?>
        </select>
        <textarea rows="10" name="body" placeholder="Body"><?= $post['body'] ?></textarea>
        <div class="formControl inline">
          <input type="checkbox" name="isFeatured id="isFeatured" value= "1" checked>
          <label for="isFeatured">Featured</label>
        </div>
        <div class="formControl">
          <label for="thumbnail">Update Thumbnail</label>
          <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <button type="submit" name="submit" class="btn">Update Post</button>
      </form>
    </div>
  </section>  
  
<?php
  include '../partials/footer.php';
?>