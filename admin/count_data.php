<?php
include "../database.php";
session_start();

if (!isset($_SESSION["AID"])) {
    echo json_encode(["error" => "Access Denied"]);
    exit();
}

// Query for staff count
$staffCountQuery = "SELECT COUNT(*) as count FROM staff";
$staffCountResult = $db->query($staffCountQuery);
$staffCount = $staffCountResult->fetch_assoc()['count'];

// Query for student count
$studentCountQuery = "SELECT COUNT(*) as count FROM student";
$studentCountResult = $db->query($studentCountQuery);
$studentCount = $studentCountResult->fetch_assoc()['count'];

echo json_encode([
    "staffCount" => $staffCount,
    "studentCount" => $studentCount
]);
?>
