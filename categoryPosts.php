<?php
  include 'partials/header.php';
?>

  <!-- for the category title -->
  <header class="categoryTitle">
    <h2>Category Title</h2>
  </header>

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
          <a href="categoryPosts.php" class="categoryButton">WildLife</a>
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
          <a href="categoryPosts.php" class="categoryButton">WildLife</a>
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
      <a href="categoryPosts.php" class="categoryButton">Art</a>
      <a href="categoryPosts.php" class="categoryButton">Wild Life</a>
      <a href="categoryPosts.php" class="categoryButton">Science & Technology</a>
      <a href="categoryPosts.php" class="categoryButton">Food</a>
      <a href="categoryPosts.php" class="categoryButton">Music</a>
      <a href="categoryPosts.php" class="categoryButton">Travel</a>
    </div>
  </section>

  
<?php 
  include 'partials/footer.php';
?>
