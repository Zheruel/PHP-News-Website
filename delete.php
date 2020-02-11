<?php
include "connect.php";
$id = $_GET['id'];
$stmt = $dbc->prepare("DELETE FROM clanak WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header('Location: administracija.php');
exit;
?>