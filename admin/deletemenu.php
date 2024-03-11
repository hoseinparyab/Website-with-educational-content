<?php
include '../config/db.php';
$result = $conn->prepare ('DELETE FROM menu WHERE id=?');
$result->bindValue(1 , $_GET['id']);
$result->execute();
header('location:menu.php');