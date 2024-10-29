<?php
$firstName = $lastName = $email = $attend = $abstract = "";
$firstNameError = $lastNameError = $emailError = $attendError = $abstractError = $termsError = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['firstName'])) {
        $firstNameError = "First name is required";
    } else {
        $firstName = htmlspecialchars($_POST["firstName"]);
    }
    if (empty($_POST["lastName"])) {
        $lastNameError = "Last name is required";
    } else {
        $lastName = htmlspecialchars($_POST["lastName"]);
    }
    if (empty($_POST["email"])) {
        $emailError = "Email is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }
    }
    if (empty($_POST["attend"])) {
        $attendError = "At least one event must be selected.";
    } else {
        $attend = $_POST["attend"];
    }
    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] == 0) {
        $fileType = strtolower(pathinfo($_FILES['abstract']['name'], PATHINFO_EXTENSION));
        if ($fileType != "pdf") {
            $abstractError = "Only PDF files are allowed";
        } elseif ($_FILES["abstract"]["size"] > 3 * 1024 * 1024) {
            $abstractError = "File size must be under 3MB.";
        } else {
            $abstract = $_FILES['abstract']['name'];
        }
    } else {
        $abstractError = "Abstract file is required.";
    }
    if (empty($_POST["terms"])) {
        $termsError = "You must accept the terms and conditions.";
    } else {
        $terms = $_POST['terms'];
    }

    if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($attendError) && empty($abstractError) && empty($termsError)) {
        echo "<h3>Submitted Data:</h3>";
        echo "<p><strong>First Name:</strong> $firstName</p>";
        echo "<p><strong>Last Name:</strong> $lastName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Attending events:</strong> $attend</p>";
        echo "<p><strong>Abstract file:</strong> $abstract</p>";
    }
}
?>


<h3>Online conference registration</h3>

<form method="post" action="">
    <label for="fname"> First name:
        <input type="text" name="firstName">
        <span class="error"><?php echo $firstNameError?></span>
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
        <span class="error"><?php echo $lastNameError?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
        <span class="error"><?php echo $emailError?></span>
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
        <span class="error"><?php echo $attendError?></span>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
        <span class="error"><?php echo $abstractError?></span>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <span class="error"><?php echo $termsError?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>
