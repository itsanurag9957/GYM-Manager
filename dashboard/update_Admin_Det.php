<?php
    session_start();
    include("../include/db.php");
    include("../include/test.php");
    include("../email.php");

    if(isset($_SESSION['logged'])){
       if(isDeviceConnectedToInternet()){
            //to check if a new photo was uploaded
           if(isset($_FILES['profile'])){
               $img_name = $_FILES["profile"]["name"];
               if($img_name===""){
                   
               }
               else{
                $img_name = $_FILES["profile"]["name"];
                $img_size = $_FILES["profile"]["size"];
                $img_error = $_FILES["profile"]["error"];
                $img_tmp_name = $_FILES["profile"]["tmp_name"];
                
                if ($img_error === 0) {
                    if ($img_size > 12150000) {
                        echo "<head>
                                    <script>alert('image too big')</script>
                                </head>";
                    } else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_ext = array("jpeg", "jpg", "png");
                        if (in_array($img_ex_lc, $allowed_ext)) {
                            $new_img_name = "IMG" . randStr() . "." . $img_ex;
                            $_SESSION['profile'] = $new_img_name;
                            $img_upload_path = 'uploadimages/' . $new_img_name;
                            move_uploaded_file($img_tmp_name, $img_upload_path);
                        } else {
                            echo "<head>
                                <script>alert('file extension not allowed')</script>
                            </head>";
                        }

                    }
                } else {

                }
               }
            }else{
                echo "false";
            }



            if($_POST['email']==$_SESSION['original_email']){
                //insert the data into the database here itself 
                if(pg_query($dbcon,"update admin set name='".$_POST['name']."', email='".$_POST['email']."', mob='".$_POST['mob']."', username='".$_POST['username']."' where id='".$_SESSION['admin_id']."';")){

                    if(isset($_SESSION['profile'])){
                        if(pg_query($dbcon,"update admin_img set image_url='".$_SESSION['profile']."' where id='".$_SESSION['admin_id']."';")){
                            echo "<head>
                                <script>alert('Successfully updated Profile Pic')</script>
                            </head>";
                        }
                    }
                    

                    echo "<head>
                        <script>alert('Successfully updated')</script>
                    </head>";
                    echo"<meta http-equiv='refresh' content='0; url=update_Admin.php'>";
                }
                else{
                    echo "<head>
                        <script>alert('Database insertion failed')</script>
                    </head>";
                    echo"<meta http-equiv='refresh' content='0; url=update_Admin.php'>";

                }


            }
            else{
                $_SESSION['input_email']=$_POST['email'];
                echo "not same email";
                $otp=mt_rand(100000,999999);
                $_SESSION['otp']=$otp;
                sendemail($_POST['email'],$otp);
                echo "<head>
                    <script>alert('otp sent on your email')</script>
                </head>";
                echo"<meta http-equiv='refresh' content='0; url=verify_adminupd_otp.php'>";
            }


            
       


        }
       else{
        echo "<head>
                    <script>alert('Please connect to internet')</script>
                </head>";
                echo"<meta http-equiv='refresh' content='0; url=update_Admin.php'>";

       }
    }
    else{
        echo "not logged";
    }

?>