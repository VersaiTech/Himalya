<?php
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$date=date("Y-m-d H:i:s");
$str="Select * from Reinvestment where checked=0 order by  id";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{
    $id=$row['id'];
    $investor=$row['investor'];
    $investmentBusd=$row['investment']/1e18;
    $transaction_id=$row['transaction_id'];
    $investmentToken=$row['investmentToken']/1e18;
    
    $strM="Select member_user_id from tbl_memberreg where member_name='$investor'";
    $resM=mysqli_query($connection,$strM);
    $rowM=mysqli_fetch_array($resM);
    $member_user_id=$rowM['member_user_id'];
    
    $chkStr="Select * from tbl_reinvest where hash_code='$transaction_id'";
    $reschk=mysqli_query($connection,$chkStr);
    if(mysqli_num_rows($reschk)==0)
    {
       echo "<br>". $Ins="Insert Into tbl_reinvest(member_user_id,member_name,invest_package,hash_code,tr_date,checked,payment_status,status,invest_type,investment_busd)values('$member_user_id','$investor',$investmentToken,'$transaction_id','$date',1,1,1,'RE-STAKING',$investmentBusd)";
        mysqli_query($connection,$Ins) or die(mysqli_error($connection));
    }
    $Up="Update Reinvestment set checked=1,isexist=1 where id=$id";
    mysqli_query($connection,$Up);
}
?>
