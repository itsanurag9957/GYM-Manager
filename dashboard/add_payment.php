<?php
    session_start();
    include("../include/db.php");
    if(isset($_SESSION["logged"])){
        $uid=$_POST['uid'];
        $query="select u.userid ,p.amount, u.name ,e.expiry_date , p.validity, p.pname , p.amount,p.pid , u.email , u.mobile from users u JOIN enroll e ON u.userid=e.userid JOIN plan p ON e.pid=p.pid where u.userid='".$uid."'";
        if($res=pg_query($dbcon , $query)){
            $row=pg_fetch_assoc($res);
            $_SESSION['userid']= $row['userid'];
            $_SESSION['validity']=$row['validity'];
            $_SESSION['email']=$row['email'];
            $_SESSION['amount']=$row['amount'];
            $_SESSION['name']=$row['name'];
            $_SESSION['start']= "yes";
        }
        else{
            echo "not success";
            echo $uid;
        }
    }
    else{
        echo "not logged";
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
          <h1>Confirm Payment</h1>
        </div>
        <form action="./confirm_payment.php" method="post" class="form-control">
          <table>
            <tr>
              <td>User ID:- </td>
              <td><input type="text" name="uid" id="" value="<?php echo $row["userid"] ?>" class="form-control" readonly></td>
            </tr>
            <tr>
              <td>Name :- </td>
              <td><input type="text" name="name" id=""class="form-control" value="<?php echo $row["name"] ?>" required readonly></td>
            </tr>
            <tr>
              <td>Email :- </td>
              <td><input type="email" name="ename" id=""class="form-control" value="<?php echo $row["email"] ?>" required readonly></td>
            </tr>
            <tr>
              <td>Expiry Date :- </td>
              <td><input type="date" name="jdate" id="" class="form-control" value="<?php echo $row["expiry_date"] ?>" required readonly></td>
            </tr>
            <tr>
              <td>Select plan :- </td>
              <td><select name="plan" id="planSelect" class="form-control"required onchange="myplandetail(this.value)">
                <option value="">---Please Select---</option>
                <?php
                
                  if(isset($_SESSION["logged"])){
                    $query="select pid, pname from plan where status='active';";
                    $res = pg_query($dbcon,$query);
                    if($res){
                      while( $row = pg_fetch_array($res)){
                        echo "<option value='".$row['pid']."'>".$row['pname']."</option>";      
                      }
                    }
                    else{
                      echo"<option value=''>Not Available</option>";
                    }
                  }
                  else{
                    echo"<option value=''>Database connection error</option>";
                  }
                ?>
              </select></td>
            </tr>
            <tbody id="plandetls">
              
            </tbody>
          </table>
          <div class="buttongroup">
            <input type="submit" value="Confirm" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-primary">
          </div>
        </form>
      </div>









    </div>
  </section>
  <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <script src="sidebars.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script>
        	function myplandetail(str){

        		if(str==""){
        			document.getElementById("plandetls").innerHTML = "";
        			return;
        		}else{
        			if (window.XMLHttpRequest) {
           		 // code for IE7+, Firefox, Chrome, Opera, Safari
           			 xmlhttp = new XMLHttpRequest();
       				 }
       			 	xmlhttp.onreadystatechange = function() {
            		if (this.readyState == 4 && this.status == 200) {
               		 document.getElementById("plandetls").innerHTML=this.responseText;
                
            			}
        			};
        			
       				 xmlhttp.open("GET","getamount.php?q="+str,true);
       				 xmlhttp.send();	
        		}
        		
        	}
        </script>
        
</body>


</html>