<?php
$firstName = isset($firstName) ? $firstName : '';
$lastName = isset($lastName) ? $lastName : '';
$email = isset($email) ? $email : '';
$attend = isset($attend) ? $attend : '';
$terms = isset($terms) ? $terms : '';

$firstNameError = isset($firstNameError) ? $firstNameError : '';
$lastNameError = isset($lastNameError) ? $lastNameError : '';
$emailError = isset($emailError) ? $emailError : '';
$attendError = isset($attendError) ? $attendError : '';
$abstractError = isset($abstractError) ? $abstractError :'';
$termsError = isset($termsError) ? $termsError : '';
?>

<h3>Online conference registration</h3>

<form method="post" action="process.php" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $firstName ?>">
        <span class="error"><?php echo $firstNameError?></span>
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastName ?>">
        <span class="error"><?php echo $lastNameError?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email ?>">
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
        <input type="file" name="abstract" value="<?php echo $abstract ?>"/>
        <span class="error"><?php echo $abstractError?></span>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="<?php echo $terms ?>">I agree to terms & conditions.<br>
    <span class="error"><?php echo $termsError?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

