<?php
require_once 'includes/header.php';
?>

<?php
echo "sddssdsds";

if(isset($_SESSION['sessionid'])) {
    if($_SESSION['sessionranking']>1){
    echo "
        <a  class ='info-link' href='tocsv'>Export USERS table to CSV</a><br>
        <hr>
    
        <p>Send Email to everyone:</p>
    
        <form action='includes/adminemail.php' method='post'>
    
            <input type='text' name='subject' placeholder='Subject'>
            <p>Body</p>
            <textarea name='body'  style='height: 200px; width: 1100px;'></textarea>
            <button type='submit' name='submit'>Send E-mail</button>
    
   
        </form>
        ";
    }
    else{
        echo"You do not have the permissions to see this tab. Talk to webmaster if this needs change";
    }
}

else{
    echo "You Need to be logged in to see Admin Page";
}
?>
<?php
require_once 'includes/footer.php';
?>
