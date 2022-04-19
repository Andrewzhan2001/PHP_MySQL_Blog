<?php
  include 'partials/header.php';

  // fetch users from database expect the current user logged in
  $currentId = $_SESSION['userId'];
  $query = "SELECT * FROM users where NOT id=$currentId";
  $users = mysqli_query($connection, $query);
?>

  <section class="dashboard">
    <!-- show if add user success -->
    <?php if(isset($_SESSION['addUserSuccess'])) : ?> 
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['addUserSuccess'];
              unset($_SESSION['addUserSuccess']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['editUserSuccess'])) : ?>
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['editUserSuccess'];
              unset($_SESSION['editUserSuccess']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['editUser'])) : ?>
      <div class="alertMessage error container">
        <p>
          <?= $_SESSION['editUser'];
              unset($_SESSION['editUser']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['deleteUser'])) : ?>
      <div class="alertMessage error container">
        <p>
          <?= $_SESSION['deleteUser'];
              unset($_SESSION['deleteUser']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['deleteUserSuccess'])) : ?>
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['deleteUserSuccess'];
              unset($_SESSION['deleteUserSuccess']);
          ?>
        </p>
      </div>
    <?php endif; ?>
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
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Users</h2>
        <?php if(mysqli_num_rows($users) > 0) :?>
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
            <?php while ($user = mysqli_fetch_assoc($users)) :?>
              <tr>
								<td><?= "{$user['firstname']}  {$user['lastname']}" ?></td>
								<td><?= $user['username'] ?></td>
								<td><a href="<?= rootURL ?>admin/editUser.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
								<td><a href="<?= rootURL ?>admin/deleteUser.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
								<td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
							</tr>
            <?php endwhile ?>
          </tbody>
        </table>
        <?php else :?>
          <div class="alertMessage error">
            <p>
              <?="No other users found"?>
            </p>
          </div>
        <?php endif?>
      </main>
    </div>
  </section>

<?php
  include '../partials/footer.php';
?>