<?php
    $tomb = array(5,'5','05',12.3,'16.7','five','true',0xDECAFBAD,'10e200');
    $lenght = sizeof($tomb);
    for ($i = 0; $i < $lenght; $i++) {
        echo gettype($tomb[$i]), is_numeric($tomb[$i]) ? ' Igen <br>' : ' Nem <br>';
    }
?>