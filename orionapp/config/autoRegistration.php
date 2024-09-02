<?php
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');




$reg_date=date("Y-m-d H:i:s");
$str="SELECT * FROM Registration WHERE isreg=0 order by id limit 0,5";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{
    $id=$row['id'];
    $investment_busd=$row['investment']/1e18;
    $investment_token=$row['investmentToken']/1e18;
    $investor=$row['investor'];
    $referral=$row['referral'];
    $transaction_id=$row['transaction_id'];
    $sponcer_id=get_associate_name($referral);
    
    $strC="Select * from tbl_memberreg where member_name='$investor'";
    $resC=mysqli_query($connection,$strC);
    if(mysqli_num_rows($resC)==0)
    {
       
        $member_user_id=substr(str_shuffle("123456789"),0,7);

        $chk_m=mysqli_query($connection,"Select member_user_id from  tbl_memberreg where member_user_id='$member_user_id'");
        if(mysqli_num_rows($chk_m)>0)   
        {
        	$member_user_id=substr(str_shuffle("123456789"),0,7);
        }
  
       echo $qry="Insert Into tbl_memberreg(member_user_id,member_name,wallet_address,sponcer_id,sponcer_name,promoter_id,promoter_name,registration_date,topup_amount,status,hash_code,current_investment,investment_busd)
    values('$member_user_id','$investor','$investor','$sponcer_id','$referral','','','$reg_date',$investment_token,0,'$transaction_id',$investment_token,$investment_busd)";
	$res=mysqli_query($connection,$qry) or die(mysqli_error($connection));

        $Up="Update Registration set isreg=1 where id=$id";
        mysqli_query($connection,$Up);
    }
    
    $Up="Update Registration set isreg=1 where id=$id";
    mysqli_query($connection,$Up);
}


function get_associate_name($member_name)
{
	global $connection;
echo	$str1="Select member_user_id from tbl_memberreg where member_name='$member_name'";
	$res1=mysqli_query($connection,$str1);
	$row1=mysqli_fetch_array($res1);
	return $row1['member_user_id'];
}

?>
