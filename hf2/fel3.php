<?php 
$napok = array(
    "HU" => array("H","K","Sze","Cs","P","Sz","V"),
    "EN" => array("M","Tu","W","Th","F","Sa","Su"),
    "DE" => array("Mo","Di","Mi","Do","F","Sa","So"),
);
foreach($napok as $orszag => $napokTomb) {
    echo "<p>$orszag: ";
    foreach ($napokTomb as $nap) {
        if (in_array($nap, array("K", "Cs", "Sz", "Tu", "Th", "Sa", "Di", "Do", "Sa"))) {
            echo "<strong>$nap</strong>, ";
        } else {
            echo "$nap, ";
        }
    }
}
?>
