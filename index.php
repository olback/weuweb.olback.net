<?php
    require "login/loginheader.php";
    $view = "main";
    require "page/head.php";
    require "page/nav.php";
?>

<?php

switch($_SESSION['page']) {

        case "profile":
            require 'page/profile.php';
            break;

        case "upload":
            require 'page/upload.php';
            break;

        case "snippets":
            require 'page/snippets.php';
            break;

        case "admin":
            if($_SESSION['admin'] == "1"){
                
                //require 'page/admin.php';
                
                if($_SESSION['view'] == 0) {
                    require 'page/admin.php';
                } else {
                    require 'page/users.php';
                }

            } else {
                require 'page/main.php';
            }
            break;
        
        case "about":
            require 'page/about.php';
            break;
        
        default:
            require 'page/main.php';
            break;
}

?>

<?php require "page/footer.php"; ?>