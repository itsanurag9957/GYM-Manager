<?php
    session_start();
    include("../include/db.php");
    include("../include/test.php");
    include("../email.php");

    

    
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
          <h1>New Admin Details</h1>
        </div>
        <!-- Your Content Goes Here -->
          
          <form action="submit_Add_admin.php" method="post" class="form-control " enctype="multipart/form-data">
            <table class="mb-4">
              <tbody class="">
                <tr>
                  <td>Name :- </td>
                  <td><input type="text" name="name" id=""  class="form-control" required></td>
                </tr>
                <tr>
                  <td>Username :- </td>
                  <td><input type="text" name="username" id="" class="form-control" required></td>
                </tr>
                <tr>
                  <td>Email :-</td>
                  <td><input type="email" name="email" id=""  class="form-control" required></td>
                </tr>
                <tr>
                  <td>Mobile :- </td>
                  <td><input type="number" name="mob" id="" class="form-control" required></td>
                </tr>
                <tr>
                  <td>Password :- </td>
                  <td><input type="password" name="pass" id="pass" class="form-control" required></td>
                </tr>
                <tr>
                  <td>Re Enter Password :- </td>
                  <td><input type="password" name="repass" id="repass" class="form-control" required></td>
                </tr>
                <tr>
                  <td>Add Photo :- </td>
                  <td><input type="file" name="profile" id="" class="form-control" ></td>
                </tr>
              </tbody>
            </table>
            <div class="buttongroup text-center mb-3">
                <input type="submit" class='btn btn-danger mx-2' value="Add Admin">
                <input type="reset" class='btn btn-primary' value="Reset">
            </div>
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
