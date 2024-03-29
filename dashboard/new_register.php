<?php
    session_start();
    include ("../include/db.php");
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
          <h1>New Member Registration</h1>
        </div>
        <form action="./submitmem_entry.php" method="post" class="form-control" enctype="multipart/form-data">
          <table>
            <tr>
              <td>User ID:- </td>
              <td><input type="text" name="uid" id="" value="<?php echo time(); ?>" class="form-control" readonly></td>
            </tr>
            <tr>
              <td>Name :- </td>
              <td><input type="text" name="name" id=""class="form-control" required></td>
            </tr>
            <tr>
              <td>Gender :- </td>
              <td><select name="gender" id="" class="form-control"required>
                <option value="null" class="form-control">---Please Select---</option>
                <option value="Male" class="form-control">Male</option>
                <option value="Female" class="form-control">Female</option>
              </select></td>
            </tr>
            <tr>
              <td>Mobile :- </td>
              <td><input type="number" name="mob" id="" class="form-control"required></td>
            </tr>
            <tr>
              <td>Email :-</td>
              <td><input type="email" name="email" id="" class="form-control"required></td>
            </tr>
            <tr>
              <td>Add Photo:- </td>
              <td><input type="file" name="profile" id="" class="form-control"></td>
            </tr>
            <tr>
              <td>Street :- </td>
              <td><input type="text" name="street" id=""class="form-control" required></td>
            </tr>
            <tr>
              <td>City :- </td>
              <td><input type="text" name="city" id=""class="form-control" required></td>
            </tr>
            <tr>
              <td>State :- </td>
              <td><input type="text" name="state" id=""class="form-control" required></td>
            </tr>
            <tr>
              <td>Pin Code :- </td>
              <td><input type="text" name="pin" id=""class="form-control" required></td>
            </tr>

            <tr>
              <td>Date of Birth :- </td>
              <td><input type="date" name="dob" id="" class="form-control"required></td>
            </tr>
            <tr>
              <td>Date of Joining :- </td>
              <td><input type="date" name="jdate" id="" class="form-control"required></td>
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
            <input type="submit" value="Submit" class="btn btn-primary">
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