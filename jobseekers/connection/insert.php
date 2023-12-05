<?php
include '../connection.php';

// Assuming you have a mechanism to generate jobid or retrieve it from somewhere
// For example, you might use an auto-incremented primary key from another table
$jobid = $_POST["jobid"];

$title = $_POST["title"];
$description = $_POST["description"];
$location = $_POST["location"];
$requirements = $_POST["requirements"];
$salary = $_POST["salary"];
$posteddate = $_POST["posteddate"];
$employer_id = $_POST["employer_id"];

// Check if the jobid exists in the other_table
// Check if the employer_id exists in the employers table
$check_query = "SELECT id FROM employers WHERE id = '$employer_id'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // If the jobid exists, proceed with the insertion
    $insert_query = "INSERT INTO info(jobid, title, description, location, requirements, salary, posteddate, employer_id, active) VALUES ('$jobid', '$title', '$description', '$location', '$requirements', '$salary', '$posteddate', '$employer_id', '1')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "Job posted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: The specified jobid does not exist in the other_table.";
}
?>
