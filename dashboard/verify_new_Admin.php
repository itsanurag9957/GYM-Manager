<?php

  session_start();
  include("../include/db.php");
  include("../include/test.php");
  include("../email.php");

  if(isset($_SESSION['logged'])){
    if(!isset($_SESSION['process'])){
      header("Location: profile.php");
    }
  }else{

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
          <h1>Verify OTP </h1>
        </div>
        <!-- Your Content Goes Here -->
          
          <form action="insert_Add_admin.php" method="post" class="form-control ">
            <table class="mb-4">
              <tbody class="">
                <tr>
                  <td><?php echo "Enter OTP sent on ".$_SESSION['admin_email'] ?> :- </td>
                  <td><input type="number" name="otp" id=""  class="form-control" ></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Send OTP" class='btn btn-danger mt-5'>
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
