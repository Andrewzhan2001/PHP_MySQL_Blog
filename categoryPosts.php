<?php
  include 'partials/header.php';

  if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE categoryId=$id ORDER BY dateTime DESC";
    $posts = mysqli_query($connection, $query);
  } else {
    header('location: ' . 'blog.php');
    die();
  }
?>

  <!-- for the category title -->
  <header class="categoryTitle">
    <h2>
      <?php // fetch category from categories using category_id
        $categoryQuery = "SELECT * FROM categories WHERE id=$id";
        $categoryResult = mysqli_query($connection, $categoryQuery);
        $category = mysqli_fetch_assoc($categoryResult);
        echo $category['title'];
      ?>
    </h2>
  </header>

  <!-- for the posts section -->
  <?php if (mysqli_num_rows($posts) > 0):?>
  <section class="posts">
    <div class="container postsContainer">
       <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <article class="post">
          <div class="postThumbnail">
            <div class="postThumbnailBorder">
              <img src="./images/posts/<?=$post['thumbnail']?>" alt="blog">
            </div>
          </div>
          <div class="postInfo">
            <h3 class="postTitle"><a href="post.php?id=<?=$post['id']?>"><?=$post['title']?></a></h3>
            <p class="postBody"><?= substr($post['body'],0,300)?> ...</p>
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
                <img src="./images/users/<?=$author['avatar']?>" alt="avatar">
              </div>
              <div class="postAuthorInfo">
                <h5>By: <?= "{$authorFirstname} {$authorLastname}" ?></h5>
                <small><?= date("M d, Y - H:i", strtotime($post['dateTime'])) ?></small>
              </div>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
    </div>
  </section>
  <?php else : ?>
    <div class="alertMessage error lg">
      <p>No posts found for this category</p>
    </div>
  <?php endif;?>

  <section class="categoryButtons">
    <div class="container categoryButtonsContainer">
      <?php
        $allCategoriesQuery = "SELECT * FROM categories";
        $allCategories = mysqli_query($connection, $allCategoriesQuery);
      ?>
      <?php while ($category = mysqli_fetch_assoc($allCategories)) : ?>
        <a href="categoryPosts.php?id=<?= $category['id'] ?>" class="categoryButton"><?= $category['title'] ?></a>
      <?php endwhile; ?>
    </div>
  </section>

  
<?php 
  include 'partials/footer.php';
?>
