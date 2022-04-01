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
        <!-- <li><a href="signin.php">Signin</a></li> -->
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
  <section class="dashboard">
    <div class="container dashboardContainer">
      <button id="showSidebarBtn"  class="sidebarToggle"><i class="uil uil-angle-right-b"></i></button>
      <button id="hideSidebarBtn"  class="sidebarToggle"><i class="uil uil-angle-left-b"></i></button>
      <aside>
        <ul>
          <li>
            <a href="addPost.php">
              <i class="uil uil-pen" ></i>
              <h5>Add Post</h5>
            </a>
          </li>
          <li>
            <a href="dashboard.php">
              <i class="uil uil-postcard" ></i>
              <h5>Manage Posts</h5>
            </a>
          </li>
          <li>
            <a href="addUser.php">
              <i class="uil uil-user-plus" ></i>
              <h5>Add User</h5>
            </a>
          </li>
          <li>
            <a href="manageUsers.php" class="active">
              <i class="uil uil-users-alt" ></i>
              <h5>Manage Users</h5>
            </a>
          </li>
          <li>
            <a href="addCategory.php">
              <i class="uil uil-edit" ></i>
              <h5>Add Category</h5>
            </a>
          </li>
          <li>
            <a href="manageCategories.php" >
              <i class="uil uil-list-ul" ></i>
              <h5>Manage Categories</h5>
            </a>
          </li>
        </ul>
      </aside>
      <main>
        <h2>Manage Users</h2>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Username</th>
              <th>Edit</th>
              <th>Delete</th>
              <th>Admin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Username 1</td>
              <td>achiever</td>
              <td><a href="editUser.php" class="btn sm">Edit</a></td>
              <td><a href="deleteCategory.php" class="btn sm danger">Delete</a></td>
              <td>Yes</td>
            </tr>
            <tr>
              <td>Username 2</td>
              <td>achiever2</td>
              <td><a href="editUser.php" class="btn sm">Edit</a></td>
              <td><a href="deleteCategory.php" class="btn sm danger">Delete</a></td>
              <td>Yes</td>
            </tr>
            <tr>
              <td>Username 3</td>
              <td>achiever3</td>
              <td><a href="editUser.php" class="btn sm">Edit</a></td>
              <td><a href="deleteCategory.php" class="btn sm danger">Delete</a></td>
              <td>No</td>
            </tr>
          </tbody>
        </table>
      </main>
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
          <li><a href="categoryPosts.php">Art</a></li>
          <li><a href="categoryPosts.php">Wild Life</a></li>
          <li><a href="categoryPosts.php">Travel</a></li>
          <li><a href="categoryPosts.php">Music</a></li>
          <li><a href="categoryPosts.php">Science & Technology</a></li>
          <li><a href="categoryPosts.php">Food</a></li>
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