<?php
    $masodperc = 3600;
    $perc = $masodperc / 60;
    $ora = $perc /60;
    if (is_int($ora)) {
        echo "<h3>$masodperc masodperc ennyi ora: $ora</h3>";
    }
    else{
        echo "<h1>Hiba! Az ertek nem egesz szam</h1>";
    }
?>