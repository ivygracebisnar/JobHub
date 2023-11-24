<?php
    include('../connection.php');
    
    $title = $_POST["title"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $requirements = $_POST["requirements"];
    $salary = $_POST["salary"];
    $dateposted = $_POST["dateposted"];
    $employer_id = $_POST["employer_id"];

    $insert_query = "INSERT INTO inf(title, description, location, requirements, salary, posteddate, employer_id, active) VALUES ('$title', '$description', '$location', '$requirements', '$salary', '$posteddate','$employer_id', 1)";
    
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "Job posted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
