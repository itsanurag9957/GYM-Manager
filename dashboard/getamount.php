<?php
session_start();
require '../include/db.php';
$pid=$_GET['q'];
$query="select * from plan where pid='".$pid."'";
$_SESSION['pid']=$pid;
$res=pg_query($dbcon,$query);
if($res){
	$row=pg_fetch_array($res);
  $_SESSION['amount']=$row[4];
  $_SESSION['validity']=$row[3];
	// echo "<tr><td>".$row['amount']."</td></tr>";
    echo"<tr>
    <td>Amount(rupees) :- </td>
    <td>
      <input type='number' name='amount' class='form-control' value='".$row[4]."' required readonly>
    </td>
  </tr>s
  <tr>
    <td>Validity(months):- </td>
    <td>
      <input type='number' name='validity' class='form-control' value='".$row[3]."' required readonly>
    </td>
  </tr>";    
  echo $_SESSION["validity"];
}

?>


