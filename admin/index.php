<?php
include "partials/header.php";

// fetch curretn user-id from session
$current_user_id=$_SESSION['user-id'];
$query="SELECT  id , title  FROM posts WHERE author_id=$current_user_id ORDER BY id DESC" ;
$posts = mysqli_query($connection,$query);
?>


    <section class="dashboard">
    <?php if(isset($_SESSION['signin-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['signin-success'];
                unset($_SESSION['signin-success']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['add-post'])): ?>
        
        <div class="alert__message error container">
            <p>
                <?=$_SESSION['add-post'];
                unset($_SESSION['add-post']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['add-post-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-post'])): ?>
        
        <div class="alert__message error container">
            <p>
                <?=$_SESSION['edit-post'];
                unset($_SESSION['edit-post']); 
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['edit-post-success'])): ?>
        
        <div class="alert__message success container">
            <p>
                <?=$_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']); 
                ?>
            </p>
        </div>
        <?php endif ?>
        <div class="container dashboard__container">
    
            <aside>
                <ul>
                    <li>
                        <a href="<?= ROOT_URL ?>admin/add-post.php">
                            <h5>Add Post</h5>
                        </a>
                    </li>                
                        
                    <li>
                        <a href="<?= ROOT_URL ?>admin/index.php" class="active" >
                            <h5>Manage Posts</h5>
                        </a>
                    </li>
                    
                </ul>
            </aside>
            <main>
                <h2>Manage Posts</h2>
                <table>
                <?php if ((mysqli_num_rows($posts)) > 0 ): ?>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                        <tr>
                            <td><?=$post['title']?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                        </tr>
                        <?php endwhile ?>
                        
                    </tbody>
                <?php else :?>
                    <div class="alert alert__message error"><?= "No posts found" ?></div>
                <?php endif?>
                </table>
            </main>
        </div>
    </section>
    
    


<?php
include "../partials/footer.php";
?>