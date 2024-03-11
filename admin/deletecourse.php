<?php
include '../config/db.php';
$id = $_GET['id'];

$result = $conn->prepare('DELETE FROM course WHERE id=?');
$result->bindValue(1, $id);
$result->execute();
header('location:course.php');