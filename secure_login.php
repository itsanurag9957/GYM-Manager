<?php

include ("./include/db.php");

$username=$_POST['username'];
$password=$_POST['password'];
$hashp=password_hash($password,PASSWORD_DEFAULT);
$query="select * from admin where username='$username';";


$res=pg_query($dbcon,$query);

if(pg_num_rows($res)==1){
    $row=pg_fetch_array($res);
    if(password_verify($password,$row["hashed_password"])==1){
        echo"password match";
        session_start();
        $_SESSION["logged"]="true";
        $_SESSION["username"]= $username;
        $_SESSION["password"]= $password;
        $_SESSION["admin_id"]= $row['id'];
        $_SESSION["admin_email"]= $row['email'];
        header("Location: dashboard/index.php");
    }else{
        echo"<head><script>alert('Password do not match');</script></head>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'> ";
    }
}
else{
    echo"<head><script>alert('Entries not present');</script></head>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'> ";
}


?>

