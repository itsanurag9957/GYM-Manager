<?php
    session_start();
    include("../include/db.php");
    include("../email.php");
    include("../include/test.php");

    if(isset($_SESSION['logged'])){
        $email = $_POST['email'];
        $query="select * from users where email='$email';";

        
        if($res=pg_query($dbcon,$query)){
            if(pg_num_rows($res)== 0){
                $random_num = mt_rand(100000,999999);
                $_SESSION['otp']=$random_num;
                if(isDeviceConnectedToInternet()){
                    echo "connectd";
                    sendemail($email,$random_num);
                    $_SESSION['id'] = $_POST['uid']; 
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['gender'] = $_POST['gender'];
                    $_SESSION['mob'] = $_POST['mob'];
                    $_SESSION['street'] = $_POST['street'];
                    $_SESSION['city'] = $_POST['city'];
                    $_SESSION['state'] = $_POST['state'];
                    $_SESSION['pin'] = $_POST['pin'];
                    $_SESSION['dob'] = $_POST['dob'];
                    $_SESSION['jdate'] = $_POST['jdate'];
                    $_SESSION['plan'] = $_POST['plan'];
                    $_SESSION['amount'] = $_POST['amount'];
                    $_SESSION['validity']= $_POST['validity'];
                    $_SESSION['rg_otp_verify'] = true;
                    if(isset($_FILES['profile'])){
                        $img_name = $_FILES["profile"]["name"];
                        $img_size = $_FILES["profile"]["size"];
                        $img_error = $_FILES["profile"]["error"];
                        $img_tmp_name = $_FILES["profile"]["tmp_name"];
                        if($img_error===0){
                            if($img_size>12150000){
                                echo "<head>
                                        <script>alert('image too big')</script>
                                    </head>";
                            }
                            else{   
                                $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ex_lc=strtolower($img_ex);
                                $allowed_ext=array("jpeg","jpg","png");
                                if(in_array($img_ex_lc,$allowed_ext)){
                                    $new_img_name = "IMG".randStr().".".$img_ex;
                                    $_SESSION['profile']=$new_img_name;
                                    $img_upload_path = 'uploadimages/'.$new_img_name; 
                                    move_uploaded_file($img_tmp_name,$img_upload_path);
                                }
                                else{
                                    echo "<head>
                                    <script>alert('file extension not allowed')</script>
                                </head>";
                                }
                    
                            }
                           }
                           else{
                            
                           }
                    }
                    else{
                        echo "not set";
                    }
                    echo "<head><script>alert('OTP Sent successfully to $email !!!')</script></head>";
                    echo"<meta http-equiv='refresh' content='0; url=verifyotp.php'>";
                }
                else{
                    echo "not connected";
                    echo "<head><script>alert('Please Connect to Intenet !!!')</script></head>";
                    echo"<meta http-equiv='refresh' content='0; url=new_register.php'>";
                }
            }
            else{
                echo "<head><script>alert('Email Already Registered!!!')</script></head>";
                echo"<meta http-equiv='refresh' content='0; url=new_register.php'>";
            }
        }
        else{
            echo "<head><script>alert('Database Connection Error!!!')</script></head>";
            echo"<meta http-equiv='refresh' content='0; url=new_register.php'>";
        }

        

    }   
    else{
        echo "<head><script>alert('OTP sending failed!!!')</script></head>";
        echo"<meta http-equiv='refresh' content='0; url=submitmem_entry.php'>";
    }
?>