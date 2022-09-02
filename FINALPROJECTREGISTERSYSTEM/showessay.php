<?php
require_once 'includes/header.php';
?>

<script type='text/javascript'>

            function PrintThis() {

                var element = document.getElementById('essay');



                var opt =
                    {
                        margin:       1,
                        filename:     'EssayPost'+'.pdf',
                        html2canvas:  { scale: 2 },
                        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                    };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();

            }

</script>


<?php
if(isset($_GET["data"]))
{
$data = $_GET["data"];
    $sql= "SELECT title, comment FROM commentary WHERE id={$data}";
    $result =  $conn -> query($sql);
    $row= $result->fetch_assoc();
    echo "
        <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js' ></script>
        

        
        <button onClick='PrintThis()' class='printing'>Print Article</button> <br> <br><br><br>
    
    ";
    echo "<div id='essay'>
    {$row['title']}<br><div class = 'msgfinal'><p>{$row['comment']}</p></div>
    </div>
    ";


}
else{
    echo "
            <div class = 'msgfinal'><p>You need to click on a Post to view it</p></div>
    
    
    ";
}
?>
<?php
require_once 'includes/footer.php';
?>
