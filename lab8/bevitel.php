<?php
include("connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Insert data from the form
if (isset($_POST["submit"])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];
    
    //$sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('$nev', '$szak', '$atlag')";

    $stmt = $con->prepare('INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)');
    $stmt->bind_param('ssd', $nev, $szak, $atlag);
    $stmt->execute();
    $con->commit();

    // rovidebb es konyebb modszer
    //    if($con->query($sql) === TRUE){
    //     $con->close();
    //     echo "Sikeres<br>";
    //     echo "<a href='listazas.php'>Listazas<a/><br>";
    //     echo "<a href='bevitel.php'>Új hallgató<a/><br>";
    // }else{
    //     echo "Error: ". $con->error . "<br>"; 
    // }
    
    // if ($con->query($sql) === TRUE) {
    //     echo "Új hallgató sikeresen hozzáadva!";
    // } else {
    //     echo "Hiba történt: " . $con->error;
    // }
    // Redirect back to the main page
    header("Location: listazas.php");
    //exit();
    $stmt->close();
}
$con->close();

?>


<form method="post" action=""> 
    Név: <input type="text" name="nev" value="">
    <span class="error"></span>
    <br><br>
    Szak: <input type="text" name="szak" value="">
    <span class="error"></span>
    <br><br>
    Átlag: <input type="text" name="atlag" value="">
    <span class="error"></span>
    <br><br>
    <input type="submit" name="submit" value="Submit"> 
</form>