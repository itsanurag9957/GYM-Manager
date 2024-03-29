<?php
    session_start();
    include("../email.php");
    include("../include/db.php");
    if(isset($_SESSION['start'])){

    }
    else{
        header('Location: payments.php');
    }
    if(isset($_SESSION["logged"])){
        echo "loggedd";
        echo $_SESSION['email'];
        echo $_SESSION['validity'];
        echo $_SESSION['userid'];

        if(isDeviceConnectedToInternet() == true){
            echo "connected";
            $randNum = mt_rand(100000,999999);
            $_SESSION['otp']=$randNum;
            echo $_SESSION['otp'];
            echo $randNum;
            echo $_SESSION['admin_email'];
            sendemail($_SESSION['admin_email'],$randNum);
            // header("Location: verify_pay_otp.php");
            echo"<meta http-equiv='refresh' content='0; url=verify_pay_otp.php'>";
            exit();


        }else{
            echo "<head><script>alert('Please Connect to the Internet!!');</script></head>";
            echo"<meta http-equiv='refresh' content='0; url=payments.php'>";
        }
        

    }
    else{
        echo "not logged";
    }
?>