<?php require "login/loginheader.php"; ?>
<article class="content">
    <h1>Profile:</h1>
    Username: <?php echo $_SESSION['username'];?><br>
    Name: <?php echo $_SESSION['name'];?><br>
    Class: <?php echo $_SESSION['class'];?><br>
    Email: <?php echo $_SESSION['email'];?><br>
    Admin: <?php echo $_SESSION['admin'];?>
    <br><br>
    <p>Later on when I've got time, there will be more features here. You'll be able to change your email and password.</p>
</article>