<?php require "login/loginheader.php"; ?>
<?php require "login/dbconf.php"; ?>

<?php

// Update profile information
if(isset($_POST['updateProfile'])) {

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // prepare and bind
    $stmt = $conn->prepare("UPDATE members SET username = ?, email = ?, name = ?, class = ? WHERE id = ?");
    $stmt->bind_param("sssss", $_POST['username'], $_POST['email'], $_POST['name'], $_POST['class'], $_SESSION['id']);
    $stmt->execute();

    if ($stmt->errno) {
        $returnMsg1 = '<p style="color: #a00;">Update failed. Please report this error to <a href="https://olback.net#contact">olback.net#contact</a>.</p>';
    } else {
        $returnMsg1 = '<p style="color: #0a0;">Updated successfully.</p>';
    }

    // Update session variables
    $sql = "SELECT username, name, class, email FROM members WHERE id = \"".$_SESSION['id']."\"";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['class'] = $row['class'];
            $_SESSION['email'] = $row['email'];
        }
    }

    $stmt->close();
    $conn->close();
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
                                <select id="class" name="class" readonly="readonly" class="form-control">
                                    <option value="Te2A" <?php if($_SESSION['class'] == "Te2A"){echo "selected";} ?>>Te2A</option>
                                    <option value="Te2B" <?php if($_SESSION['class'] == "Te2B"){echo "selected";} ?>>Te2B</option>
                                    <option value="Te2C" <?php if($_SESSION['class'] == "Te2C"){echo "selected";} ?>>Te2C</option>
                                </select>
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
                        <button type="submit" id="updateProfile" name="updateProfile" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                    <?php if(isset($returnMsg1)){echo $returnMsg1;} ?>
                </div>
            </div> <!-- .../col-md-6 -->

            <!-- Not implemented yet -->
            <!--<div class="col-md-6">
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
                        <button type="submit" id="updatePassword" name="updatePassword" class="btn btn-primary btn-lg" disabled="disabled">Submit</button>
                    </form>
                    <?php if(isset($returnMsg2)){echo $returnMsg2;} ?>
                </div>
            </div>--> <!-- .../col-md-6 -->
        </div>
    </section>
</article>
<script src="/js/profile.js"></script>