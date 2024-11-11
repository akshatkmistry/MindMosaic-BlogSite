<?php

include "config/constants.php";

$firstname=$_SESSION['signup-data']['firstname'] ?? null;
$lastname=$_SESSION['signup-data']['lastname'] ?? null;
$username=$_SESSION['signup-data']['username'] ?? null;
$email=$_SESSION['signup-data']['email'] ?? null;
$createpassword=$_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

unset($_SESSION['signup-data']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>


<section class="form__section">

    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php
        if(isset($_SESSION['signup'])): ?> 
            <div class="alert__message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
            
            </div>
        
        <?php endif ?>
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name ="firstname" value ="<?= $firstname?>"  placeholder="First Name">
            <input type="text" name ="lastname" value ="<?= $lastname?>"  placeholder="Last Name">
            <input type="username" name ="username" value ="<?= $username ?>"  placeholder="Username">
            <input type="email" name ="email" value ="<?= $email ?>"  placeholder="email">
            <input type="password" name ="createpassword"  value ="<?= $createpassword ?>"  placeholder="Password">
            <input type="password" name ="confirmpassword" value ="<?= $confirmpassword?>"  placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name ="submit"class="btn">Sign Up</button>
            <small>Already have an Account? <a href="signin.php">Sign in</a></small>
        </form>
    </div>

</section>


</body>
</html>