<?php
  include 'partials/header.php';
?>

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
            <a href="index.php" class="active">
              <i class="uil uil-postcard" ></i>
              <h5>Manage Posts</h5>
            </a>
          </li>
          <?php if(isset($_SESSION['userIsAdmin'])) : ?>
            <li>
              <a href="addUser.php">
                <i class="uil uil-user-plus" ></i>
                <h5>Add User</h5>
              </a>
            </li>
            <li>
              <a href="manageUsers.php" >
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
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Posts</h2>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Title 1</td>
              <td>Wild Life</td>
              <td><a href="editPost.php" class="btn sm">Edit</a></td>
              <td><a href="deleteCategory.php" class="btn sm danger">Delete</a></td>
            </tr>
            <tr>
              <td>Title 1</td>
              <td>Wild Life</td>
              <td><a href="editPost.php" class="btn sm">Edit</a></td>
              <td><a href="deleteCategory.php" class="btn sm danger">Delete</a></td>
            </tr>
          </tbody>
        </table>
      </main>
    </div>
  </section>

<?php
  include '../partials/footer.php';
?>