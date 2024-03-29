<?php
session_start();
include("../include/db.php");
include("../include/test.php");

if (isset($_SESSION["logged"])) {

} else {
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>
"; exit(); } ?>

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
          <h1>Admin Profile</h1>
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
          <form action="" method="post" class="form-control ">
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
                  <td><input type="text" name="" id="" value="<?php echo $row['name'] ?>" class="form-control" readonly></td>
                </tr>
                <tr>
                  <td>Username :- </td>
                  <td><input type="text" name="" id="" value="<?php echo $row['username'] ?>" class="form-control" readonly></td>
                </tr>
                <tr>
                  <td>Email :-</td>
                  <td><input type="text" name="" id="" value="<?php echo $row['email'] ?>" class="form-control" readonly></td>
                </tr>
                <tr>
                  <td>Mobile :- </td>
                  <td><input type="text" name="" id="" value="<?php echo $row['mob'] ?>" class="form-control" readonly></td>
                </tr>
              </tbody>
            </table>
          </form>
            <div class="buttongroup text-center mb-3">
              <form action="add_Admin.php" method="post">
                <input type="submit" class='btn btn-danger' value="Add Admin">
              </form>
              <form action="update_Admin.php" method="post">
                <input type="hidden" name="aid" value='<?php echo $row['id'] ?>'>
                <input type="submit" class='btn btn-primary' value="Update">
              </form>
            </div>
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
