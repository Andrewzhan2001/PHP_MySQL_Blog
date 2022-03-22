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
      <h2>Sign Up</h2>
      <div class="alertMessage error">
        <p>This is an test error message</p>
      </div>
      <form action="" enctype="multipart/form-data">
        <input type="text" placeHolder="First Name">
        <input type="text" placeHolder="Last Name">
        <input type="text" placeHolder="Username">
        <input type="email" placeHolder="Email">
        <input type="password" placeHolder="Create Password">
        <input type="password" placeHolder="Confirm Password">
        <div class="formControl">
          <label for="avatar" >User Avatar</label>
          <input type="file" id="avatar">
        </div>
        <button type="submit" class="btn">Sign Up Now ! ! !</button>
        <small>Already have an account ? <a href="signin.php">Sign In</a></small>
      </form>
    </div>
  </section>  
</body>
</html>