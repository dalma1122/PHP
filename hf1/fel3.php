<?php
    $x = 0;
    $y = -3;
    echo "Osszeadas eredmenye: " . ($x + $y) . "<br>";
    echo "Kivonas eredmenye: " . ($x - $y) . "<br>";
    echo "Szorzas eredmenye: " . ($x * $y) . "<br>";
    if ($y == 0) {
        echo "Hiba! Nem lehet 0-val oosztani!<br>";
    } else {
        $osztas = $x / $y;
        echo "Osztas eredmenye: $osztas<br>";
    }
    if ($x == 0 && $y < 0){
        echo "Hiba! 0-t nem lehet negativ hatvanyra emelni!";
    } else {
        echo "Hatvanyozas eredmenye: " . ($x ** $y) . "<br>";
    }
?>