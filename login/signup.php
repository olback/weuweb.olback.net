<?php
  include __DIR__.'/../login/common.php';

  if ($allow_signup) {
    session_start();

    if (isset($_SESSION['username'])) {
        session_start();
        session_destroy();
    }

    $view = "login";
} else {
    Header('Location: ../index.php');
}
?>
<?php require "../page/head.php"; ?>
    <div class="container">

      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
        <h2 class="form-signup-heading">Register</h2>
        <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" autofocus required pattern="[A-Za-z0-9]{4,20}">
        <input name="email" id="email" type="email" class="form-control" placeholder="Email" required>
        <br>
        <input name="rname" id="rname" type="text" class="form-control" placeholder="Real name" required>
        <select name="rclass" id="rclass" class="form-control">
          <option>Te2A</option>
          <option>Te2B</option>
          <option>Te2C</option>
        </select>
        <br>
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Password" required>
        <input name="password2" id="password2" type="password" class="form-control" placeholder="Repeat Password" required>

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

        <div id="message"></div>
        
        <p>Return to <a href="https://<?php echo $_SERVER['SERVER_NAME'];?>" class="return"><?php echo $_SERVER['SERVER_NAME']?></a></p>
      </form>
    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script src="js/signup.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
<script>

$( "#usersignup" ).validate({
  rules: {
	email: {
		email: true,
		required: true
	},
    password1: {
      required: true,
      minlength: 8
	},
    password2: {
      equalTo: "#password1"
  },
    rname: {
      required: true
  }

  }
});
</script>

  </body>
</html>
