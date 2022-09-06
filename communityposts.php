<?php
require_once 'includes/header.php';
?>


<?php


//checking if an id is available meaning that they logged in succesfully since
// we gave session access to id


    $sql= "SELECT title, name, comment, id, user FROM commentary";
    $result =  $conn -> query($sql);

    if($result->  num_rows > 0){
        while($row= $result->fetch_assoc()){

            echo"
            <div class='boxing'>
                <div class='child'></div>
                <a  class='nameandtitle'href='showessay?data={$row['id']}'>Writer: {$row['name']} <br>User: {$row['user']}<br> <span class='title'>{$row['title']} </span> </a>
                </div>
                </div>
            <br>
            <br>
            <br>
                
            ";

        }
    }





?>
<?php
require_once 'includes/footer.php';
?>