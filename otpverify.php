<?php
    session_start(); // Start the session

    include("./include/db.php");

    echo $_SESSION["email"];
    if (isset($_POST['otp']) && isset($_SESSION['otp']) && $_POST['otp'] == $_SESSION['otp']) {
        $_SESSION['otp_verified'] = true;
        // Redirect to the desired location after OTP verification
        header("Location: insertadmindet.php");
        exit; // Make sure to exit after redirection
    } else {
        echo "<head><script>alert('OTP Do Not Match')</script></head>";
        echo "<meta http-equiv='refresh' content='0; url=forgot_pass.php'>";
        exit; // Make sure to exit after redirection
    }
?>
