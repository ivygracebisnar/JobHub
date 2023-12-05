<?php
include '../connection.php';

$ids = $_POST["id"];

// Update the 'active' column to 0 for the specified jobids
$deactivate_query = "UPDATE info SET active = 1 WHERE jobid IN (" . implode(",", $ids) . ")";
$result = mysqli_query($conn, $deactivate_query);

if ($result) {
    echo "Rows deactivated successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
