<?php
function atalakit($tomb, $kis_v_nagy) {
    $ujTomb = array();
    
    foreach ($tomb as $kulcs => $ertek) {
        if ($kis_v_nagy == "kisbetus") {
            $ujTomb[$kulcs] = strtolower($ertek);
        } elseif ($kis_v_nagy == "nagybetus") {
            $ujTomb[$kulcs] = strtoupper($ertek); 
        }
    }

    return $ujTomb;
}

function atalakit_array_map($tomb, $mod) {
    if ($mod == "kisbetus") {
        return array_map('strtolower', $tomb);  
    } elseif ($mod == "nagybetus") {
        return array_map('strtoupper', $tomb);  
    }
    return $tomb; 
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

echo "Klasszikus mod: <br>";
print_r(atalakit($szinek, "kisbetus"));
echo "<br>";
print_r(atalakit($szinek, "nagybetus"));
echo " <br>";
echo " <br>";
echo "Array_map atalakitas: <br>";
print_r(atalakit_array_map($szinek, "kisbetus"));
echo "<br>";
print_r(atalakit_array_map($szinek, "nagybetus"));

?>
