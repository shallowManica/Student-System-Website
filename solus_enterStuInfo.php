<!-- // Purpose: This file is used to enter student information into the database.
// Author:      Songyu Yang -->
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
include 'solus_connectdb.php';
?>

<?php
// Get the values of the input fields
$type = isset($_POST["type"])?$_POST["type"]:0;

$id = $_POST["id"];
$first = $_POST["firstName"];
$middleName = $_POST["middleName"];
$lastName = $_POST["lastName"];
$gender = $_POST["gender"];
$netid = $_POST["netid"];
$citizenship = $_POST["citizenship"];
$visaStatus = $_POST["visaStatus"];
$phone = $_POST["phone"];
$localStreetAddress = $_POST["localStreetAddress"];
$localCity = $_POST["localCity"];
$localProvince = $_POST["localProvince"];
$localPC = $_POST["localPC"];
$permStreetAddress = $_POST["permStreetAddress"];
$permCity = $_POST["permCity"];
$permProvince = $_POST["permProvince"];
$permPC = $_POST["permPC"];
$emergencyContactNumber = $_POST["emergencyContactNumber"];
$time = time();

//Validate form data
$errors = array();
if (empty($id)) {
  $errors[] = "Student ID is required";
}
if (empty($first)) {
  $errors[] = "First name is required";
}
// if (empty($middleName)) {
//   $errors[] = "Middle name is required";
// }
if (empty($lastName)) {
  $errors[] = "Last name is required";
}
if (empty($gender)) {
  $errors[] = "Gender is required";
}
if (empty($netid)) {
  $errors[] = "NetID is required";
}
if (empty($citizenship)) {
  $errors[] = "Citizenship is required";
}
if (empty($visaStatus)) {
  $errors[] = "Visa is required";
}
if (empty($phone)) {
  $errors[] = "Phone is required";
}
if (empty($localStreetAddress)) {
  $errors[] = "local street is required";
}
if (empty($localCity)) {
  $errors[] = "local city is required";
}
if (empty($localProvince)) {
  $errors[] = "Province is required";
}
if (empty($localPC)) {
  $errors[] = "Post code is required";
}
if (empty($permStreetAddress)) {
  $errors[] = "Permanent city is required";
}
if (empty($permCity)) {
  $errors[] = "Permanent province code is required";
}
if (empty($permProvince)) {
  $errors[] = "Permanent address is required";
}
if (empty($permPC)) {
  $errors[] = "Permanent postal code is required";
}
if (empty($emergencyContactNumber)) {
  $errors[] = "Emergency contact number is required";
} 
//display errors
if (!empty($errors)) {
  echo "<h2>Errors:</h2>";
  echo "<ul>";
  foreach ($errors as $error) {
    echo "<li>$error</li>";
  }
  echo "</ul>";
  echo '<button onclick="goBack()">Go Back</button>';
  echo '<script>function goBack() {window.history.back();}</script>';
} else{
  //insert data into database
    if(!$type){
        $sql = "INSERT INTO student(id, first, middleName, lastName, gender, netid, citizenship, visaStatus, phone, localStreetAddress, localCity,
 localProvince, localPC, permStreetAddress, permCity, permProvince, permPC, emergencyContactNumber)
  VALUES ('$id', '$first', '$middleName', '$lastName', '$gender', '$netid', '$citizenship', '$visaStatus', '$phone', 
  '$localStreetAddress', '$localCity', '$localProvince', '$localPC', '$permStreetAddress', '$permCity', '$permProvince', '$permPC', 
  '$emergencyContactNumber')";
        $numRows = $connection->exec($sql);
        if($numRows){
          // show message
            echo "<script type='text/javascript'>alert('Student Information was added!');location.href='solus_listStu.php';</script>";
            return ;
        }else{
            echo "<script type='text/javascript'>alert('fail added!');location.href='solus_enterStu.php';</script>";
            return ;
        }
    }else{
      //update data into database
        $sql = "update student set `first`='$first',`middleName`='$middleName',`lastName`='$lastName',`gender`='$gender',`netid`='$netid',`citizenship`='$citizenship',
`visaStatus`='$visaStatus',`phone`='$phone',`localStreetAddress`='$localStreetAddress',`localCity`='$localCity',`localProvince`='$localProvince',
`localPC`='$localPC',`permStreetAddress`='$permStreetAddress',`permCity`='$permCity',`permProvince`='$permProvince',`permPC`='$permPC',
`emergencyContactNumber`='$emergencyContactNumber' where id = '$id'";
        $numRows = $connection->exec($sql);
        if($numRows){
          // show message
            echo "<script type='text/javascript'>alert('Student Information was edited!');location.href='solus_listStu.php';</script>";
            return ;
        }else{
            echo "<script type='text/javascript'>alert('fail edited!');location.href='solus_listStu.php';</script>";
            return ;
        }
    }
}
?>
</body>
</html> 










