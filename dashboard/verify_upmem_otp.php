<?php
    session_start();
    if(isset($_SESSION["updation"])){
        echo "set";
    }
    else{
       header("Location: edit_member.php");
    }
    
?>






<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="sidebars.css">
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
    .content-title{
      margin: bottom 60px;;
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
      <!-- Your Content Goes Here -->
      
      
      <div class="table-container">
        <div class="content-title">
          <h1>Email Verification</h1>
        </div>
        <form action="update_mem_done.php" method="post">
          <table>
            <tr>
              <td>Enter OTP sent on :- <?php echo $_SESSION['email'] ?> </td>
              <td><input type="number" name="otpupd" id="" class="form-control"></td>
            </tr>
          </table>
          <div class="buttongroup">
            <input type="submit" value="Submit" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

        <?php
          // echo $_SESSION['id']  ;
          // echo $_SESSION['email'];
          // echo $_SESSION['name'] ;
          // echo $_SESSION['gender'] ;
          // echo $_SESSION['mob']  ;
          // echo $_SESSION['street'] ;
          // echo $_SESSION['city'] ;
          // echo $_SESSION['state'];
          // echo $_SESSION['pin']  ;
          // echo $_SESSION['dob']  ;
          // echo $_SESSION['jdate'];
          // echo $_SESSION['plan'] ;
          // echo $_SESSION['amount'];
          // echo $_SESSION['validity'];
          // echo $_SESSION['rg_otp_verify'];;
        ?>
      </div>









    </div>
  </section>
  <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <script src="sidebars.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    </body>


</html>

