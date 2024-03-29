<?php
    session_start();
    include("../include/db.php");
    if (isset($_SESSION["logged"]) && isset($_SESSION['updation']))
    {
        if($_SESSION['otp']==$_POST['otpupd']){
            echo "same";
            $query="
            update users set name='".$_SESSION['name']."', gender='".$_SESSION['gender']."', mobile='".$_SESSION['mob']."', email='".$_SESSION['email']."', dob='".$_SESSION['dob']."', jdate='".$_SESSION['jdate']."' where userid='".$_SESSION['userid']."';
            ";

            if($res=pg_query($dbcon, $query)){
                if($res=pg_query($dbcon,"update users_img set image_url='".$_SESSION['profile']."' where uid='".$_SESSION['userid']."';")){
                    unset($_SESSION['userid']);
                    unset($_SESSION['updation']);
                    echo"<head>
                            <script>alert('updated users table with');</script>
                        </head>";
                    echo"<meta http-equiv='refresh' content='0; url=edit_member.php'>";
                }
                else{
                    echo "user image not updated";
                }
            }else{
                echo "not update";
            }
        }
        else{
            echo"<head>
                <script>alert('Otp did not Match');</script>
                </head>";
            echo"<meta http-equiv='refresh' content='0; url=verify_upmem_otp.php'>";
        }
    }
    else{
        header("Location: edit_member.php");
        exit();
    }
?>