<?php
  include 'partials/header.php';
  // fetch user's posts from database
  $userId = $_SESSION['userId'];
  $query = "SELECT id, title, categoryId FROM posts WHERE authorID = $userId ORDER BY id DESC";
  $posts = mysqli_query($connection,$query);
?>

  <section class="dashboard">
		<?php if(isset($_SESSION['addPostSuccess'])) : ?> 
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['addPostSuccess'];
              unset($_SESSION['addPostSuccess']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['editPostSuccess'])) : ?> 
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['editPostSuccess'];
              unset($_SESSION['editPostSuccess']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['editPost'])) : ?> 
      <div class="alertMessage error container">
        <p>
          <?= $_SESSION['editPost'];
              unset($_SESSION['editPost']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['deletePost'])) : ?> 
      <div class="alertMessage error container">
        <p>
          <?= $_SESSION['deletePost'];
              unset($_SESSION['deletePost']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['deletePostSuccess'])) : ?> 
      <div class="alertMessage success container">
        <p>
          <?= $_SESSION['deletePostSuccess'];
              unset($_SESSION['deletePostSuccess']);
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
        <?php if(mysqli_num_rows($posts) > 0) :?>
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
							<?php while ($post = mysqli_fetch_assoc($posts)) :?>
								<!-- we want to get category from category id -->
								<?php
									$categoryId = $post['categoryId'];
									$categoryQuery = "SELECT title FROM categories WHERE id = $categoryId";
									$categoryResult = mysqli_query($connection,$categoryQuery);
									$category = mysqli_fetch_assoc($categoryResult);
								?>
								<tr>
									<td><?= $post['title'] ?></td>
									<td><?= $category['title'] ?></td>
									<td><a href="editPost.php?id=<?=$post['id'] ?>" class="btn sm">Edit</a></td>
									<td><a href="deletePost.php?id=<?=$post['id'] ?>" class="btn sm danger">Delete</a></td>
								</tr>
							<?php endwhile ?>
            </tbody>
          </table>
        <?php else :?>
          <div class="alertMessage error">
            <p>
              <?="No posts found"?>
            </p>
          </div>
        <?php endif?>
      </main>
    </div>
  </section>

<?php
  include '../partials/footer.php';
?>