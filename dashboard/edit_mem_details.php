<?php
    session_start();
    include ("../include/db.php");
    if(isset($_SESSION["logged"])){
      if($res=pg_query($dbcon,"select * from users where userid='".$_POST['uid']."';")){
        $row=pg_fetch_assoc($res);
        $_SESSION['userid']=$row['userid'];
        $_SESSION['email']=$row['email'];
        
        }
        else{
            echo"not succeess";
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
          <h1>Update Personal Details</h1>
        </div>
        <form action="upd_personal.php" method="post" class="form-control" enctype='multipart/form-data'>
          <table>
            <tr>
              <td>User ID:- </td>
              <td><input type="text" name="uid" id="" value="<?php echo $row['userid']; ?>" class="form-control" readonly></td>
            </tr>
            <tr>
              <td>Name :- </td>
              <td><input type="text" name="name" id=""class="form-control" value="<?php echo $row['name']; ?>" required  ></td>
            </tr>
            <tr>
              <td>Gender :- </td>
              <td><select name="gender" id="" class="form-control"  required>
                <option value="<?php echo $row['gender']; ?>" class="form-control"><?php echo $row['gender']; ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select></td>
            </tr>
            <tr>
              <td>Add Photo:- </td>
              <td><input type="file" name="profile" id="" class="form-control"></td>
            </tr>
            <tr>
              <td>Mobile :- </td>
              <td><input type="number" name="mob" id="" class="form-control" value="<?php echo $row['mobile']; ?>"   required></td>
            </tr>
            <tr>
              <td>Email :-</td>
              <td><input type="email" name="email" id="" class="form-control" value="<?php echo $row['email']; ?>"  required ></td>
            </tr>
            <tr>
              <td>Date of Birth :- </td>
              <td><input type="date" name="dob" id="" class="form-control" value="<?php echo $row['dob']; ?>"   required></td>
            </tr>
            <tr>
              <td>Date of Joining :- </td>
              <td><input type="date" name="jdate" id="" class="form-control" value="<?php echo $row['jdate']; ?>"  required></td>
            </tr>

          </table>
          <div class="buttongroup">
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

        <div class="content-title">
          <h1>Update Adress Details</h1>
        </div>
        <form action="upd_address.php" method="post" class="form-control">
          <table>
            <?php 
                $res=pg_query($dbcon,"select * from address where uid='".$_POST['uid']."'");
                $row=pg_fetch_assoc($res);
            ?>
            <tr>
              <td>Street :- </td>
              <td><input type="text" name="street" id=""class="form-control" value="<?php echo $row['street']; ?>"   required></td>
            </tr>
            <tr>
              <td>City :- </td>
              <td><input type="text" name="city" id=""class="form-control" value="<?php echo $row['city']; ?>"  required ></td>
            </tr>
            <tr>
              <td>State :- </td>
              <td><input type="text" name="state" id=""class="form-control" value="<?php echo $row['state']; ?>"  required ></td>
            </tr>
            <tr>
              <td>Pin Code :- </td>
              <td><input type="text" name="pin" id=""class="form-control" value="<?php echo $row['pin']; ?>"  required ></td>
            </tr>
            </table>
            <div class="buttongroup">
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

        <div class="content-title">
          <h1>Update Health Details</h1>
        </div>
        <form action="upd_health.php" method="post" class='form-control'>
          <table>
            <?php 
                $res=pg_query($dbcon,"select * from health_stat where uid='".$_POST['uid']."'");
                $row=pg_fetch_assoc($res);
            ?>
            <tr>
              <td>Height :- </td>
              <td><input type="number" name="height" id=""class="form-control"value="<?php echo $row['height']; ?>"  ></td>
            </tr>
            <tr>
              <td>Calorie :- </td>
              <td><input type="number" name="calorie" id=""class="form-control" value="<?php echo $row['bmi']; ?>"  ></td>
            </tr>
            <tr>
              <td>Weight :- </td>
              <td><input type="number" name="weight" id=""class="form-control" value="<?php echo $row['weight']; ?>"  ></td>
            </tr>
            <tr>
              <td>Fat :- </td>
              <td><input type="number" name="fat" id=""class="form-control" value="<?php echo $row['fat']; ?>"  ></td>
            </tr>
            <tr>
              <td>Remarks :- </td>
              <td><input type="text" name="remark" id=""class="form-control" height="50px" value="<?php echo $row['remarks']; ?>"  ></td>
            </tr>

          </table>
          <div class="buttongroup">
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>

            <?php 
                $res=pg_query($dbcon,"select pid from enroll where userid='".$_POST['uid']."'");
                $row=pg_fetch_assoc($res);
                $pid= $row["pid"];
                $res=pg_query($dbcon,"select pname from plan where pid='".$pid."'");
                $row=pg_fetch_assoc($res);
            ?>
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