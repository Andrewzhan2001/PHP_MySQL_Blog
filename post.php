<?php
  include 'partials/header.php';

  if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
  } else {
    header('location: ' . 'blog.php');
    die();
  }
?>

  <!-- section for a single post -->
  <section class="singlePost">
    <div class="container singlePostContainer">
      <h2><?= $post['title'] ?></h2>
      <div class="postAuthor">
        <?php
          // Fetch the author from users 
          $authorId = $post['authorId'];
          $authorQuery = "SELECT * FROM users WHERE id=$authorId";
          $authorResult = mysqli_query($connection, $authorQuery);
          $author = mysqli_fetch_assoc($authorResult);
          $authorFirstname = $author['firstname'];
          $authorLastname = $author['lastname'];
        ?>
        <div class="postAuthorAvatar">
          <img src="./images/users/<?= $author['avatar'] ?>" alt="avatar">
        </div>
        <div class="postAuthorInfo">
          <h5>By: <?= "{$authorFirstname} {$authorLastname}" ?></h5>
          <small><?= date("M d, Y - H:i", strtotime($post['dateTime'])) ?></small>
        </div>
      </div>
      <div class="singlePostThumbnail">
        <img src="./images/posts/<?= $post['thumbnail'] ?>" >
      </div>
      <p><?=$post['body']?></p>
    </div>
  </section>

<?php 
  include 'partials/footer.php';
?>
