<?php
    $honap = 6;
    if ($honap == 12 || $honap == 1 || $honap == 2) {
        echo "Tel";
    } elseif ($honap >= 3 && $honap <= 5) {
        echo "Tavasz";
    } elseif ($honap >= 6 && $honap <= 8) {
        echo "Nyar";
    } elseif ($honap >= 9 && $honap <= 11) {
        echo "Osz";
    } else {
        echo "Nincs ilyen honap";
    }
    echo "<br>";
    switch ($honap) {
        case 1:
        case 2:
        case 12:
            echo "Tel";
            break;
        case 3:
        case 4:
        case 5:
            echo "Tavasz";
            break;
        case 6:
        case 7:
        case 8:
            echo "Nyar";
            break;
        case 9:
        case 10:
        case 11:
            echo "Osz";
            break;
    }
?>