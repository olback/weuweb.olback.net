<?php require "login/loginheader.php"; ?>
<?php

// Page switcher
session_start();

if (isset($_GET['a']) && isset($_GET['v'])) {
    $_SESSION['page'] = $_GET['a'];
    $_SESSION['view'] = $_GET['v'];
    Header('Location: ./');
    die();
}

if (isset($_GET['a'])) {
    $_SESSION['page'] = $_GET['a'];
    Header('Location: ./');
    die();
}

// Download file from database
if (isset($_GET['d'])) {

    $id = $_GET['d'];
    settype($id, "integer");
    $sql = "SELECT name, type, size, content " .
            "FROM upload WHERE id = '$id'";

    require "login/dbconf.php";
    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            header("Content-length: ".$row['size']);
            header("Content-type: ".$row['type']);
            header("Content-Disposition: attachment; filename=".$row['name']);
            echo $row['content'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    exit;

}

// Remove file from database
if (isset($_POST['r']) && $_SESSION['admin'] == "1") {
    
    $id = $_POST['r'];
    settype($id, "integer");

    $sql = "DELETE FROM `upload` WHERE `upload`.`id` = '$id'";

    require "login/dbconf.php";
    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if ($conn->query($sql) === TRUE) {
        Header('Location: ./');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

}
?>
