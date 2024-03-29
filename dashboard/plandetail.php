<?php
    include("../include/db.php");
    if(isset($_SESSION["logged"])){
        $p = $_GET["p"];
        $query = "select * from plan where pid='$p'";
        try {
            $res=pg_query($dbcon, $query);
            if($res){
                $row=pg_fetch_array($res);
                echo "<tr>
                <td>Amount :-</td>
                <td><input type='text' name='amount' id='amountInput' class='form-control' value='".$row['amount']."'  readonly></td>
              </tr>";           
            }
            //code...
        } catch (\Throwable $th) {
            echo"<head><script>console.log($th)</script></head>";            
        }
    }
?>



