<?php
    session_start();
    include("../include/db.php");
     if(isset($_SESSION["logged"])){
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(pg_query($dbcon,"update plan set pid='".$_POST['pid']."' , pname='".$_POST['name']."', description='".$_POST['desc']."' , validity='".$_POST['val']."', amount='".$_POST['amt']."', status='".$_POST['stat']."' where pid='".$_POST['pid']."' ;")){
          echo"
            <head>
              <script>alert('Plan Updated');</script>
            </head>
          ";
          echo"<meta http-equiv='refresh' content='0; url=edit_plan.php'>";
          //   header("Location: edit_plan.php");
          //   exit();
        }
        else{
            echo"
            <head>
            <script>alert('Error in Updating Value');</script>
            </head>
            ";
            echo"<meta http-equiv='refresh' content='0; url=edit_plan.php'>";
            // header("Location: edit_plan.php");
            // exit();
        }
      }
      else{
        
      }
    }else{
        echo "<meta http-equiv='refresh' content='0; url=../index.php'> ";
        exit();
    }

?>