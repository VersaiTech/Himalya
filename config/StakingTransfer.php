<?php
//error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$cnt=1;
$str="SELECT * FROM CycleStarted  order by id ";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{

    $transaction_id=$row['transaction_id'];
    $reg_date=date("Y-m-d H:i:s",$row['block_timestamp']);
    
    echo "<br>". $cnt ." :: " .$Update="Update tbl_reinvest set tr_date='$reg_date' where hash_code='$transaction_id'";
  
    mysqli_query($connection,$Update) or die(mysqli_error($connection));
    
    echo "<hr>";
    $cnt=$cnt+1;
}

// $reg_date=date("Y-m-d H:i:s");
// $str="SELECT * FROM CycleStarted WHERE isTransfer=0 order by id limit 0,100";
// $res=mysqli_query($connection,$str);
// while($row=mysqli_fetch_array($res))
// {
//      $id=$row['id'];
//     $user=$row['user'];
//     $block_number=$row['block_number'];
//     $transaction_id=$row['transaction_id'];
//     $reg_date=date("Y-m-d H:i:s",$row['block_timestamp']);
//     $busd_investment=$row['walletUsedBusd']/1e18;
//     $Aura_investment=$row['totalToken']/1e9;
    
//     $member_user_id=get_userId($user);
 
//     echo "<br>". $UpStk="Update CycleStarted set isTransfer=1 where id=$id";
//     mysqli_query($connection,$UpStk) or die(mysqli_error($connection));
  
//     echo "<br>".$Ins="Insert Into tbl_reinvest(member_user_id,member_name,invest_package,hash_code,tr_date,invest_type,investment_busd)values('$member_user_id','$user','$Aura_investment','$transaction_id','$reg_date','RE-STAKING',$busd_investment)";
//     mysqli_query($connection,$Ins) or die(mysqli_error($connection));
    
//     echo "<hr>";
// }


function get_userId($member_name)
{
	global $connection;
	$str1="Select member_user_id from tbl_memberreg where member_name='$member_name'";
	$res1=mysqli_query($connection,$str1);
	$row1=mysqli_fetch_array($res1);
	return $row1['member_user_id'];
}

?>
