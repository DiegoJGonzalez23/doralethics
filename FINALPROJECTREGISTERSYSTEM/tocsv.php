<?php
require_once 'includes/database.php';
?>
<?php

$query = "SELECT * FROM users";
// gets the actual sql DATA
$result = mysqli_query($conn, $query);
// Gets the result from that
$number_of_fields = mysqli_num_fields($result);
// number of rows needed for the array
$headers = array();
for ($i = 0; $i < $number_of_fields; $i++) {
    $headers[] = mysqli_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}

function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}

?>