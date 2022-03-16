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
  <!-- for the navigation bar -->
  <nav>
    <div class="container navContainer">
      <a href="index.php" class="navLogo">Andrew</a>
      <ul class="navItems">
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="signin.php">Signin</a></li>
        <li class = "navProfile">
          <div class="avatar">
            <img src="./images/avatar1.jpg" alt="avatar">
          </div>
          <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <button id = "openNavBtn"><i class="uil uil-bars"></i></button>
      <button id = "closeNavBtn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>

  <!-- for the search bar section -->
  <section class="searchBar">
    <form class="container searchBarContainer" action="">
      <div>
        <i class="uil uil-search"></i>
        <input type="search" name="" placeholder="Search">
      </div>
      <button type="submit" class="btn">Search</button>
    </form>
  </section>

  <!-- for the posts section -->
  <section class="posts">
    <div class="container postsContainer">
      <article class="post">
        <div class="postThumbnail">
          <div class="postThumbnailBorder">
            <img src="./images/blog2.jpg" alt="blog">
          </div>
        </div>
        <div class="postInfor">
          <a href="" class="categoryButton">WildLife</a>
          <h3 class="postTitle"><a href="post.php">This is the second title for the wild life</a></h3>
          <p class="postBody">This is the test paragraph body for the wild life</p>
          <div class="postAuthor">
            <div class="postAuthorAvatar">
              <img src="./images/avatar3.jpg" alt="avatar">
            </div>
            <div class="postAuthorInfo">
              <h5>By: John</h5>
              <small>June 11, 2021 - 07:23</small>
            </div>
          </div>
        </div>
      </article>
      <article class="post">
        <div class="postThumbnail">
          <div class="postThumbnailBorder">
            <img src="./images/blog3.jpg" alt="blog">
          </div>
        </div>
        <div class="postInfor">
          <a href="" class="categoryButton">WildLife</a>
          <h3 class="postTitle"><a href="post.php">This is the second title for the wild life</a></h3>
          <p class="postBody">This is the test paragraph body for the wild life</p>
          <div class="postAuthor">
            <div class="postAuthorAvatar">
              <img src="./images/avatar4.jpg" alt="avatar">
            </div>
            <div class="postAuthorInfo">
              <h5>By: John</h5>
              <small>June 11, 2021 - 07:23</small>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>
  <section class="categoryButtons">
    <div class="container categoryButtonsContainer">
      <a href="" class="categoryButton">Art</a>
      <a href="" class="categoryButton">Wild Life</a>
      <a href="" class="categoryButton">Science & Technology</a>
      <a href="" class="categoryButton">Food</a>
      <a href="" class="categoryButton">Music</a>
      <a href="" class="categoryButton">Travel</a>
    </div>
  </section>
  <footer>
    <div class="footerSocials">
      <a href="https://www.youtube.com" target="_blank"><i class="uil uil-youtube"></i></a>
      <a href="https://www.facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
      <a href="https://www.linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
      <a href="https://www.twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
    </div>
    <div class="container footerContainer">
      <article>
        <h4>Categories</h4>
        <ul>
          <li><a href="">Art</a></li>
          <li><a href="">Wild Life</a></li>
          <li><a href="">Travel</a></li>
          <li><a href="">Music</a></li>
          <li><a href="">Science & Technology</a></li>
          <li><a href="">Food</a></li>
        </ul>
      </article>
      <article>
        <h4>Support</h4>
        <ul>
          <li><a href="">Online Support</a></li>
          <li><a href="">Contact Me</a></li>
          <li><a href="">Social</a></li>
          <li><a href="">Location</a></li>
        </ul>
      </article>
      <article>
        <h4>Blog</h4>
        <ul>
          <li><a href="">Safety</a></li>
          <li><a href="">Repair</a></li>
          <li><a href="">Recent</a></li>
          <li><a href="">Popular</a></li>
          <li><a href="">Categories</a></li>
        </ul>
      </article>
      <article>
        <h4>Pages</h4>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Services</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </article>
    </div>
    <div class="footerCopyright">
      <small>Copyright &copy; 2022 Tianyi </small>
    </div>
  </footer>
  <script src="./main.js"></script>
</body>
</html>