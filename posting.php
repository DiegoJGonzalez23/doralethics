<?php
require_once 'includes/header.php';
?>

<?php
if(isset($_SESSION['sessionid'])){



    echo"
        <h1>MAKE A POST</h1>
        
        <form action='includes/posting-inc.php' method='post'>
            <input type='text' name='name' placeholder='Type Name (Last, First)'>
            <input type='text' name='title' placeholder='Title of POST'>
            <textarea name='body'  style='height: 200px; width: 1100px;' >
            
            </textarea>
            <br>
            <br>
            <br>
            <button type='submit' name='submit'>SUBMIT POST</button>
        
        </form>
      
     

   

    ";

}
else{
echo "<p class = 'pindex'>You must be logged in to make a post</p>";
}
?>



<?php
require_once 'includes/footer.php';
?>

