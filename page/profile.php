<?php require "login/loginheader.php"; ?>

<article class="content">
<h1>Profile</h1>
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <p class="title-description"> View your profile information. </p>
                </div>
            </div>
        </div>
    </div>

    <strong>Username:</strong> <?php echo $_SESSION['username'];?><br>
    <strong>Name:</strong> <?php echo $_SESSION['name'];?><br>
    <strong>Class:</strong> <?php echo $_SESSION['class'];?><br>
    <strong>Email:</strong> <?php echo $_SESSION['email'];?><br>
    <strong>Admin:</strong> <?php if($_SESSION['admin'] == "1"){echo "Yes"} else {echo "No"}?>
    <br><br>
    <p>Later on when I've got time, there will be more features here. You'll be able to change your email and password.</p>
</article>