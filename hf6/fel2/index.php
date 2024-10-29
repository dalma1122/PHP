<?php
$name = $email = $password = $pwd = $birthday = $gender = '';
$nameError = $emailError = $passwordError = $pwdError = $birthdayError = $genderError = '';
$pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
$interest = isset($_POST["interest"]) ? $_POST["interest"] : [];
$country = $_POST["country"] ?? '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $nameError = 'Nev kitoltese kotelezo';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailError = "Email kitoltese kotelezo";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Ervenytelen email formatum";
        }
    }

    if (empty($_POST["password"])) {
        $passwordError = "Jelszo kitoltese kotelezo";
    } else {
        $password = htmlspecialchars($_POST["password"]);
        if (!preg_match($pattern, $_POST["password"])) {
            $passwordError = "Ervenytelen jelszo, tartalmaznia kell legalabb 1 nagybetu, 1 szam es 1 specialis karaktert";
        }
    }

    if (empty($_POST['pwd'])) {
        $pwdError = "Jelszo megerositese kotelezo";
    } else {
        $pwd = htmlspecialchars($_POST["pwd"]);
        if ($_POST['pwd'] != $_POST['password']) {
            $pwdError = "A ket jelszo nem egyezik meg";
        }
    }

    if (empty($_POST["birthday"])) {
        $birthdayError = "Add meg a szuletesi datumodat";
    } else {
        $birthday = htmlspecialchars($_POST["birthday"]);
        $today = date('Y-m-d');
        if ($birthday > $today) {
            $birthdayError = "Szuletesi datum nem lehet a jovoben";
        }
    }

    if (empty($_POST["gender"])) {
        $genderError = "Add meg a nemedet";
    } else {
        $gender = htmlspecialchars($_POST["gender"]);
    }

    if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($pwdError) && empty($birthdayError) && empty($genderError)) {
        echo "<h3>Kuldott adatok:</h3>";
        echo "<p><strong>Név:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Jelszó:</strong> $password</p>";
        echo "<p><strong>Születési dátum:</strong> $birthday</p>";
        echo "<p><strong>Nem:</strong> $gender</p>";
        if (!empty($interest)) {
            echo "<p><strong>Érdeklődési területek:</strong> $interest</p>";
        }
        if (!empty($country)){
            echo "<p><strong>Ország:</strong> $country</p>";
        }
    }
}
?>

<form method="post" action="">
    <label for="name">Név:
        <input type="text" name="name" value="">
        <span class="error"><?php echo $nameError?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="">
        <span class="error"><?php echo $emailError?></span>
    </label>
    <br><br>
    <label for="password">Jelszó:
        <input type="password" name="password" value="">
        <span class="error"><?php echo $passwordError?></span>
    </label>
    <br><br>
    <label for="pwd">Jelszó megerősítése:
        <input type="password" name="pwd" value="">
        <span class="error"><?php echo $pwdError?></span>
    </label>
    <br><br>
    <label for="birthday">Születési dátum:
        <input type="date" name="birthday" value="">
        <span class="error"><?php echo $birthdayError?></span>
    </label>
    <br><br>
    <label for="gender">Nem:<br>
        <input type="radio" name="gender" value="ferfi">Férfi<br>
        <input type="radio" name="gender" value="no">Nő<br>
        <input type="radio" name="gender" value="egyeb">Egyéb<br>
        <span class="error"><?php echo $genderError?></span>
    </label>
    <br><br>
    <label for="interest">Érdeklődési területek:<br>
        <input type="checkbox" name="interest" value="Sport">Sport<br>
        <input type="checkbox" name="interest" value="Művészet">Művészet<br>
        <input type="checkbox" name="interest" value="Tudomány">Tudomány<br>
        <input type="checkbox" name="interest" value="Túrázás">Túrázás<br>
    </label>
    <br><br>
    <label for="country">Ország:<br>
        <select name="country">
            <option value="RO">Románia</option>
            <option value="H">Magyarország</option>
            <option value="SR">Szlovákia</option>
            <option value="A">Ausztria</option>
            <option value="UKR">Ukrajna</option>
            <option value="other">Egyéb</option>
        </select>
    </label>
    <br><br>
    <input type="submit" name="submit" value="Küldés"/>
</form>