<!-- Purpose: To enter course information
Author:  Songyu Yang -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Submit Course</title>
</head>
<body>
<<?php
include 'solus_connectdb.php';
?>
<ol>
<?php
// get the input from the form, and sanitize it
$type = isset($_POST["type"]) ? $_POST["type"] : '';
$code = $_POST["code"];
$units = $_POST["units"];
$learningHours = $_POST["learningHours"];
$description = $_POST["description"];
$time = time();

$errors = array();
// validate the input
if (empty($code)) {
    $errors[] = "Course code is required";
}
// check if the course code is already in the database
if (empty($units) || $units < 0) {
    $errors[] = "Units are required and must be greater than 0";
}
if (empty($learningHours) || $learningHours < 0) {
    $errors[] = "Learning hours are required and must be greater than 0";
}
// if (empty($description)) {
//    $errors[] = "Description is required";
// }
if (!empty($errors)) {
    echo "<h2>Errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo '<button onclick="goBack()">Go Back</button>';
    echo '<script>function goBack() {window.history.back();}</script>';
} else {
    // if there are no errors, then add the course to the database
    if (!$type) {
        $sql = 'INSERT INTO course (code, units, learningHours, description) VALUES (:code, :units, :learningHours, :description)';
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'code' => $code,
            'units' => $units,
            'learningHours' => $learningHours,
            'description' => $description
        ]);
        if ($stmt->rowCount()) {
            // if the course was added successfully, then redirect to the list of courses
            echo "<script type='text/javascript'>alert('Your course was added!');location.href='solus_listCou.php';</script>";
            return;
        } else {
            echo "<script type='text/javascript'>alert('fail added!');location.href='solus_enterCou.php';</script>";
            return;
        }
    } else {
        // if the course was added successfully, then redirect to the list of courses
        $sql = "UPDATE course SET units = :units, learningHours = :learningHours, description = :description WHERE code = :code";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            'code' => $code,
            'units' => $units,
            'learningHours' => $learningHours,
            'description' => $description
        ]);
        if ($stmt->rowCount()) {
            echo "<script type='text/javascript'>alert('Your course was edited!');location.href='solus_listCou.php';</script>";
            return;
        } else {
            echo "<script type='text/javascript'>alert('fail edited!');location.href='solus_listCou.php';</script>";
            return;
        }
    }
}
?>
</ol>
</body>
</html>