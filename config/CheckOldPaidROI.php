<?php
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$str="Select * from onWithdraw where status=0 limit 0,10";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{
    $user=$row['_user'];
     $id=$row['id'];
    $withAmt=$row['withdrawalAmountToken']/1e9;
    $Up="Update onWithdraw set status=1 where id=$id";
    mysqli_query($connection,$Up);
    
    $UpWt="Update tbl_memberreg set old_paidRoi=old_paidRoi+$withAmt where member_name='$user'";
    mysqli_query($connection,$UpWt);
}


?>
