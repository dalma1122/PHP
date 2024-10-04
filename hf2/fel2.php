<?php
$orszagok = array("Magyarorszag"=>"Budapest","Romania"=>"Bukarest","Belgium"=>"Brussels","Austria"=>"Vienna","Poland"=>"Warsaw");
foreach ($orszagok as $orszag => $fovaros) {
    echo "<p>$orszag fovarosa<span style='color:red;'> $fovaros</span>.</p>";
}
?>