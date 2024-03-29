<?php
    session_start();
    if(isset($_SESSION["pchange"])){
      // header("Location: index.php");
      unset($_SESSION["pchange"]);
      session_destroy();
      echo "<meta http-equiv='refresh' content='0; url=index.php'>"; 
      exit();
    }
    else{
      include("./include/db.php");
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $pass=$_POST['password'];
          $repass=$_POST['repassword'];
  
          if($pass==$repass){
              $hashpass=password_hash($pass, PASSWORD_DEFAULT);
              

              $email=$_SESSION["email"];
              $res=pg_query($dbcon,"update admin set hashed_password='$hashpass' where email='$email'");
              if($res) {
                session_start();
                  $_SESSION['pchange']="changed";
                  echo "<head><script>alert(' Passwords Update Successfully!! ')</script></head>";
                  echo "<meta http-equiv='refresh' content='0; url=index.php'>"; 
              }else{
              
              }
          }
          else{
              echo "<head><script>alert(' Passwords Do Not Match ')</script></head>";
              echo "<meta http-equiv='refresh' content='0; url=insertadmindet.php'>"; 
          }
      }
    }
    

?>















<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.84.0" />
  <title>Signin Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/" />

  <!-- Bootstrap core CSS -->
  <link href="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet" />
</head>

<body class="text-center">
  <main class="form-signin">
    <form action="" method="post">
      <img class="mb-4" src="./bootstrap-icons-1.11.3/person-circle.svg" alt="" width="72" height="57" />
      <h1 class="h3 mb-3 fw-normal">Please Enter New Password</h1>

      <div class="form-floating">
        <input type="password" class="form-control" id="floatingInput" name="password"/>
        <label for="floatingInput">New Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="repassword" />
        <label for="floatingPassword">Re-Enter Password</label>
      </div>

  
      <button class="w-100 btn btn-lg btn-primary" type="submit">
        Sign in
      </button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>
</body>

</html>