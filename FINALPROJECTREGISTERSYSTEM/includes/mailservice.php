<?php
if(isset($_GET["data"])) {
    $data = $_GET["data"];
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "diegowebmaster@doralethics.com";
    $to = "{$data}";
    $subject = "Welcome to Doral Ethics";


    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
        header("Location:../login");

        ;
    } else {
        echo "The email message was not sent.";


    }


}

else{
    echo "
    Need to have registered

";
}
?>