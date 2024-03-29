<?php
session_start();
include "../include/db.php";
include "../include/test.php";
include "../email.php";
if (isset($_SESSION["logged"])) {
    if ($_SESSION["email"] != $_POST['email']) {
        echo "not same";
        $_SESSION['updation'] = 'start';
        if (isDeviceConnectedToInternet()) {
            echo "connect";
            $rd = mt_rand(100000, 999999);
            $_SESSION['otp'] = $rd;
            echo "<head>
                <script>alert('Sending mail on new email ...');</script>
                </head>";
            sendemail($_POST['email'], $rd);
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['mob'] = $_POST['mob'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['dob'] = $_POST['dob'];
            $_SESSION['jdate'] = $_POST['jdate'];
            if (isset($_FILES['profile'])) {
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
            } else {
                echo "not set";
            }
            echo "<meta http-equiv='refresh' content='0; url=verify_upmem_otp.php'>";

        } else {
            echo "<head>
                <script>alert('Internet not connected');</script>
                </head>";
            echo "<meta http-equiv='refresh' content='0; url=edit_member.php'>";

        }
    } else {
        echo "same";
        if (isset($_FILES['profile'])) {
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
        } else {
            echo "not set";
        }
        $query = "
            update users set name='" . $_POST['name'] . "', gender='" . $_POST['gender'] . "', mobile='" . $_POST['mob'] . "', email='" . $_POST['email'] . "', dob='" . $_POST['dob'] . "', jdate='" . $_POST['jdate'] . "' where userid='" . $_SESSION['userid'] . "';
            ";

        if ($res = pg_query($dbcon, $query)) {
            if (pg_query($dbcon, "update users_img set image_url='" . $_SESSION['profile'] . "' where uid='" . $_SESSION['userid'] . "';")) {
                unset($_SESSION['userid']);
                unset($_SESSION['updation']);
                echo "<head>
                            <script>alert('updated');</script>
                        </head>";
                echo "<meta http-equiv='refresh' content='0; url=edit_member.php'>";
            } else {
                echo "file upload problem";
            }
        } else {
            echo "not update";
        }
    }

} else {

}
