<?php
  include 'partials/header.php';

  $query = "SELECT * from categories ORDER BY title";
  $categories = mysqli_query($connection, $query);
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
            <a href="index.php">
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
              <a href="manageUsers.php">
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
              <a href="manageCategories.php" class="active">
                <i class="uil uil-list-ul" ></i>
                <h5>Manage Categories</h5>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Categories</h2>
        <?php if(mysqli_num_rows($categories) > 0) :?>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php while($category = mysqli_fetch_assoc($categories)) :?>
              <tr>
                <td><?= $category['title'] ?></td>
								<td><a href="<?= rootURL . 'admin/editCategory.php?id=' ?><?= $category['id'] ?>" class="btn sm">Edit</a></td>
								<td><a href="<?= rootURL . 'admin/deleteCategory.php?id=' ?><?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
        <?php else :?>
          <div class="alertMessage error">
            <p>
              <?="No categories found"?>
            </p>
          </div>
        <?php endif ?>
      </main>
    </div>
  </section>
  
<?php
  include '../partials/footer.php';
?>