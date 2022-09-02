<?php
session_start();
// check if they actually clicked submit instead of just accessing the page
if(isset($_POST['submit'])){

    require 'database.php';

    $name = $_POST['name'];
    $body = $_POST['body'];
    $title=$_POST['title'];


    // check if either field is empty
    if(empty($name) || empty($body)|| empty($title)){
        header("Location:../index.php?error=emptyfields");
        exit();

    }
    else{
        // Run another prepared statement

        $sql = "INSERT INTO commentary (name, comment, title, user ) VALUES (?,?,?, ?)";
        $stmt = mysqli_stmt_init($conn);
                    // check if sql statement matches
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location:../index.php?error=sqlerror");
                        exit();

                    }
                    else{

                        mysqli_stmt_bind_param($stmt, "ssss", $name, $body, $title, $_SESSION['sessionuser']);
                        mysqli_stmt_execute($stmt);

                        header("Location:../index.php?success=commented");
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                        exit();

                    }
                }




        // closing statement




    }


else{
    header("Location:../index.php?error=accessforbidden");
    exit();
}

?>