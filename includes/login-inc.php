<?php

    // check if they actually clicked submit instead of just accessing the page
    if(isset($_POST['submit'])){
        
        require 'database.php';

        $username = $_POST['username'];
        $password = $_POST['password'];


        // check if either field is empty
        if(empty($username) || empty($password)){
            header("Location:../index.php?error=emptyfields");
            exit();

        }
        else{
            // Run another prepared statement
            $sql = "SELECT * FROM users WHERE username=?";
            // initialize the sql thingy stmt
            $stmt = mysqli_stmt_init($conn);
            // check if the sql statement does not work
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location:../index.php?error=sqlerror");
                exit();
            }
            else{
                // actually putting user into sql query
                mysqli_stmt_bind_param($stmt, "s",$username);
                mysqli_stmt_execute($stmt);
                // finding result
                $result = mysqli_stmt_get_result($stmt);

                //check if user not in database
                if($row=mysqli_fetch_assoc($result)){
                    // there is a user
                    // check if unhashed is equal to the hashed password in db
                    $passCheck = password_verify($password, $row['password']);
                    if(!$passCheck){
                        header("Location:../index.php?error=wrongpassword");
                        exit();

                    }
                    elseif ($passCheck){
                        // use superglobal session for login screen
                        session_start();
                        $_SESSION['sessionid']=$row['id'];
                        $_SESSION['sessionuser']=$row['username'];
                        $_SESSION['sessionpaidfee']=$row['paid'];
                        $_SESSION['sessiondadeid']=($row['dadeid']);
                        $_SESSION['sessiongradyear']=$row['gradyear'];
                        $_SESSION['sessioncompeting']=$row['competing'];
                        $_SESSION['sessionemail']=$row['email'];
                        $_SESSION['sessionprevmember']=$row['prevmember'];
                        $_SESSION['sessionranking']=$row['ranking'];

                        // dont put pass in session since that is sensitive
                        header("Location:../index?success=loggedin");
                        exit();



                    }
                    else{
                        header("Location:../indexp?error=wrongpassword");
                        exit();
                    }
                    
                }

                else{
                    //nothing from databse
                    header("Location:../index?error=nouserindatabase");
                    exit();
                }
            }

        }

    


    }
    else{
        header("Location:../index?error=accessforbidden");
        exit();
    }

?>