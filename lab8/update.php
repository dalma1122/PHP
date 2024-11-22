<?php
include("connect.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $stmt = $con->prepare('UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? where id = ?');
    $stmt->bind_param("ssdi", $nev, $szak, $atlag, $id);
    $stmt->execute();

    // $sql = "UPDATE hallgatok SET nev='$nev', szak='$szak', atlag='$atlag' where id='$id'";
    // $result = $conn->query($sql);
    header("Location: listazas.php");
    $stmt->close();
} else {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM hallgatok WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result= $stmt->get_result()->fetch_assoc();


    // $sql = "SELECT * FROM hallgatok WHERE id=" . $_GET['id'];
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    if ($result) { 
        $nev = $result['nev']; 
        $szak = $result['szak']; 
        $atlag = $result['atlag']; 
        } else { 
            echo "Hiba: nem található hallgató az adott ID-val.<br>"; } 
            $stmt->close(); 
            $con->close(); 
            } ?> 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
    Nev:<input type="Text" name="nev" value="<?php echo $nev; ?>"><br> 
    Szak:<input type="Text" name="szak" value="<?php echo $szak; ?>"><br> 
    Atlag:<input type="Text" name="atlag" value="<?php echo $atlag; ?>"><br> 
    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
    <input type="Submit" name="submit" value="Elkuld"> 
</form>