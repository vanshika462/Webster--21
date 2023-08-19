<?php
if (isset($_POST['add'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $comment = $_POST['comment'];

    // Database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expensave";

    // Create connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

    // Prepare and bind the statement
    $sql = "INSERT INTO add_transaction (amount, category, comment) VALUES (?,?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $amount, $category, $comment);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    // Check if the insertion was successful
    if ($success) {
        echo "Successfully saved";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>