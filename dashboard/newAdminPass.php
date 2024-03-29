<?php
    session_start();
    include("../include/db.php");
    include("../include/test.php");
    include("../email.php");

    
    if($_SESSION['logged']){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_SESSION['cp'])){
                if($_POST['pass']==$_POST['repass']){
                    $hashed_pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
                    if(pg_query($dbcon , "update admin set hashed_password='".$hashed_pass."' where id='".$_SESSION['admin_id']."';")){
                        echo"<head>
                        <script>alert('Password Updated');</script>
                        </head>";
                        unset($_SESSION["cp"]);
                        echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
                    }
                    else{
                        echo"<head>
                        <script>alert('Database Error');</script>
                        </head>";
                        echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
                    }
                }
                else{
                    echo"<head>
                        <script>alert('Passwords dont match');</script>
                    </head>";
                }
            }
            else{
                echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
            }
        }
        else{

        }
    }
    else{

    }

?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="sidebars.css" />
    <link rel="stylesheet" href="tablestyle.css">
    <style>
        body {
        overflow: visible;
        /* height: 1000vh; */
        /* display: flex; */
        }

            .content-container {
            overflow: visible;
            /* background-color: aquamarine; */
            width: 100vw;
            }

            main {
            position: fixed;
            overflow: visible;
            }

            .mysection {
            display: flex;
            }

            .mysection .content-container {
            margin-left: 330px;
            margin-right: 25px;
            }

            .mysection .content-title {
            margin-top: 50px;
            margin-bottom: 30px;
            margin-left: 20px;
            }
            img{
            border-radius:50%;
            }
            .buttongroup{
            display:flex;
            flex-direction:row;
            }
            .buttongroup form{
            width:116px;
            }
  </style>
  </head>

  <body>
    <section class="mysection">
      <main>
        <div class="b-example-divider"></div>

        <?php
         include ("./bootstrapsidebar.php");
      ?>

        <div class="b-example-divider"></div>
      </main>
      <div class="content-container">
        <div class="table-container">
        <div class="content-title">
          <h1>Update Password</h1>
        </div>
        <!-- Your Content Goes Here -->
          
          <form action="" method="post" class="form-control ">
            <table class="mb-4">
              <tbody class="">
                <tr>
                  <td>Enter New Password :- </td>
                  <td><input type="password" name="pass" id=""  class="form-control" required ></td>
                </tr>
                <tr>
                  <td>Re Enter Password :- </td>
                  <td><input type="password" name="repass" id=""  class="form-control" required ></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Update Password" class='btn btn-danger mt-5'>
                    </td>
                    <td></td>

                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </section>
    <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebars.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
