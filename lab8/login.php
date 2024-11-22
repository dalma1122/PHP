<?php
include("connect.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && $password == $result['password']) {
        $_SESSION['username'] = $username;
        header("Location: listazas.php");
    } else {
        echo "Helytelen felhasználónév vagy jelszó.<br>";
    }

    $stmt->close();
}
$con->close();
?>

<form method="post" action="login.php">
    Felhasználónév: <input type="text" name="username" required><br>
    Jelszó: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Bejelentkezés">
</form>
