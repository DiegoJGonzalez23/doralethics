<?php

    // check if they actually clicked submit instead of just accessing the page
    if(isset($_POST['submit'])){
        // Add data base conneciton
        require 'database.php';
        // now we have access to variable conn from database.php

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $studentid = $_POST["id"];
        $gradyear = $_POST["gradyear"];
        $paidfee = $_POST["paidfee"];
        $competing = $_POST["competing"];
        $email = $_POST["email"];
        $prevmember = $_POST["previousmember"];
        $ranking = 0;

        // Now we have to do error handling
    
        
        // have to check user and pass not null
        if(empty($username) || empty($password) || empty($confirmpassword) ||  empty($paidfee)|| empty($competing) || empty($studentid) || empty($gradyear)|| empty($email) || empty($prevmember)){
            // if any of the fields are empty they messed up registration
            // redirect to form again with error message

            // ../ goes back one location from the current directory youre in
            header("Location:../register.php?error=emptyfields&username={$username}");

            exit();
        }
        // check for weird characters not allowed for username
        elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
            header("Location:../register.php?error=invalidusername&username={$username}");

            exit();
        }
        // check if pass and confirm pass the same
        elseif($password !== $confirmpassword){
            header("Location:../register.php?error=passdontmatch&username={$username}");

            exit();
        }
        // check if username already in database
        else{
            // make a query for sql using a prepared statement
            $sql = "SELECT username FROM users WHERE username= ?";
            $stmt = mysqli_stmt_init($conn);
            // check if it failed
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location:../register.php?error=sqlerror");
                exit();

            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);

                //check if user already there and fetch info
                mysqli_stmt_store_result($stmt);

                // how many rows match (1= already there 0 = not there)
                $rowCount = mysqli_stmt_num_rows($stmt);
                if($rowCount > 0){
                    header("Location:../register.php?error=usernametaken");
                    exit();
                }
                else{


                    //$username = $_POST['username'];
                    //$password = $_POST['password'];
                    //$confirmpassword = $_POST['confirmpassword'];
                    //$studentid = $_POST["id"];
                    //$gradyear = $_POST["gradyear"];
                    //$paidfee = $_POST["paidfee"];
                    //$competing = $_POST["competing"];

                    if($paidfee == "Yes"){
                        $paidfee=1;
                    }
                    else{
                        $paidfee=0;
                    }

                    if($competing == "Yes"){
                        $competing=1;
                    }
                    else{
                        $competing=0;
                    }
                    if($prevmember == "Yes"){
                        $prevmember=1;
                    }
                    else{
                        $prevmember=0;
                    }

                    $sql = "INSERT INTO users (username, password, dadeid, paid, competing,gradyear,email,prevmember,ranking) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    // check if sql statement matches
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location:../register.php?error=sqlerror");
                        exit();

                    }
                    else{

                        // Hash the password for security
                        $hashedPass=password_hash($password,PASSWORD_DEFAULT);

                        // insert into sql
                        // puts the things where the ? was to prevent sql injects
                        mysqli_stmt_bind_param($stmt, "ssiiiisis", $username, $hashedPass,$studentid,$paidfee,$competing,$gradyear,$email,$prevmember,$ranking);
                        mysqli_stmt_execute($stmt);


                        header("Location:mailservice?data={$email}");
                        exit();

                    }
                }
            }


        }
        // closing statement

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        

    }

?>