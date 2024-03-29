<?php
    session_start();
    include("../include/db.php");
    if(isset($_SESSION["logged"])){
        $query="
            update users set name='".$_POST['name']."', gender='".$_POST['gender']."', mobile='".$_POST['mob']."', email='".$_POST['email']."', dob='".$_POST['dob']."', jdate='".$_POST['jdate']."' where userid='".$_POST['uid']."';
        ";
        if($res=pg_query($dbcon,$query)){
            echo "updated";
        }
        else{
            echo "update failed";
        }
    }
    else{

    }
?>