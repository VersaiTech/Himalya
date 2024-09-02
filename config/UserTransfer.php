<?php
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$reg_date=date("Y-m-d H:i:s");
$str="SELECT * FROM RegistrationOld WHERE transfer_status=0 order by id limit 0,20";
$res=mysqli_query($connection,$str);
while($row=mysqli_fetch_array($res))
{
    $user=$row['user'];
    $sponcer_name=$referrer=$row['referrer'];
    $block_number=$row['block_number'];
    $transaction_id=$row['transaction_id'];
    $reg_date=date("Y-m-d H:i:s",$row['block_timestamp']);
    
    $sponcer_id=get_refId($referrer);
 
    $UpU="Update RegistrationOld set transfer_status=1 where user='$user'";
    mysqli_query($connection,$UpU) or die(mysqli_error($connection));
  
    $strC="Select * from tbl_memberreg where member_name='$user'";
    $resC=mysqli_query($connection,$strC);
    if(mysqli_num_rows($resC)==0)
    {
       
        $member_user_id=substr(str_shuffle("123456789"),0,7);

        $chk_m=mysqli_query($connection,"Select member_user_id from  tbl_memberreg where member_user_id='$member_user_id'");
        if(mysqli_num_rows($chk_m)>0)   
        {
        	$member_user_id=substr(str_shuffle("123456789"),0,7);
        }
        
        $busd_investment=0;$Aura_investment=0;
        //For First Investment
        $StrSt="Select * from CycleStarted where user='$user' order by id limit 0,1";
        $resSt=mysqli_query($connection,$StrSt) or die($connection);
        while($rowSt=mysqli_fetch_array($resSt))
        {
            $busd_investment=$rowSt['walletUsedBusd']/1e18;
            $Aura_investment=$rowSt['totalToken']/1e9;
            $transaction_id=$rowSt['transaction_id'];
            $id=$rowSt['id'];
            
            $UpStk="Update CycleStarted set isTransfer=1 where id=$id";
            mysqli_query($connection,$UpStk) or die(mysqli_error($connection));
        }
  
        echo "<br>". $qry="Insert Into tbl_memberreg(member_user_id,member_name,wallet_address,sponcer_id,sponcer_name,promoter_id,promoter_name,registration_date,topup_amount,status,hash_code,investment_busd,current_investment,kyc_status)
        values('$member_user_id','$user','$user','$sponcer_id','$sponcer_name','','','$reg_date',$Aura_investment,0,'$transaction_id',$busd_investment,$Aura_investment,1)";
    	mysqli_query($connection,$qry) or die(mysqli_error($connection));

        echo "<hr>";
    }
  
}


function get_refId($member_name)
{
	global $connection;
	$str1="Select member_user_id from tbl_memberreg where member_name='$member_name'";
	$res1=mysqli_query($connection,$str1);
	$row1=mysqli_fetch_array($res1);
	return $row1['member_user_id'];
}

?>
