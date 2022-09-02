<?php
require_once 'includes/header.php';
?>
<div>
    <h1>REGISTER</h1>

    <!---- the action is done once you click on the submit button-->
    <form action="includes/register-inc.php" method="post">
        <input type="text" name="username" placeholder="Type username">
        <input type="text" name="id" placeholder="Type 7 digit ID from dadeschools">
        <input type="text" name="gradyear" placeholder="Graduation Year">
        <input type="text" name="email" placeholder="Email (with @gmail.com)">


        <input type="password" name="password" placeholder="Type password">
        <input type="password" name="confirmpassword" placeholder="Type password again">

        <label for="previousmember">Previous Member?</label>
        <select name="previousmember">
            <option>Yes</option>
            <option>No</option>
        </select>


        <label for="paidfee"> Paid the fee?</label>
        <select name="paidfee">
            <option>Yes</option>
            <option>No</option>
        </select>
        <br>
        <br>
        <label for="competing"> Do you want to compete?</label>
        <select name="competing">
            <option>Yes</option>
            <option>No</option>
        </select>
        <br>
        <br>
        <br>

        <button name= 'submit' type="submit">REGISTER</button>

    </form>
    <br>
    <p>Already have Account? <a href="login.php" class ="noacc">Log in Here</a></p>


</div>
<?php
require_once 'includes/footer.php';
?>