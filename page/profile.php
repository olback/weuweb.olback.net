<?php require "login/loginheader.php"; ?>

<?php

if(isset($_POST['updateProfile'])) {
    echo '<script>alert("yeeeeeeet");</script>'
}


?>

<article class="content">
    <div class="title-block">
        <h2 class="title"> Profile </h2>
        <p class="title-description"> View/update your profile information. </p>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-6">
                <div class="card card-block">
                    <form method="POST">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <div class="input-group">
                                <input id="username" name="username" readonly="readonly" class="form-control" placeholder="Username" type="text" value="<?php echo $_SESSION['username'];?>">
                                <span class="input-group-addon click" onclick="enableInput('username')"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="input-group">
                                <input id="name" name="name" readonly="readonly" class="form-control" placeholder="Name" type="text" value="<?php echo $_SESSION['name'];?>">
                                <span class="input-group-addon click" onclick="enableInput('name')"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <div class="input-group">
                                <input id="class" name="class" readonly="readonly" class="form-control" placeholder="Class" type="text" value="<?php echo $_SESSION['class'];?>">
                                <span class="input-group-addon click" onclick="enableInput('class')"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="input-group">
                                <input id="email" name="email" readonly="readonly" class="form-control" placeholder="Email" type="email" value="<?php echo $_SESSION['email'];?>">
                                <span class="input-group-addon click" onclick="enableInput('email')"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <button type="button" id="updateProfile" name="updateProfile" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                </div>
            </div> <!-- .../col-md-6 -->

            <!-- Not implemented yet -->
            <div class="col-md-6">
                <div class="card card-block">
                    <form method="POST">
                    <div class="form-group">
                            <label class="control-label">Current password</label>
                            <input class="form-control boxed" type="password" name="cPassword">
                        </div>
                        <div class="form-group">
                            <label class="control-label">New password</label>
                            <input class="form-control boxed" type="password" name="nPassword1">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Repeat password</label>
                            <input class="form-control boxed" type="password" name="nPassword2">
                        </div>
                        <button type="button" id="updatePassword" name="updatePassword" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                </div>
            </div> <!-- .../col-md-6 -->
        </div>
    </section>
</article>
<script src="/js/profile.js"></script>