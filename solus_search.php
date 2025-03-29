<!-- // Purpose: Search student information
// Author:  Songyu Yang -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
    </head>
<body>
    
<?php
include 'solus_connectdb.php';
?>

<h1>Welcome to Solus</h1>
<h2>Search Student Information</h2>
<form action="solus_getStu.php" method="post">
Please Input Your Student ID: <input type="text" name="id" ><br>

<input type="submit" value="Search">
</form>
<p>
<hr>
<p>

<h3> Search Course Information:</h3>
<form action="solus_addnewpet.php" method="post">
Please Input Course Code: <input type="text" name="code"><br>

<input type="submit" value="Search">
</form>
<p>
<hr>
<p>

<h4>Search Degree Plan Information</h4>
<form action="solus_getpets.php" method="post">
    Please Input Degree Plan Code: <input type="text" name="code"><br>

<input type="submit" value="Search">
</form>
<p>
<hr>
<p>

<h5>Search All Information</h5>
<form action="getpets.php" method="post">
Please Input Your Student ID: <input type="text" name="id"><br>

<input type="submit" value="Search">
</form>
<p>
<hr>
<p>