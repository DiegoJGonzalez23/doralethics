<?php
session_start();
require_once  'includes/database.php';
require_once  'includes/register-inc.php';


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="pics/ethics.jpeg">
    <title>Ethics Club</title>

</head>
<body>

<header class = "header-class">



<nav>

<ul>
    <span class="first-li">


        <li><a href="index">Home</a></li>
        <li><a href="communityposts">Community Posts</a></li>
        <li><a  href="presentations">Presentations</a></li>
        <li><a href="announcements">Announcements</a></li>
        <?php
        if (isset($_SESSION['sessionid'])) {
            // Checking if they are logged in!

            // Now we check if they have correct rank!
            if($_SESSION['sessionranking']===100){
            echo"
            <li>
                <a href='adminperms'>Administration</a>
            </li>";
            }

        }
        ?>
    </span>
    <span class="second-li">
        
        <?php
            if (!isset($_SESSION['sessionid'])) {
                echo"
                    <li>
                <a  href='login'>Login</a>
                </li>
            <li>
                <a href='register'>Register</a>
            </li>
                    
                
                
                ";
                
            }
        ?>
        <?php
        if (isset($_SESSION['sessionid'])) {
            echo"
                <li>
                    <a  href='logout'>Logout</a>
                </li>

                ";

        }
        ?>

    </span>




</ul>

</nav>

</header>
<main>