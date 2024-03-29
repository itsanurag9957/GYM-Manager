<?php
    session_start();          
    $_SESSION['userid']=$_POST['uid'];       
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
          <h1>Update Health Details</h1>
        </div>
        
        
        <form action="upd_health.php" method="post" class='form-control'>
          <table>
            
            <tr>
              <td>Height(cm) :- </td>
              <td><input type="number" name="height" id=""class="form-control" step='0.01'  ></td>
            </tr>
            <tr>
              <td>BMI :- </td>
              <td><input type="number" name="calorie" id=""class="form-control" step='0.01'  ></td>
            </tr>
            <tr>
              <td>Weight(kgs) :- </td>
              <td><input type="number" name="weight" id=""class="form-control" step='0.01'  ></td>
            </tr>
            <tr>
              <td>Fat :- </td>
              <td><input type="number" name="fat" id=""class="form-control" step='0.01'  ></td>
            </tr>
            <tr>
              <td>Remarks :- </td>
              <td><input type="text" name="remark" id=""class="form-control" height="50px"  ></td>
            </tr>

          </table>
          <div class="buttongroup">
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

           
        
          </table>
          
        </form>
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