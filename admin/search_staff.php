<?php
include "../database.php";
session_start();

if (!isset($_SESSION["AID"])) {
    echo json_encode(["error" => "Access Denied"]);
    exit();
}

$search = isset($_GET["search"]) ? $db->real_escape_string($_GET["search"]) : '';

$sql = "SELECT * FROM staff WHERE TNAME LIKE '%$search%'";
$result = $db->query($sql);

$staffList = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $staffList[] = $row;
    }
}

echo json_encode($staffList);
?>
