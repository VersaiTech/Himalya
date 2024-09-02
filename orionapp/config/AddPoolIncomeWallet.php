<?php

$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

date_default_timezone_set("Asia/Calcutta");

$date=date("Y-m-d");
$cnt=1;
$str="SELECT * from tbl_poolIncome where paid_status=0 limit 0,50";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{
    $member_user_id=$row['member_user_id'];
    $income_amt=$row['income_amt'];
    $income_id=$row['income_id'];
    echo "<br>". $up="Update tbl_memberreg set pool_wallet=pool_wallet+$income_amt where member_user_id='$member_user_id'";
    mysqli_query($connection,$up) or die();
    echo "<br>";

    $Update="Update tbl_poolIncome set paid_status=1 where income_id=$income_id";
    mysqli_query($connection,$Update);
    
}



?>
