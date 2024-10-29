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
    } else {
        include 'index.php';
    }
}
?>
