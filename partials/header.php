<?php
require 'config/database.php';
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $avatar =  mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="navbar">
            
                <h1><a href="<?= ROOT_URL ?>index.php">MindMosaic</a></h1>  
            
                <ul>
                    <li><a href="<?= ROOT_URL ?>index.php">Home</a></li>
                    <li><a href="<?= ROOT_URL ?>blog.php">Blogs</a></li>
                    <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                    <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>

                    <?php if(isset($_SESSION['user-id'])) : ?>
                
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>/admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">Login</a></li>
                    <?php endif ?>
                </ul>
            
        </div>
    </header>
