<?php
require_once 'includes/header.php';
?>

<?php
if(isset($_SESSION['sessionid'])){
    echo "<p>You are already logged in {$_SESSION['sessionuser']}!</p>";
    

}
else{

    echo "
        <div>
            <h1>Log in</h1>
            <form action='includes/login-inc.php' method='post''>
                <input type=text' name='username' placeholder='Type username'>
                <input type='password' name='password' placeholder='Type password'>
                <button type='submit' name='submit'>LOGIN</button>
        
            </form>
            <br>
            <p class=''>No Account? <a href='register.php' class='noacc'>Register Here</a></p>
        
        
        </div>
        
        ";


}
?>


<?php
require_once 'includes/footer.php';
?>



