<?php
// include "../email.php";

 function randStr(){
    $str=uniqid();
    $randomstr = substr($str,-(5));
    return strtoupper($randomstr);
 }

function getMonths(){
   $mon=array();
   for($m=1;$m<=12;$m++){
      $date=new DateTime("2022-$m-10") ;
      $months= $date->format("F");
      array_unshift($mon,$months);
      $rev=array_reverse($mon);
   }
   return ($rev);
}

function getCurrYear(){
   $year=date("Y");
   return $year;
}


function getCurrMonthNum($monthname){
   $arr=array('January'=>'01', 'February'=>'02','March'=>'03','April'=>'04','May'=>'05','June'=>'06','July'=>'07','August'=>'08','September'=>'09','October'=>'10','November'=>'11','December'=>'12',);
   $monthname=ucwords(strtolower($monthname));
   if(isset($arr[$monthname])){
      return  $arr[$monthname];
   }
   else{
      return  false;
      //returns false if month name passed is not present
   }

}

?>

