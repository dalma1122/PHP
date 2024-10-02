<?php
    $szam1 = 10;
    $szam2 = 0;
    $muvelet = "/";
    if ($muvelet != "+" && $muvelet != "-" && $muvelet != "*" && $muvelet != "/") {
        echo "Ervenytelen muveleti jel! Lehetseges: +, -, *, /";
    } else {
        switch ($muvelet) {
            case "+":
                echo "Eredmeny: " . $szam1 + $szam2;
                break;
            case "-":
                echo "Eredmeny: " . $szam1 - $szam2;
                break;
            case "*":
                echo "Eredmeny: " . $szam1 * $szam2;
                break;
            case "/":
                if($szam2 == 0) {
                    echo "Hiba! Nem lehet 0-val oosztani!<br>";
                } else {
                    echo "Eredmeny: " . $szam1 / $szam2;
                    break;
                }
        }
    }
?>