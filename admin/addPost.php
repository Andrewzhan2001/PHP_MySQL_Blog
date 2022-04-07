<?php
  include 'partials/header.php';
?>

  <section class="formSection">
    <div class="container formSectionContainer">
      <h2>Add Post</h2>
      <div class="alertMessage error">
        <p>This is a test error message</p>
      </div>
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
          <label for="thumbnail">Add Thumbnail</label>
          <input type="file" id="thumbnail">
        </div>
        <button type="submit" class="btn">Add Post</button>
      </form>
    </div>
  </section>  

<?php
  include '../partials/footer.php';
?>