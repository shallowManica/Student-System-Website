<!-- // Purpose: To enter a new program or edit an existing program
// Author:  Songyu Yang -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
        <link rel="stylesheet" type = "text/css" href="main.css">
        <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
    </head>
<body>

<?php
// Include the database connection file
include 'solus_connectdb.php';

// Get the values of the input fields
$type = isset($_POST["type"]) ? $_POST["type"] : 0;
$code = $_POST["code"];
$name = $_POST["name"];
$automaticAcceptanceGPA = $_POST["automaticAcceptanceGPA"];
$pendingListAcceptanceGPA = $_POST["pendingListAcceptanceGPA"];
$time = time();

// Validate the input fields
$errors = array();
if (empty($code)) {
    $errors[] = "Please enter a degree plan code.";
} 

if (empty($name)) {
    $errors[] = "Please enter a degree plan name.";
} 

if (empty($automaticAcceptanceGPA)) {
    $errors[] = "Please enter the automatic acceptance GPA.";
} 

if (!is_numeric($automaticAcceptanceGPA)) {
    $errors[] = "Automatic acceptance GPA must be a number.";
}

if (empty($pendingListAcceptanceGPA)) {
    $errors[] = "Please enter the pending list acceptance GPA.";
}

if (!is_numeric($pendingListAcceptanceGPA)) {
    $errors[] = "Pending list acceptance GPA must be a number.";
} 
// If there are errors, display them
if (!empty($errors)) {
    echo "<h2>Errors:</h2>";
    echo "<ul>";

    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
// Go back to the previous page
    echo "</ul>";
    echo '<button onclick="goBack()">Go Back</button>';
    echo '<script>function goBack() {window.history.back();}</script>';
} else {
    if (!$type) {
        // Insert the values into the database
        $sql = "INSERT INTO degreePlan (`code`, `name`, `automaticAcceptanceGPA`, `pendingListAcceptanceGPA`) 
        VALUES (:code, :name, :automaticAcceptanceGPA, :pendingListAcceptanceGPA)";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'code' => $code,
            'name' => $name,
            'automaticAcceptanceGPA' => $automaticAcceptanceGPA,
            'pendingListAcceptanceGPA' => $pendingListAcceptanceGPA
        ]);
        // If the insert was successful, display a success message
        if ($stmt->rowCount()) {
            echo "<script type='text/javascript'>alert('Your Program was added!');location.href='solus_listPro.php';</script>";
            return;
        } else {
            echo "<script type='text/javascript'>alert('fail added!');location.href='solus_enterPro.php';</script>";
            return;
        }
    } else {
        // Update the values into the database
        $sql = "update degreePlan set `name`=:name, automaticAcceptanceGPA=:automaticAcceptanceGPA,
        pendingListAcceptanceGPA=:pendingListAcceptanceGPA where code = :code";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'code' => $code,
            'name' => $name,
            'automaticAcceptanceGPA' => $automaticAcceptanceGPA,
            'pendingListAcceptanceGPA' => $pendingListAcceptanceGPA
        ]);

        if ($stmt->rowCount()) {
            // If the update was successful, display a success message
            echo "<script type='text/javascript'>alert('Your Program was edited!');location.href='solus_listPro.php';</script>";
            return;
        } else {
            echo "<script type='text/javascript'>alert('fail edited!');location.href='solus_listPro.php';</script>";
            return;
        }
    }
}
?>
</body>
</html> 