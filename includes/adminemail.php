<?php
session_start();
require_once  'database.php';
?>
<?php
if(isset($_POST['submit'])){

    // STUFF SO THAT MAIL ONLY SENDS ONCE

    $sql= "SELECT name, email FROM users";
    // does sql query and gets the function from the $conn made in database.php
    $result =  $conn -> query($sql);

    if($result->  num_rows > 0){
        while($row= $result->fetch_assoc()){
            // returns associative array with the column and the specific element in each row for a user

            // STUFF SO THAT MAIL ONLY SENDS ONCE
            $sendmass = false;
            function fnDo(){
                $sendmass = true;
            }
            fnDo();

            if($sendmass){

                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $from = "diegowebmaster@doralethics.com";
                $to = "{$row['email']}";
                $subject = $_POST['subject'];


                $message = "Hi {$row['name']},\n {$_POST['body']}";
                $headers = "From:" . $from;
                mail($to,$subject,$message, $headers);


                ;



            }


        }

    }
    header("Location:../index?success=sentmassemail");









}
else{
    // in case that they did not click submit
    echo"You have to submit mass sender in order for this page to work";
}


?>