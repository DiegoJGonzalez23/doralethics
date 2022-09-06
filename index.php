<?php
require_once 'includes/header.php';
?>
<?php
    //checking if an id is available meaning that they logged in succesfully since
    // we gave session access to id

    if(isset($_SESSION['sessionid'])){
        echo "<p class ='pindex'> Hello, {$_SESSION['sessionuser']}. You are now logged in!</p>";
        echo "<p class = 'pindex'>Welcome to the Ethics Website!</p>";

        echo "
                <div class='linksindex'>
                    <a  class ='info-link' href='info'>Account Information</a><br>
                    <a  class ='posting-link' href='posting'>Posting Essay</a> <br><br>
                </div>
                
                
                
                
                ";
        echo "<img src='pics/IMG_4314-min.jpg'  width='450px'> <br><br>";



        echo "
                <a  class ='officers' href='officers'>Officers for <u>2022-2023</u></a>              
             ";





    }
    else{
        echo "<p class = 'pindex'>Welcome to the Ethics Website!</p>";
        echo "<img src='pics/IMG_2586.jpg'  height='400px'width='600px'> <br><br>";

        echo "<a  class ='officers' href='officers'>Officers for <u>2022-2023</u></a>";



    }

?>
<?php
require_once 'includes/footer.php';
?>