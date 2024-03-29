<?php
    session_start();
    include("../include/db.php");

    if(isset($_SESSION["logged"])){
    $query="
        update address set street='".$_POST['street']."', state='".$_POST['state']."', city='".$_POST['city']."', pin='".$_POST['pin']."' where uid='".$_SESSION['userid']."';
    ";

        if($res=pg_query($dbcon, $query)){
            unset($_SESSION['userid']);
            echo"<head>
                <script>alert('updated');</script>
            </head>";
            echo"<meta http-equiv='refresh' content='0; url=edit_member.php'>";
        }else{
            echo "not update";
        }
    }
    else{

    }
?>