<?php
    session_start();
    include("../include/db.php");
    $_SESSION['admin_email']="anuragsutar33@gmail.com";
    if(isset($_SESSION["logged"])){
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
  <title>Index</title>
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
        <h1>Payment History :-<?php echo "For ".$_POST['uid'] ?> </h1>
      </div>
      <!-- Your Content Goes Here -->
      <div class="table-container">
        <table class="table" border="1">
          <tbody class="table-striped"></tbody>
          <tr>
            <th>Sr no.</th>
            <th>Payment Id</th>
            <th>Name</th>
            <th>User ID</th>
            <th>Plan Name</th>
            <th>Amount Paid</th>
            <th>Payment Date</th>
          </tr>
            <?php 
                $counter=1;
                if($res=pg_query($dbcon,"select * from pay_hist where userid='".$_POST['uid']."';")){
                    while($row=pg_fetch_assoc($res)){
                    echo "<tr>
                        <td>".$counter.".</td>
                        <td>".$row['payid']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['userid']."</td>
                        <td>".$row['pid']."</td>
                        <td>".$row['amount']."</td>
                        <td>".$row['pdate']."</td>
                    </tr>";
                    $counter++;
                    }
                }
                else{
                    echo "unsuccess";
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