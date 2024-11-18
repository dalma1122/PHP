<?php
session_start(); // Munkamenet indítása

// Ha a munkamenetben még nincs tárolva a szám, generálunk egyet
if (!isset($_SESSION['szerverSzam'])) {
    $_SESSION['szerverSzam'] = rand(1, 10); // Generálunk egy számot 1 és 10 között
}

// Ellenőrizzük, hogy az űrlapot elküldték-e
if (isset($_POST['elkuldott'])) {
    // Ellenőrizzük, hogy a talalgatas mező tartalmaz-e számot
    if (isset($_POST['talalgatas']) && is_numeric($_POST['talalgatas'])) {
        // A felhasználó által beküldött szám lekérése és számként kezelése
        $talalgatas = (int)$_POST['talalgatas'];
        $szerverSzam = $_SESSION['szerverSzam']; // A munkamenetben tárolt szám

        // Üzenet előállítása a számok összehasonlítása alapján
        if ($talalgatas < $szerverSzam) {
            $uzenet = "A szám nagyobb";
        } elseif ($talalgatas > $szerverSzam) {
            $uzenet = "A szám kisebb";
        } else {
            $uzenet = "Gratulálok eltaláltad!";
            // Találat esetén új szám generálása és tárolása a munkamenetben
            $_SESSION['szerverSzam'] = rand(1, 10); // Új szám generálása
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
