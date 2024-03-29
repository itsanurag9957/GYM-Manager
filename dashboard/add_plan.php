<?php
    session_start();
    include("../include/test.php");
    include("../include/db.php");

    if(isset($_SESSION["logged"])){
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(pg_query($dbcon,"insert into plan (pid,pname,description,validity,amount,status)values('".$_POST['pid']."' , '".$_POST['name']."', '".$_POST['desc']."', '".$_POST['val']."', '".$_POST['amt']."', '".$_POST['stat']."');")){
          echo"
            <head>
              <script>alert('New Plan Added');</script>
            </head>
          ";
        }
        else{
          echo"
            <head>
              <script>alert('Error in Inserting Value');</script>
            </head>
          ";
        }
      }
      else{
        
      }
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
    .desc{
      height:40px;
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
          <h1>Add New Plan</h1>
        </div>
        <form action="" method="post" class="form-control">
          <table>
            <tr>
              <td>Plan ID:- </td>
              <td><input type="text" name="pid" id="" value="<?php echo randStr(); ?>" class="form-control" readonly></td>
            </tr>
            <tr>
              <td>Name :- </td>
              <td><input type="text" name="name" id=""class="form-control"  required  ></td>
            </tr>
            <tr>
              <td>Description :- </td>
              <td><input type="text" name="desc" id="" class="form-control desc"    required></td>
            </tr>
            <tr>
              <td>Validity(months) :-</td>
              <td><input type="number" name="val" id="" class="form-control"   required ></td>
            </tr>
            <tr>
              <td>Amount(rupees) :- </td>
              <td><input type="number" name="amt" id="" class="form-control"  required></td>
            </tr>
            <tr>
              <td>Status :- </td>
              <td>
                <select name="stat" id="" class="form-control">
                  <option value="">---Please Select---</option>
                  <option value="active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </td>
            </tr>

          </table>
          <div class="buttongroup">
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

            <tbody id="plandetls">
              
            </tbody>
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