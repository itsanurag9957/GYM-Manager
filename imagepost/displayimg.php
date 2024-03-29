<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div img{
            border-radius:50%;
            width:100px;
            height:100px;
        }
    </style>
</head>
<body>


<?php
    include("../include/db.php");

    if($res=pg_query($dbcon,"select * from admin_img where id=1;")){
        while($row=pg_fetch_assoc($res)){  ?>
           
           <div>
                <img src="uploadimages/<?=$row['image_url']?>"alt="">
            </div>

<?php

        }
    }
?>
    
</body>
</html>


