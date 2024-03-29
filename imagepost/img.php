<?php
include("../include/db.php");
include("../include/test.php");
    if(isset($_FILES['my-image']) && isset($_POST['submit']) ){

       $img_name = $_FILES["my-image"]["name"];
       $img_size = $_FILES["my-image"]["size"];
       $img_error = $_FILES["my-image"]["error"];
       $img_tmp_name = $_FILES["my-image"]["tmp_name"];

       if($img_error===0){
        if($img_size>12150000){
            echo "<head>
                <script>alert('image too big')</script>
            </head>";
        }
        else{   
            //stores the $img_name file's extension in $img_ex
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);
            $allowed_ext=array("jpeg","jpg","png");
            if(in_array($img_ex_lc,$allowed_ext)){
                $new_img_name = "IMG".randStr().".".$img_ex;

                $img_upload_path = 'uploadimages/'.$new_img_name;

                //Moving Completed now store the new image file url into database image table 
                move_uploaded_file($img_tmp_name,$img_upload_path);
                
                if(pg_query($dbcon , "insert into admin_img (id , image_url,aid) values ('1','$new_img_name',1234);")){
                    echo "<head>
                            <script>alert('Data inserted')</script>
                            </head>";
                            header("Location: displayimg.php");
            
                }else{
                    echo "<head>
                <script>alert('data not inserted')</script>
            </head>";
                }
            }
            else{
                echo "<head>
                <script>alert('file extension not allowed')</script>
            </head>";
            }

        }
       }
       else{
        header("Location: imgmain.php");
       }

    }
    else{
        header("Location: imgmain.php");
    }
?>