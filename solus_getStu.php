<!-- // Purpose: To get all the students from the database and display them in a list
// Author:  Songyu Yang -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
    </head>
<body>
    
<?php
// Include the database connection file
include 'solus_connectdb.php';
?>

<?php
// Get all the students from the database
$result = $connection->query("select * from student");
echo "<ol>";
while ($row = $result->fetch()) {
    // show the result
	echo "<li>";
	echo $row["id"] . " " . $row["first"]. " " . $row["middleName"]
    . " " . $row["lastName"] . " " . $row["gender"] . " " . $row["netid"]
    . " " . $row["citizenship"] . " " . $row["visaStatus"]
    . " " . $row["phone"] . " " . $row["localStreetAddress"]
    . " " . $row["localCity"] . " " . $row["localProvince"]
    . " " . $row["localPC"] . " " . $row["permStreetAddress"]
    . " " . $row["permCity"] . " " . $row["permProvince"]
    . " " . $row["permPC"] . " " . $row["emergencyContactNumber"] ."</li>";
}
echo "</ol>";
?>
</body>