<?php
session_start();
include("../include/db.php");
include("../include/test.php");

 if($_SESSION['otp']==$_POST['otpadmin']){
    if(pg_query($dbcon,"update admin set email='".$_SESSION['input_email']."' where id='".$_SESSION['admin_id']."';  ")){


        if(isset($_SESSION['profile'])){
            if(pg_query($dbcon,"update admin_img set image_url='".$_SESSION['profile']."' where id='".$_SESSION['admin_id']."';")){
                echo "<head>
                    <script>alert('Successfully updated Profile Pic')</script>
                </head>";
            }
        }

        
        echo "<head>
                <script>alert('Successfully Inserted')</script>
                </head>";
        echo"<meta http-equiv='refresh' content='0; url=update_Admin.php'>";
        unset($_SESSION["original_email"]);
        unset($_SESSION["input_email"]);
    }else{
        echo "<head>
        <script>alert('Database Insertion Failed')</script>
        </head>";
        echo"<meta http-equiv='refresh' content='0; url=update_Admin.php'>";
        unset($_SESSION["original_email"]);
        unset($_SESSION["input_email"]);
    }
    

 }
 else{

    echo"
    <head>
        <script>alert('Otp not same');</script>
    </head>
    ";
    echo"<meta http-equiv='refresh' content='0; url=verify_adminupd_otp.php'>";
 }

?>