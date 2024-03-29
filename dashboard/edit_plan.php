
<?php
  session_start();
  include("../include/db.php");
?>







<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payments</title>
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
        <h1>Latest Payment Details</h1>
      </div>
      <!-- Your Content Goes Here -->

      <div class="table-container">
        <table class="table" border="1">
          <tbody class="table-striped"></tbody>
          <tr>
            <th>Sr no.</th>
            <th>Plan Id</th>
            <th>Plan Name</th>
            <th>Description</th>
            <th>Validity(months)</th>
            <th>Amount Paid</th>
            <th>Status</th>
            <th>Update Plan</th>
          </tr>

          
          <?php 
            if(isset($_SESSION["logged"])){
              $counter=1;
              if($res=pg_query($dbcon,"select * from plan;")){
                while($row=pg_fetch_array($res)){
                // $_SESSION['uid'] = $row[0];
                // $_SESSION['exp_date'] = $row[1];
                // $_SESSION['amount'] = $row[3];
                // $_SESSION['email'] = $row[4];
                // $_SESSION['mob'] = $row[5];

                echo "
                  <form action='update_plan.php' method='post'>
                  <tr>
                  <td>".$counter++.".</td>
                  <td>".$row[0]."</td>
                  <td>".$row[1]."</td>
                  <td>".$row[2]."</td>
                  <td>".$row[3]."</td>
                  <td>".$row[4]." rupees</td>
                  <td>".$row[5]."</td>
                  <td><input type='submit' class='btn btn-primary' value='Update Plan'/>
                      <input type='hidden' name='uid' value='".$row[0]."'>
                  </td>
                  </tr>
                  </form>
                
                  ";
                  
                }
              }
              else{

              }

            }
            else{

            }
          ?>
        </table>
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