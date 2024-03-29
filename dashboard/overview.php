<?php
session_start();
error_reporting(E_ALL & ~E_WARNING);
include("../include/db.php");
include "../include/test.php";
if (isset($_SESSION["logged"])) {
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    // $query="
    //   select u.userid , u.name , p.amount , p.pdate from users u JOIN pay_hist p ON p.userid=u.userid;
    // ";
    $monthNUM = getCurrMonthNum($_POST["months"]);
    $actualquery="
      select u.userid , u.name , p.amount , p.pdate from users u JOIN pay_hist p ON p.userid=u.userid where EXTRACT(MONTH FROM TO_DATE(pdate , 'YYYY-MM-DD'))='".$monthNUM."' and EXTRACT(YEAR FROM TO_DATE(pdate , 'YYYY-MM-DD'))='".$_POST['years']."' order by p.pdate;
    ";
    if($res=pg_query($dbcon, $actualquery)){

    }
    else{
      echo"<head>
        <script>alert('Select both year and months');</script>
      </head>
      ";
    }

    
  }
  else{
    $actualquery="
      select u.userid , u.name , p.amount , p.pdate from users u JOIN pay_hist p ON p.userid=u.userid order by p.pdate;
    ";
    if($res=pg_query($dbcon, $actualquery)){

    }
    else{
      echo"<head>
        <script>alert('Select both year and months');</script>
      </head>
      ";
    }
  }

} else {
    echo "<meta http-equiv='refresh' content='0; url=../index.php'> ";
    exit();
}
?>












<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Overview</title>
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
    table td , th {
      text-align:center;
    }
    th{
      margin:5px 0px;
    }
    tbody{
      margin-top:5px;
    }
    .upper-row{
      height:70px;
      font-size:15px;
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
      <div class="content-title">
        <h1>Overview</h1>
      </div>
      <!-- Your Content Goes Here -->

    <div class="table-container">

      <form action="" method="post" class="form-control">
        <table class='table'>
          <tbody class='table-striped'>
          <tr class='upper-row'>
            <td>Years :-  </td>
            <td>
              <select name="years" id="" class="form-control">
                <option value=''>---Please Select---</option>
                <?php

if (isset($_SESSION["logged"])) {
    for ($year = getCurrYear(); $year >= 2000; $year--) {
        echo "
                      <option value='" . $year . "'>" . $year . "</option>
                      ";
    }
} else {
    echo "array problem";
}
?>
              </select>
            </td>
            <td>Months :- </td>
            <td>
              <select name="months" id="" class="form-select" >
                <option value="">---Please Select---</option>
                <?php
if (isset($_SESSION["logged"])) {
    $months = array();
    $months = getMonths();
    for ($i = 0; $i < 12; $i++) {
        echo "
                      <option value='" . $months[$i] . "'>" . $months[$i] . "</option>
                      ";
    }
} else {
    echo "array problem";
}
?>
              </select>
            </td>
            <td>
              <input type="submit" value="Search" class="btn btn-primary">
            </td>
            <td></td>
          </tr>


          <tr>
            <th>Sr no.</th>
            <th>Name</th>
            <th>User ID</th>
            <th>Amount Paid</th>
            <th>Date of Payment</th>
          </tr>

          <?php
          try {
            $count=1;
            $rPM = 0;
            while($row=pg_fetch_array($res)) {
                echo "
                <tr>
                <th>".$count.".</th>
                <th>".$row['name']."</th>
                <th>".$row['userid']."</th>
                <th>".$row['amount']."</th>
                <th>".$row['pdate']."</th>
                </tr>
                ";
                $count++;
                $rPM=$rPM+intval($row["amount"]);
            }//code...
          } catch (Throwable $th) {
            //throw $th;
          }
          ?>


          </tbody>
        </table>
      </form>
      <div class="revenue card mt-3 p-3">
          <h2>Total revenue for the month <?php 
          if(isset($_POST['months'])){
            echo $_POST['months']." :- ".$rPM." &#8377;" ; 
          }
          ?></h2>
      </div>
      <div class="revenue card mt-3 p-3">
          <h2>Total revenue for the year
             <?php 
              if(isset($_POST['years'])){
                if($res=pg_query($dbcon,"select * from pay_hist WHERE EXTRACT(YEAR FROM TO_DATE(pdate, 'YYYY-MM-DD'))='".$_POST['years']."';")) {
                 $rPY=0;
                 while($row=pg_fetch_assoc($res)) {
                   $rPY=$rPY+intval($row['amount']);
                 } 
                 echo $_POST['years']." :- ".$rPY. " &#8377";
                }else{
                 echo" :- 0 &#8377;";
                }
              }
             ?>
          </h2>
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