<?php
include("connect.php");

$sql = "SELECT * FROM hallgatok";
$result = $con->query($sql);


echo "<a href='bevitel.php'>Uj hallgatok</a>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Név</th><th>Szak</th><th>Átlag</th><th>Frissités</th><th>Törlés</th></tr>";
    while ($row = $result->fetch_assoc()) {
       echo "<tr>";
       echo "<td>" . $row["id"] . "</td>";
       echo "<td>" . $row["nev"] . "</td>";
       echo "<td>" . $row["szak"] . "</td>";
       echo "<td>" . $row["atlag"] . "</td>";
       echo "<td><a href=update.php?id=" . $row["id"] .">Update</a></td>";
       echo "<td><a href=delete.php?id=" . $row["id"] .">Delete</a></td>";
       echo "</tr>";
    }
    echo "</table>";
}

$con->close();
?>