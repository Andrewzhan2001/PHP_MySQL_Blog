<?php

require 'partials/header.php';

if (isset($_GET['search']) && isset($_GET['submit'])) {
  $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY dateTime DESC";
  $posts = mysqli_query($connection, $query);
} else {
  header('location: ' . 'blog.php');
  die();
}
?>

<?php if (mysqli_num_rows($posts) > 0) : ?>
  <section class="posts sectionExtraMargin">
    <div class="container postsContainer">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <article class="post">
          <div class="postThumbnail">
            <div class="postThumbnailBorder">
              <img src="./images/posts/<?=$post['thumbnail']?>" alt="blog">
            </div>
          </div>
          <div class="postInfo">
            <?php // fetch category from categories using category_id
              $categoryId = $post['categoryId'];
              $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
              $categoryResult = mysqli_query($connection, $categoryQuery);
              $category = mysqli_fetch_assoc($categoryResult);
            ?>
            <a href="categoryPosts.php?id=<?= $category['id'] ?>" class="categoryButton"><?= $category['title'] ?></a>
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
<?php else:?>
  <div class="alertMessage error lg sectionExtraMargin">
    <p>No posts found for this search</p>
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


<?php require 'partials/footer.php';