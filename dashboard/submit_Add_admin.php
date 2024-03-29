<?php

session_start();
include "../include/db.php";
include "../include/test.php";
include "../email.php";

if (isset($_SESSION['logged'])) {
    $_SESSION['addAdmin_name'] = $_POST['name'];
    $_SESSION['addAdmin_username'] = $_POST['username'];
    $_SESSION['addAdmin_email'] = $_POST['email'];
    $_SESSION['addAdmin_mob'] = $_POST['mob'];
    $_SESSION['addAdmin_pass'] = $_POST['pass'];
    $_SESSION['process']='start';
    if ($_SESSION['addAdmin_pass'] == $_POST['repass']) {
        if (isDeviceConnectedToInternet()) {
            echo "<head>
                    <script>alert('Sending Otp on " . $_SESSION['addAdmin_email'] . "')</script>
                    </head>";
            $_SESSION['otp'] = mt_rand(10000000, 99999999);
            sendemail($_SESSION['addAdmin_email'], $_SESSION['otp']);

            if (isset($_FILES['profile'])) {
                $img_name = $_FILES["profile"]["name"];
                if ($img_name === "") {

                } else {
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
            } else {
                echo "false";
            }

            echo "<meta http-equiv='refresh' content='0; url=verify_new_Admin.php'>";
        } else {
            echo "<head>
                <script>alert('No Internet Connection')</script>
                </head>";
        }
    } else {
        echo "<meta http-equiv='refresh' content='0; url=add_Admin.php'>";
    }

}
