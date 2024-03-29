<?php
    session_start();
    include("../include/db.php");

    echo $_POST['uid'];

    $query="
    
    delete from address where uid=(select userid from users where userid='".$_POST['uid']."');
    delete from enroll  where userid=(select userid from users where userid='".$_POST['uid']."');
    delete from health_stat  where uid=(select userid from users where userid='".$_POST['uid']."');
    delete from users_img where uid=(select userid from users where userid='".$_POST['uid']."');
    delete from pay_hist where userid=(select userid from users where userid='".$_POST['uid']."');
    delete from users  where userid='".$_POST['uid']."';
    ";
    if($res=pg_query($dbcon,$query)){
        echo "deleted success";
        echo "<head><script>alert('deleted success');</script></head>";
        echo "<meta http-equiv='refresh' content='0; url=edit_member.php'>";
    }else{
        echo "deleted failed";
        // echo "<head><script>alert('deleted falied');</script></head>";
        // echo "<meta http-equiv='refresh' content='0; url=edit_member.php'>";
    }
?>