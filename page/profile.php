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
    <!--<div class="col-md-6">
        <strong>Username:</strong> <?php echo $_SESSION['username'];?><br>
        <strong>Name:</strong> <?php echo $_SESSION['name'];?><br>
        <strong>Class:</strong> <?php echo $_SESSION['class'];?><br>
        <strong>Email:</strong> <?php echo $_SESSION['email'];?><br>
        <strong>Admin:</strong> <?php if($_SESSION['admin'] == "1"){echo "Yes";} else {echo "No";}?>
        <br><br>
        <p>Later on when I've got time, there will be more features here. You'll be able to change your email and password.</p>
    </div>-->
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-6">
                <div class="card card-block">
                    <form>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input class="form-control boxed" type="text" readonly="readonly" value="<?php echo $_SESSION['username'];?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control boxed" type="text" readonly="readonly" value="<?php echo $_SESSION['name'];?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <input class="form-control boxed" type="text" readonly="readonly" value="<?php echo $_SESSION['class'];?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control boxed" type="text" readonly="readonly" value="<?php echo $_SESSION['email'];?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Admin</label>
                            <p class="form-control-static boxed"><?php if($_SESSION['admin'] == "1"){echo "Yes";} else {echo "No";}?></p>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                </div>
            </div> <!-- .../col-md-6 -->

            <!-- Not implemented yet -->
            <div class="col-md-6">
                <div class="card card-block">
                    <form>
                        <div class="form-group">
                            <label class="control-label">New password</label>
                            <input class="form-control boxed" type="password" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Repeat password</label>
                            <input class="form-control boxed" type="password" disabled="disabled">
                        </div>
                        <button type="button" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                </div>
            </div> <!-- .../col-md-6 -->
        </div>
    </section>
</article>