<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = new mysqli($servername, $username, $password);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connected successfully<br>";
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS egyetem";
if ($con->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $con->error . "<br>";
}

// Select database
$con->select_db("egyetem");

// Create hallgatok table
$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DECIMAL(18,2) NOT NULL)";

if ($con->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $con->error . "<br>";
}

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL)"; 

if ($con->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $con->error . "<br>";
}

$con->close();
?>
