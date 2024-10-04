<?php
$szines = 'lightblue';
$szorzotabla = function($n) use ($szines) {
    echo "<table border=1 style='border-collapse: collapse';>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";
        for($j=1; $j <= $n; $j++){
            $value = $i * $j;
            if($i == $j) {
                echo "<td style='background-color: $szines; width: 30px; height: 30px; text-align: center;'>$value</td>";
            } else {
                echo "<td style='width: 30px; height: 30px; text-align: center;'>$value</td>";
            }  
        }
        echo "</tr>";
    }
    echo "<table>";
};
$szorzotabla(10);
?>