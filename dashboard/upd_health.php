<?php
    session_start();
    include("../include/db.php");

    if(isset($_SESSION["logged"])){
        $query="
            update health_stat set bmi='".$_POST['calorie']."', height='".$_POST['height']."', weight='".$_POST['weight']."', fat='".$_POST['fat']."', remarks='".$_POST['remark']."' where uid='".$_SESSION['userid']."';
        ";
        try {
            if($res=pg_query($dbcon, $query)){
                unset($_SESSION['userid']);
                echo"<head>
                    <script>alert('updated');</script>
                </head>";
                echo"<meta http-equiv='refresh' content='0; url=health_stat.php'>";
            }else{
                echo "not update";
            }//code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    else{

    }
?>