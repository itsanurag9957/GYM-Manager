<?php

  session_start();
  include("../include/db.php");
  include("../include/test.php");
  include("../email.php");

  if($_SESSION['logged']){
    if($_SESSION['otp']==$_POST['otp']){
        $hashed_pass=password_hash($_SESSION['addAdmin_pass'],PASSWORD_DEFAULT);
        $_SESSION['addAdmin_pass'];
        if(pg_query($dbcon,"insert into admin (username,email,hashed_password,mob,name)values('".$_SESSION['addAdmin_username']."','".$_SESSION['addAdmin_email']."','".$hashed_pass."','".$_SESSION['addAdmin_mob']."','".$_SESSION['addAdmin_name']."')")){
            if(isset($_SESSION['profile'])){
                if($res=pg_query($dbcon,"select id from admin where email='".$_SESSION['addAdmin_email']."'")){
                    $row=pg_fetch_assoc($res);
                    $id=$row['id'];
                    if(pg_query($dbcon,"insert into admin_img (id,image_url)values('$id','".$_SESSION['profile']."');")){
                        echo"<head>
                        <script>alert('Photo Uploaded ')</script>
                        </head>";
                    }
                    else{
                    }
                }
                else{

                }
            }
            echo"<head>
                <script>alert('Photo Uploaded ')</script>
                </head>";
            echo"<meta http-equiv='refresh' content='0; url=profile.php'>";

            unset($_SESSION['addAdmin_name']) ;
            unset($_SESSION['addAdmin_username']);
            unset($_SESSION['addAdmin_email']);
            unset($_SESSION['addAdmin_mob']);
            unset($_SESSION['addAdmin_pass']);







        }
        else{
            echo"<head>
            <script>alert('Error inserting data!! Please try again ')</script>
            </head>";
            echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
        }
    }
    else{
        echo"<head>
            <script>alert('OTP does not match')</script>
        </head>";
        echo"<meta http-equiv='refresh' content='0; url=verify_new_Admin.php'>";
    }
  }

?>
