<?php require "login/loginheader.php"; ?>
<?php require "login/dbconf.php"; ?>

<?php
  if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {

    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    if(!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }

    //

    $uploader = $_SESSION['username'];
    $sql = "INSERT INTO upload (name, size, type, content, by_user ) ".
    "VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$uploader')";

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if ($conn->query($sql) === TRUE) {
        $msg = '<br><p style="color:#0a0; font-size: 18px;">File "'.$fileName.'" uploaded</p>';
    } else {
        
        $msg = '<br><p style="color:#a00; font-size: 18px;">Error uploading file to database: " '.$conn->error.'</p>';
    }

    //
   $conn->close();
  } elseif (isset($_POST['upload']) && $_FILES['userfile']['size'] == 0) {
    $msg = '<br><p style="color:#a00; font-size: 18px;">Please select a file</p>';
  }
?>
<article class="content">
    <h1>Upload file</h1>
    <div class="title-search-block">
        <div class="title-block"></div>
    </div>
    <div class="col-md-6">
        <p>You can upload any file as long as it's not bigger than 8MB. If you want to get credited, please make sure to write your username and your real name in a comment at the top of the file(s). You can upload multiple files by adding them to an archive. (zip, rar, 7z)</p>
            
            <p style="color: #a00;">Do not send any sensetive files via this file upload. Files are not encrypted.</p>
        
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
            <input name="userfile" type="file" id="userfile"><br>
            <input name="upload" type="submit" id="upload" value=" Upload ">
        </form>
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
</article>