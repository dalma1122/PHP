<?php
include("connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM hallgatok WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        header("Location: listazas.php");
    } else {
        echo "Error deleting record: " . $con->error . "<br>";
    }
}
?>
