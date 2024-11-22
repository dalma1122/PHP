<?php
include("connect.php");

$nev = "Kis Lajos";
$szak = "GI";
$atlag = 8.50;

$stmt = $con->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $nev, $szak, $atlag);
$stmt->execute();
$con->commit();

// $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('$nev','$szak','$atlag') ";
// if ($con->query($sql) === TRUE) {
//     echo "Table created successfully<br>";
// } else {
//     echo "Error creating table: " . $con->error . "<br>";
// }

// Hallgatók adatai
$studentsData = array(
    array('John Doe', 'Informatika', 5.2),
    array('Alice Smith', 'Műszaki Informatika', 7.9),
    array('Bob Johnson', 'Gazdaságinformatika', 8.8),
    array('Eva Wilson', 'Matematika', 9.5),
    array('Mike Brown', 'Fizika', 5.0),
    array('Sarah Davis', 'Kémia', 3.7),
    array('David Lee', 'Biológia', 8.1),
    array('Linda Martinez', 'Informatika', 8.8),
    array('Tom Miller', 'Műszaki Informatika', 5.3),
    array('Karen Wilson', 'Gazdaságinformatika', 6.5)
    );

foreach ($studentsData as $student) {
    $nev = $student[0];
    $szak = $student[1];
    $atlag = $student[2];
    
    $stmt = $con->prepare('INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)');
    $stmt->bind_param('ssd', $nev , $szak, $atlag);
    $stmt->execute();
    $con->commit();
    
    
    
    // $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('$nev', '$szak', '$atlag')";
    // if ($con->query($sql) === TRUE) {
    //     echo "Table created successfully<br>";
    // } else {
    //     echo "Error creating table: " . $con->error . "<br>";
    // }
}

$login = array(
    array('John', 'john'),
    array('Alice' , 'alice'),
    array('Bob', 'bob'),
    );


foreach ($login as $row) {
    $username = $row[0];
    $password = $row[1];

    $stmt = $con->prepare('INSERT INTO users (username, password) values (?, ?)');
    $stmt->bind_param('ss', $username , $password);
    $stmt->execute();
    $con->commit();
}

$stmt->close();
$con->close();
?>