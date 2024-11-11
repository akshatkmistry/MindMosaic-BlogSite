<?php 
include 'partials/header.php';

$featured_query="SELECT * FROM posts WHERE is_featured=1";
$featured_result=mysqli_query($connection,$featured_query);
$featured=mysqli_fetch_assoc($featured_result);


$query="SELECT * FROM posts WHERE is_featured=0 ORDER BY date_time DESC LIMIT 9";
$posts=mysqli_query($connection,$query);

?>

    
        <section class="welcome-container">
            <div class="content">
                <div class="left-content">
                    <h1>Welcome to MindMosaic</h1>
                    <h2>A Tapestry of Words and Wonder</h2>
                    <p> A digital space where diverse ideas, creative insights, and unique perspectives come together
                        to form a vibrant whole. Just like the intricate pieces of a mosaic, each post weaves together 
                        thoughts from different corners of life, art, technology, and personal reflection. Whether you're
                        here to explore new ideas, find inspiration, or simply get lost in a world of words, you'll discover
                        that every piece has a place in this evolving masterpiece.</p>
                    <a href="<?=ROOT_URL?>blog.php">
                        <button class="btn-1">Discover our Latest Blogs</button>
                    </a>
                        
                </div>
                <div class="right-content">
                    <img src="images/Blogging-bro.svg" alt="hero-img">
                </div>
            </div>
        </section>

    <?php if (mysqli_num_rows($featured_result) == 1 ) :  ?>
    <section class="featured" id="featured">
        <div class ="container featured__container">            
            <div class="post__thumbnail">
                <img src="./images/<?= $featured['thumbnail'] ?>">
            </div>
            <div class="post__info">
                <?php
                $author_id=$featured['author_id'];
                $author_query="SELECT * FROM users WHERE id=$author_id";
                $author_result=mysqli_query($connection,$author_query);
                $author=mysqli_fetch_assoc($author_result);
                            
                ?>
                <h2 class="post__title"><a href="post.php?id=<?=$featured['id']?>"><?=$featured['title']?></a></h2>
                <p class="post__body">
                    <?= substr(html_entity_decode($featured['body']), 0, 300) ?>...
                </p>
                <div class="post__author-avatar">
                <img src="./images/<?= $author['avatar'] ?>">
                </div>
                
                    <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small>
                            <?=date("M d, Y -H:i" , strtotime($featured['date_time']))?>
                        </small>
                    </div>
                </div>
        </div>
    </section>
    <?php endif ?>

        

   
<?php
include './partials/footer.php';
?>