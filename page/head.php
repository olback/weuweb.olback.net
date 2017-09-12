<?php include __DIR__.'/../login/common.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $site_name;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/favicon.png"/>
        <?php
        switch($view) {

            case "login":
                echo "<link href=\"/css/b3.css\" rel=\"stylesheet\">";
                echo "<link href=\"/css/b3_login.css\" rel=\"stylesheet\">";
                break;

            case "main":
                echo '
                <link rel="stylesheet" href="css/vendor.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
                <link rel="stylesheet" id="theme-style" href="css/app.css">';
                break;

            case "404":
                echo "<link href=\"/css/404.css\" rel=\"stylesheet\">";     
                break;

            default:
                echo "<!-- Wut how did this even happen? -->";
                break;
        }
        ?>
    </head>
    <body>