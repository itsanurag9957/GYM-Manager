<?php
session_start();
include("../include/db.php");
include("../include/test.php");
include("../email.php");

// echo $_POST['aid'];
$_SESSION['cp']='start';


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
          <h1>Update Admin Profile</h1>
        </div>
        <!-- Your Content Goes Here -->
          <?php 
            if(isset($_SESSION["logged"])) {
              if($res=pg_query($dbcon,"select * from admin where id='".$_SESSION['admin_id']."';")){
                $row=pg_fetch_assoc($res);
              }
              else{

              }
            }
          ?>
          <form action="update_Admin_Det.php" method="post" class="form-control " enctype="multipart/form-data">
            <table class="mb-4">
              <tbody class="">
                <tr>
                    <div class="profile-pic text-center mt-4">
                    <?php 
                      if(isset($_SESSION["logged"])) {
                        if($res2=pg_query($dbcon,"select image_url from admin_img where id='".$row['id']."';")){
                          $row2=pg_fetch_assoc($res2);

                        }
                        else{
                          
                        }
                      }
                    ?>
                      <img src="./uploadimages/<?=$row2['image_url']?>" alt="" srcset="" height="100px" width="100px">
                    </div>
                </tr>
                <tr>
                  <td>Name :- </td>
                  <td><input type="text" name="name" id="" value="<?php echo $row['name'] ?>" class="form-control" ></td>
                </tr>
                <tr>
                  <td>Username :- </td>
                  <td><input type="text" name="username" id="" value="<?php echo $row['username'] ?>" class="form-control" ></td>
                </tr>
                <tr>
                  <td>Email :-</td>
                  <td><input type="text" name="email" id="" value="<?php 
                  $_SESSION['hashed_password']=$row['hashed_password'];
                  $_SESSION['original_email']=$row['email'];
                  $_SESSION['admin_id']=$row['id'];
                  
                  
                  echo $row['email'] 
                  
                  ?>" class="form-control" ></td>
                </tr>
                <tr>
                  <td>Mobile :- </td>
                  <td><input type="text" name="mob" id="" value="<?php echo $row['mob'] ?>" class="form-control" ></td>
                </tr>
                <tr>
                  <td>Update Photo :-  </td>
                  <td><input type="file" name="profile" id="" class="form-control" ></td>
                </tr>
              </tbody>
            </table>
            <div class="buttongroup text-center mb-3">
              <input type="submit" value="Submit" class="btn btn-primary mx-2">
              <input type="reset" value="Reset" class="btn btn-primary">
            </div>
          </form>
          <form action="changeAdminPass.php" method="get">
            <input type="hidden" name="pass" value="<?php echo $_SESSION['admin_id'] ?>">
            <input type="submit" value="Change Password" class="btn btn-outline-primary">
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
