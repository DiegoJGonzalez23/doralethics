<?php
require_once 'includes/header.php';
?>
<?php
//checking if an id is available meaning that they logged in succesfully since
// we gave session access to id

if(isset($_SESSION['sessionid'])){

//    $_SESSION['sessionid']=$row['id'];
//    $_SESSION['sessionuser']=$row['username'];
//    $_SESSION['sessionpaidfee']=$row['paid'];
//    $_SESSION['sessiondadeid']=($row['dadeid']);
//    $_SESSION['sessiongradyear']=$row['gradyear'];
//    $_SESSION['sessioncompeting']=$row['competing'];
//    $_SESSION['sessionemail']=$row['email'];
//    $_SESSION['sessionprevmember']=$row['prevmember'];
    if ($_SESSION['sessionprevmember'] = 1) {
        $showprevmember = "Yes";
    }
    else{
        $showprevmember="No";
    }
    if ($_SESSION['sessioncompeting'] = 1) {
        $showcompeting = "Yes";
    }
    else{
        $showcompeting="No";
    }
    if ($_SESSION['sessionpaidfee'] = 1) {
        $showpaid = "Yes";
    }
    else{
        $showpaid="No";
    }


    echo "<p class='pindex'>Your Graduating year: {$_SESSION['sessiongradyear']} </p>";
    echo "<p class='pindex'>Your ID: 0{$_SESSION['sessiondadeid']} </p>";
    echo "<p class='pindex'>Your email: {$_SESSION['sessionemail']} </p>";
    echo "<p class='pindex'>Previous Member?  {$showprevmember} </p>";
    echo "<p class='pindex'>Paid Fee?  {$showpaid} </p>";
    echo "<p class='pindex'>Competing?  {$showcompeting} </p>";


}
else{
    echo "<p class = 'pindex'>Need to be logged in to see info!</p>";




}

?>
<?php
require_once 'includes/footer.php';
?>