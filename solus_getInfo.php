<!-- // Purpose: Get the information from the database and display it
// Author: Songyu Yang -->
<?php
// get the input from the form, and sanitize it
$result = $connection->query("select * from student");
echo "<ol>";
while ($row = $result->fetch()) {
	// show the result
	echo "<li>";
	echo $row["id"]."</li>";
}
echo "</ol>";
?>