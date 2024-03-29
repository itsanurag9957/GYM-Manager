<?php
    session_start();
    include("../include/db.php");
    if(isset($_SESSION["logged"])){
      // header("Location: ./dashboard/index.php");
    }else{
        echo "<meta http-equiv='refresh' content='0; url=../index.php'> ";
        exit();
    }
?>








<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="sidebars.css">
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
    
    .mysection .content-title{
      margin-top: 50px;
      margin-bottom: 30px;
      margin-left: 20px;
    }
    .inner-contain{
      display: flex;
      flex-direction: row;
    }

    .my-card{
        width: 100%;
        height: 200px;
        margin:10px;
        border-radius:10px;
        border:1px solid #0a58ca;
        position: relative;
      } 
    .text{
      position:absolute;
      transform: translate(-50%, -50%);
      left: 50%;
      top: 50%;
      }
      a{
        color:black;
      }
    
    
    

  </style>
</head>

<body>

  <section class="mysection">
    <main>



      <div class="b-example-divider"></div>

      <?php
        include"./bootstrapsidebar.php";
      ?>

      <div class="b-example-divider"></div>


    </main>
    <div class="content-container">
      <div class="content-title">
        <h1>Dashboard</h1>
      </div>
      <!-- Your Content Goes Here -->


      <div class="container dashboard">
        <div class="inner-contain">
          <div class="my-card form-control" style="background-color:#f56954;">
            <a href="./overview.php">
              <div class="text">
                <h2 class='text-center my-text'>Total Revenue</h2>
                <h1 class='text-center my-text'>
                  <?php 
                    if($res=pg_query($dbcon,"select amount from pay_hist")){
                      $revenue=0;
                      while($row=pg_fetch_assoc($res)){
                        $revenue=$revenue+intval($row['amount']);
                      }
                      echo $revenue."&#8377;";
                    }  
                  ?>
                </h1>
              </div>
            </a>
          </div>
          <div class="my-card form-control" style="background-color:#00a65a;;">
            <a href="./view_members.php">
              <div class="text">
                <h2 class='text-center my-text'>Total Members</h2>
                <h1 class='text-center my-text'>
                  <?php 
                    if($res=pg_query($dbcon,"select count(*) from users;")){
                      $row=pg_fetch_assoc($res);
                      echo $row['count'];
                    }  
                  ?>
                </h1>
              </div>
            </a>
          </div>
        </div>
        <div class="inner-contain">
          <div class="my-card form-control" style="background-color:#00c0ef;">
            <a href="./edit_plan.php">
              <div class="text">
                <h2 class='text-center my-text'>Available Plans</h2>
                <h1 class='text-center my-text'>
                <?php 
                    if($res=pg_query($dbcon,"select count(*) from plan;")){
                      $row=pg_fetch_assoc($res);
                      echo $row['count'];
                    }  
                  ?>
                </h1>
              </div>
            </a>
          </div>
          <div class="my-card form-control" style="background-color:#0073b7;">
            <a href="./overview.php">
              <div class="text">
                <h2 class='text-center my-text'>New Members</h2>
                <h1 class='text-center my-text'>
                <?php 
                    $today=date('Y-m-d');  
                    $lastmon = date('Y-m-d',strtotime($today .'-'.'1 months'));
                    if($res=pg_query($dbcon,"select count(*) from users where jdate::date between TO_DATE('$lastmon','YYYY-MM-DD') AND TO_DATE('$today','YYYY-MM-DD');")){
                      $row=pg_fetch_assoc($res);
                    }
                    echo $row['count'];
                  ?>
                </h1>
              </div>
            </a>
          </div>
        </div>
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