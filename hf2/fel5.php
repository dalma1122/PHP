<?php
function hoozaad(&$lista, $nev, $mennyiseg, $egysegar) {
    $lista[] = [
        "nev"=>$nev,
        "mennyiseg"=>$mennyiseg,
        "egysegar"=>$egysegar
    ];
    echo "$nev hozzadva a listahoz!<br>";
}

function eltavolit(&$lista,$nev){
    foreach ($lista as $key => $value) {
        if ($value["nev"] == $nev) {
            unset($lista[$key]);
            echo "$nev eltavolitva a listabol!<br>";
            return;
        }
    }
    echo "$nev nincs ilyeb termek a listaban!<br>";
}

function kiirLista($lista){
    echo "Bevasarlolista:";
    foreach ($lista as $termekek) {
        echo "<p>{$termekek['nev']} - Mennyiség: {$termekek['mennyiseg']}, Egységár: {$termekek['egysegar']} Ft</p>";
    }
}

function osszKoltseg($lista) {
    $osszeg = 0;
    foreach ($lista as $termekek) {
        $osszeg  += $termekek["mennyiseg"] * $termekek["egysegar"];
    }
    echo "Osszeg: $osszeg <br>";
}

hoozaad($lista,"Kenyer",2,8.5);
hoozaad($lista,"Viz",1,2.5);
hoozaad($lista,"Tej",2,18);
hoozaad($lista,"Szalami",1,6.5);
eltavolit($lista, "Tej");
kiirLista($lista);
osszKoltseg($lista);
?>