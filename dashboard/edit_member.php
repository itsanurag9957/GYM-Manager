<?php
    session_start();
    include("../include/db.php");
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
  <title>View Members</title>
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
    .buttongroup{
      display:flex;
      flex-direction:column;
      gap:4px;
    }
    td {
      vertical-align: middle;
    }
    th{

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
        <h1>Edit Member Details</h1>
      </div>
      <!-- Your Content Goes Here -->


      <div class="table-container">
        <table class="table" border="1">
          <tbody class="table-striped"></tbody>
          <tr>
            <th>Sr no.</th>
            <th>Name</th>
            <th>Member Id</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Joining Date</th>
            <th>Expiry Date</th>
            <th>Action</th>
          </tr>

          
          <?php 
            if(isset($_SESSION["logged"])){
              $counter=1;
              $query="select u.userid , u.name, u.gender, u.mobile, u.email, u.dob, u.jdate, e.expiry_date from users u JOIN enroll e ON u.userid=e.userid order by userid; ";
              if($res=pg_query($dbcon,$query)){
                while($row=pg_fetch_assoc($res)){
                // $_SESSION['uid'] = $row[0];
                // $_SESSION['exp_date'] = $row[1];
                // $_SESSION['amount'] = $row[3];
                // $_SESSION['email'] = $row[4];
                // $_SESSION['mob'] = $row[5];

                echo "
                <tr>
                <td>".$counter++.".</td>
                <td>".$row['name']."</td>
                <td>".$row['userid']."</td>
                <td>".$row['email']."</td>
                <td>".$row['mobile']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['jdate']."</td>
                <td>".$row['expiry_date']."</td>
                <td>
                <div class='buttongroup'>
                
                  <form action='payment_details.php' method='post'>
                    <input type='submit' class='btn btn-primary' value='Payment History'/>
                    <input type='hidden' name='uid' value='".$row['userid']."'>
                  </form>

                  <form action='edit_mem_details.php' method='post'>
                    <input type='submit' class='btn btn-warning' value='Edit Details        '/>
                    <input type='hidden' name='uid' value='".$row['userid']."'>
                  </form>

                  <form action='delete_mem_details.php' method='post'>
                    <input type='submit' class='btn btn-danger' value='Delete Details    '/>
                    <input type='hidden' name='uid' value='".$row['userid']."'>
                  </form>

                </div>
                </td>
                </tr>
                
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