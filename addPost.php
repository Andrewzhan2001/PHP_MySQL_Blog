<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<!--  style sheet -->
  <link rel="stylesheet" href="./style.css">
<!-- iconsount cdn(content delivery network) -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
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
</body>
</html>