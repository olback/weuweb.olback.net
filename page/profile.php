<?php require "login/loginheader.php"; ?>

<article class="content">
    <div class="title-block">
        <h2 class="title"> Profile </h2>
        <p class="title-description"> View/update your profile information. </p>
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
                            <div class="input-group">
                                <input id="username" readonly="readonly" class="form-control" placeholder="Username" type="text" value="<?php echo $_SESSION['username'];?>">
                                <span class="input-group-addon" onclick="enableInput('username')"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="input-group">
                                <input readonly="readonly" class="form-control" placeholder="Name" type="text" value="<?php echo $_SESSION['name'];?>">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <div class="input-group">
                                <input readonly="readonly" class="form-control" placeholder="Class" type="text" value="<?php echo $_SESSION['class'];?>">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="input-group">
                                <input readonly="readonly" class="form-control" placeholder="Email" type="email" value="<?php echo $_SESSION['email'];?>">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <button type="button" id="updateProfile" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
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
                        <button type="button" id="updatePassword" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                </div>
            </div> <!-- .../col-md-6 -->
        </div>
    </section>
</article>
<script src="/js/profile.js"></script>