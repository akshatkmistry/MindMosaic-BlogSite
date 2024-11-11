<?php 
include 'partials/header.php';


$featured_query="SELECT * FROM posts WHERE is_featured=1";
$featured_result=mysqli_query($connection,$featured_query);
$featured=mysqli_fetch_assoc($featured_result);



$query="SELECT * FROM posts ORDER BY date_time DESC";
$posts=mysqli_query($connection,$query);

?>

<section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
  <div class="container posts__container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post__thumbnail" style="width: 300px; height: 200px;">
          <img src="./images/<?= $post['thumbnail'] ?>" >
        </div>
        <div class="post__info">
          <h2 class="post__title"><a href="<?=ROOT_URL?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
          <a href="<?=ROOT_URL?>post.php?id=<?= $post['id'] ?>">
            
            <p class="post__body" style="min-height: 100px;">
              <?= substr(html_entity_decode($post['body']), 0, 120) ?>...
            </p>
          </a>

          <div class="post__author">
            <?php
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            $author_firstname = $author['firstname'];
            $author_lastname = $author['lastname'];
            ?>
            <div class="post__author-avatar">
              <img src="./images/<?= $author['avatar'] ?>" alt="" />
            </div>
            <div class="post__author-info">
              <h5>By: <?= "{$author_firstname} {$author_lastname}" ?></h5>
              <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</section>


<?php
include './partials/footer.php';
?>