<?php
  include 'partials/header.php';
  $query = "SELECT * FROM posts WHERE isFeatured=1";
  $result = mysqli_query($connection, $query);
  $featured = mysqli_fetch_assoc($result);

  // Fetch posts
  $postsQuery = "SELECT * FROM posts ORDER BY dateTime DESC LIMIT 9";
  $posts = mysqli_query($connection, $postsQuery)
?>

  <!-- for the Top Feature section -->
  <?php if (mysqli_num_rows($result) == 1) : ?>
    <section class="featured">
      <div class="container featuredContainer">
        <!-- post's thumbail image -->
        <div class="postThumbnailFeatured">
            <div class="postThumbnailBorder">
              <img src="./images/posts/<?= $featured['thumbnail'] ?>" alt="blog">
            </div>
          </div>
        <div>
          <?php // fetch category from categories using category_id
            $categoryId = $featured['categoryId'];
            $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
            $categoryResult = mysqli_query($connection, $categoryQuery);
            $category = mysqli_fetch_assoc($categoryResult);
          ?>
          <a href="categoryPosts.php?id=<?= $category['id'] ?>" class="categoryButton"><?= $category['title'] ?></a>
          <h2 class="postTitle"><a href="post.php?id=<?=$featured['id']?>"><?= $featured['title'] ?></a></h2>
          <p class="postBody"><?= substr($featured['body'],0,300)?> ...</p>
          <div class="postAuthor">
            <?php
            // Fetch the author from users 
            $authorId = $featured['authorId'];
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
              <small><?= date("M d, Y - H:i", strtotime($featured['dateTime'])) ?></small>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <!-- for the posts section -->
  <section class="posts <?=$featured ? '' : 'sectionExtraMargin' ?>">
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