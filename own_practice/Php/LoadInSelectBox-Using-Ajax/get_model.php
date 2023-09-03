<?php
// Database connection
$bname=$_GET['brand'];
echo $bname;
$db = new mysqli('localhost', 'root', '', 'ajax_crud');

// Check for database connection errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Query to fetch data
$sql = "SELECT b_model FROM mobile WHERE b_name = '$bname'";
$result = $db->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return data as JSON
echo json_encode($data);

// Close the database connection
$db->close();
?>