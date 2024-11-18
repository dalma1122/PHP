<?php
// Ha a süti még nincs beállítva, generálunk egy számot és eltároljuk benne
if (!isset($_COOKIE['szerverSzam'])) {
    $szerverSzam = rand(1, 10);
    setcookie('szerverSzam', $szerverSzam, time() + 3600); // Sütibe mentés 1 órára
} else {
    // Ha már létezik a süti, akkor használjuk annak értékét
    $szerverSzam = (int)$_COOKIE['szerverSzam'];
}

// Ellenőrizzük, hogy az űrlapot elküldték-e
if (isset($_POST['elkuldott'])) {
    // Ellenőrizzük, hogy a talalgatas mező tartalmaz-e számot
    if (isset($_POST['talalgatas']) && is_numeric($_POST['talalgatas'])) {
        // A felhasználó által beküldött szám lekérése és számként kezelése
        $talalgatas = (int)$_POST['talalgatas'];

        // Üzenet előállítása a számok összehasonlítása alapján
        if ($talalgatas < $szerverSzam) {
            $uzenet = "A szám nagyobb";
        } elseif ($talalgatas > $szerverSzam) {
            $uzenet = "A szám kisebb";
        } else {
            $uzenet = "Gratulálok eltaláltad";
            // Találat esetén új szám generálása és a süti frissítése
            $ujSzam = rand(1, 10);
            setcookie('szerverSzam', $ujSzam, time() + 3600); // Frissítjük a sütit
        }

        // Az eredmény megjelenítése
        echo "<p>$uzenet</p>";
    } else {
        echo "<p>Kérjük, adjon meg egy érvényes számot 1 és 10 között!</p>";
    }
}
?>

<form method="post" action="">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br><br>
    <input type="submit" value="Elküld">
</form>
