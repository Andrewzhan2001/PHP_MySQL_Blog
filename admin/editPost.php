<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Edit Post</h2>
      <form action="" enctype="multipart/form-data">
        <input type="text" placeHolder="Title">
        <select>
          <option value="1">Travel</option>
          <option value="1">Art</option>
          <option value="1">Science & Technology</option>
          <option value="1">Travel</option>
          <option value="1">Travel</option>
          <option value="1">Travel</option>
        </select>
        <textarea rows="10" placeholder="Body"></textarea>
        <div class="formControl inline">
          <input type="checkbox" id="isFeatured" checked>
          <label for="isFeatured">Featured</label>
        </div>
        <div class="formControl">
          <label for="thumbnail">Update Thumbnail</label>
          <input type="file" id="thumbnail">
        </div>
        <button type="submit" class="btn">Update Post</button>
      </form>
    </div>
  </section>  
  
<?php
  include '../partials/footer.php';
?>