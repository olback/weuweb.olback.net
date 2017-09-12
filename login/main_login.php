<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index.php");
}
include __DIR__.'/../login/common.php';
$view = "login";
?>
<?php require "../page/head.php"; ?>
    <div class="container">

      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading"><?php echo $site_name; ?></h2>
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	      <?php if ($allow_signup){echo '<a href="signup.php" id="signup" class="btn btn-lg btn-primary btn-block">Create new account</a>';}?>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>

    </body>
</html>
