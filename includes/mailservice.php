<?php
$onlyonce = 1;


if($onlyonce == 1){
    $onlyonce +=1;
    if(isset($_GET["data"])) {
        echo "got here";
        $data = $_GET["data"];
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $from = "diegowebmaster@doralethics.com";
        $to = "{$data}";
        $subject = "Welcome to Doral Ethics";


        $message = "Date		
                    9/6		learning theories \n
                    9/13		\n
                    9/20		\n
                    9/27		\n
                    10/4		\n
                    10/11		\n
                    10/18		\n
                    10/25		\n
                            
                    11/1		case preparing\n
                    11/15		for regionals\n
                    11/29		\n
                    12/13		\n
                    12/20		\n
                    12/27		\n
                    1/10		\n
                    1/24		\n
                            
                    2/7		case preparing\n
                    2/21		for nats/doral\n
                    3/7		\n
                    3/21		\n
                    4/4		\n
                    4/18		\n
                            
                    5/30		awards and saying\n
                            bye and stuff";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, $headers)) {
            header("Location:../login?success=registeremailsent");

            ;
        } else {
            echo "The email message was not sent.";


        }


    }

    else {
        echo "
    Need to have registered

    ";
    }

}
?>