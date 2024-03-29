<?php
    session_start();
    include ("../include/db.php");
    echo $_SESSION['jdate'];
    if(isset($_SESSION['logged']) && isset($_SESSION['rg_otp_verify'])){
        if($_SESSION['otp']==$_POST['otp_reg']){
            $uid =$_SESSION['id'] ;
            $email =$_SESSION['email'] ;
            $name =$_SESSION['name'] ;
            $gender =$_SESSION['gender'] ;
            $mob =$_SESSION['mob'] ;
            $street =$_SESSION['street'] ;
            $city =$_SESSION['city'] ;
            $state =$_SESSION['state'] ;
            $pin =$_SESSION['pin'] ;
            $dob =$_SESSION['dob'] ;
            $jdate =$_SESSION['jdate'] ;
            $plan =$_SESSION['plan'] ;
            $amount =$_SESSION['amount'] ;
            $validity =$_SESSION['validity'];
            $pid=$_SESSION['pid'];
            $pro=$_SESSION['profile'];
            $payid= uniqid("payid");
            
            date_default_timezone_set("Asia/Calcutta"); 
            $expiredate = date("Y-m-d", strtotime($jdate . ' + ' . $validity . ' months' ));
            
             $query1= "insert into users values ( '$uid', '$name', '$gender', '$mob', '$email', '$dob', '$jdate'   );";
             $query2= "insert into enroll(userid,pid,paid_date,expiry_date,renew) values(  '$uid', '$pid', '$jdate', '$expiredate', 'no');";
             $query3= "insert into health_stat (uid) values($uid);";
             $query4= "insert into address(street,state,city,pin,uid)values( '$street', '$state', '$city', '$pin', '$uid'   )";
             $query5= "insert into pay_hist(payid,name,userid,pid,amount,pdate)values('$payid' , '$name' , '$uid', '$pid', '$amount', '".date("Y-m-d")."');";
             $query6= "insert into users_img (uid,image_url) values('$uid','$pro'); ";
             if($res=pg_query($dbcon,$query1)){
                echo "<head><script>alert('Data inserted in users table ')</script></head>";
                if($res=pg_query($dbcon,$query2)){
                    echo "<head><script>alert('Data was inserted in enroll table ')</script></head>";
                    if($res=pg_query($dbcon,$query3)){
                        echo "<head><script>alert('Data inserted in health_stats table ')</script></head>";
                        if($res=pg_query($dbcon,$query4)){
                            echo "<head><script>alert('Data inserted in pay_hist table ')</script></head>";
                            if($res=pg_query($dbcon,$query5)){
                                echo "<head><script>alert('Data inserted in address table ')</script></head>";
                                if($res=pg_query($dbcon,$query6)){
                                    echo "<head><script>alert('Data inserted in profile photo table ')</script></head>";
                                    echo "<meta http-equiv='refresh' content='0; url=new_register.php'>";
                                    unset($_SESSION['rg_otp_verify']);
                                }
                                else{

                                }
                            }
                            else{

                            }
                        }
                        else{
                            echo "<head><script>alert('Data not inserted in address table ')</script></head>";
                        }
                    }
                    else{
                        echo "<head><script>alert('Data was not inserted in health_stats table ')</script></head>";

                    }
                }
                else{
                    echo "<head><script>alert('Data was not inserted in enrolls table ')</script></head>";

                }
             }
             else{
                echo "<head><script>alert('Data was not inserted in users table ')</script></head>";
                echo "<meta http-equiv='refresh' content='0; url=submit_otp.php'>";
             }

        }
        else{
            echo "<head><script>alert('OTP did not match')</script></head>";
            echo "<meta http-equiv='refresh' content='0; url=new_register.php'>";
        }
    }
    else{
        echo "<head><script>alert('System Error')</script></head>";
        echo "<meta http-equiv='refresh' content='0; url=new_register.php'>";
    }

?>