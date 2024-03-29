<?php
session_start();
include("../include/db.php");
if(isset($_SESSION["logged"])){
    if(isset($_SESSION['start'])){
        if($_SESSION['otp']==$_POST['otpreg']){
            if($res=pg_query($dbcon , "select expiry_date from enroll where userid='".$_SESSION['userid']."'")){
                $row=pg_fetch_array($res);
                $expirydate = $row[0];
                $newexpdate = date("Y-m-d", strtotime($expirydate . ' + ' . $_SESSION['validity'] . ' months' ));
                if($res=pg_query($dbcon ,"update enroll set expiry_date='".$newexpdate."' where userid='".$_SESSION['userid']."'")){
                    // header("Location: payments.php");
                    
                    $query="select pid from enroll where userid='".$_SESSION['userid']."'";
                    $res=pg_query ($dbcon,$query);
                    $row=pg_fetch_array($res);
                    $pid= $row[0];

                    $payid="payid".uniqid();
                    $pdate=date("Y-m-d");
                    $query= "insert into pay_hist(payid,name,userid,pid,amount,pdate)values('".$payid."', '".$_SESSION['name']."', '".$_SESSION['userid']."', '".$pid."', '".$_SESSION['amount']."', '".$pdate."'); ";
                    if(pg_query($dbcon,$query)){
                        if(pg_query($dbcon,"insert into permanent_pay_hist(payid,name,userid,pid,amount,pdate)values('".$payid."', '".$_SESSION['name']."', '".$_SESSION['userid']."', '".$pid."', '".$_SESSION['amount']."', '".$pdate."'); ")){
                            echo"<head><script>alert('Payment Done');</script></head>";
                            echo"<meta http-equiv='refresh' content='0; url='payments.php >";
                            unset($_SESSION['start']);
                            unset($_SESSION['validity']);
                            unset($_SESSION['email']);
                            unset($_SESSION['amount']);
                            unset($_SESSION['name']);
                            exit();
                        }
                        else{

                        }
                    }
                    else{

                    }




                }
                else{
                    echo "";
                    header("Location: payment.php");
                    exit();
                }
            }
            else{
                echo "<head>
                    <script>alert('database error');</script>
                    </head>";
                header("Location: payments.php");
            }
        }
        else{
            echo "<head><script>alert('otp not matched')</script></head>";
            echo"<meta http-equiv='refresh' content='0; url=verify_pay_otp.php' >";
        }
    }
    else{
        echo "<meta http-equiv='refresh' content='0; url=payments.php'>";
        exit();
    }
}
else{
    echo "not logged in";
    
}

// if($res=pg_query($dbcon,$query)){
//     echo"<head><script>alert('Payment Done');</script></head>";
//     echo"<meta http-equiv='refresh' content='0; url='payments.php >";
//     unset($_SESSION['start']);
//     exit();
// }
// else{
//     echo"<head><script>alert('Data not inserted in payment history');</script></head>";
//     // echo"<meta http-equiv='refresh' content='0; url='payments.php >";
// }
?>