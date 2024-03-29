<?php
    session_start();
    include("email.php");
    include("./include/db.php");

    $email=$_POST['email'];
    $username=$_POST['username'];
    if(isset($_SESSION["pchange"])){
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        session_destroy();
    }

    // $email="anuragsutar33@gmail.com";
    // $username="anurag";

    $query="select * from admin where username='$username' and email='$email';";
    try {
        $res=pg_query($dbcon,$query);
        if($res){
            $row=pg_fetch_assoc($res);
            if(pg_num_rows($res)== 1){
                    $random_number = mt_rand(100000,999999);
                    $otp = $random_number;
                    $_SESSION["otp"]=$otp;
                    $_SESSION["email"]=$row['email'];
                    if(isDeviceConnectedToInternet()){
                      echo"connect";
                      sendemail($email,$otp);
                      echo "
                      <!doctype html>
                      <html lang='en'>
                        <head>
                          <meta charset='utf-8'>
                          <meta name='viewport' content='width=device-width, initial-scale=1'>
                          <meta name='description' content=''>
                          <meta name='author' content='Mark Otto, Jacob Thornton, and Bootstrap contributors'>
                          <meta name='generator' content='Hugo 0.84.0'>
                          <title>Signin Template · Bootstrap v5.0</title>
                      
                          <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/sign-in/'>
                      
                          
                      
                          <!-- Bootstrap core CSS -->
                      <link href='./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css' rel='stylesheet'>
                      
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
                          <link href='./signin.css' rel='stylesheet'>
                        </head>
                        <body class='text-center'>
                          
                      <main class='form-signin'>
                        <form action='otpverify.php' method='post'>
                          <img class='mb-4' src='./bootstrap-icons-1.11.3/person-circle.svg' alt='' width='72' height='57'>
                          <h1 class='h3 mb-3 fw-normal'>Verify OTP</h1>
                      
                          <div class='form-floating'>
                            <input type='number' class='form-control' id='floatingInput' placeholder='name@example.com' name='otp'>
                            <label for='floatingInput'>Enter OTP sent on mail</label>
                          </div>
                          <div style='width:3px; height:15px;'></div>
                          <button class='w-100 btn btn-lg btn-primary my-10' type='submit'>Validate OTP</button>
                         
                          <p class='mt-5 mb-3 text-muted'>&copy; 2017–2021</p>
                        </form>
                      </main>
                      
                      
                          
                        </body>
                      </html>
                      ";                   
                    }
                    else{
                      echo "<head><script>alert('not connected')</script></head>";
                      echo "<meta http-equiv='refresh' content='0; url=forgot_pass.php'>";
                      // exit();
                    }
            }else{
                echo "<head><script>alert('Entries not present ')</script></head>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            }
        }
        else{

        }
        
    } catch (\Throwable $th) {
        //throw $th;
    }
    
?>