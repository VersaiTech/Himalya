<?php

date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

  $reward_name='BAKU';
   $invest_month= "Oct-2022";
echo $RStr="SELECT * FROM `tbl_reinvest` WHERE tr_date BETWEEN '2022-09-26' and '2022-11-30' and tourReward=0 and invest_type='REGISTRATION' order by record_no limit 0,20";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $member_user_id=$rowR['member_user_id'];
    $member_name=$rowR['member_name'];
    $record_no=$rowR['record_no'];
    $investment_busd=$rowR['investment_busd'];
   //date("M-Y",strtotime($rowR['tr_date']));
  
    
    $upL="Update tbl_reinvest set tourReward=1 where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
    
    chkRec($member_user_id,$member_name,$invest_month,$reward_name);
    
    //For Self Investment
   echo "<br> 1 : ". $UpSelf="Update tbl_tourRewardBusiness set self_investment=self_investment+$investment_busd where member_user_id='$member_user_id' and b_month='$invest_month' and reward_name='$reward_name'";
    mysqli_query($connection,$UpSelf) or die(mysqli_error($connection));
    
    //For Sponsor 
    $strSP="Select sponcer_id from tbl_memberreg where member_user_id='$member_user_id'";
    $sponcer_id=ret_val($strSP);
    
    $strSPN="Select member_name from tbl_memberreg where member_user_id='$sponcer_id'";
    $sponcer_name=ret_val($strSPN);
    chkRec($sponcer_id,$sponcer_name,$invest_month,$reward_name);
    
   echo "<br> Self : ". $UpDir="Update tbl_tourRewardBusiness set direct_business=direct_business+$investment_busd where member_user_id='$sponcer_id' and b_month='$invest_month' and reward_name='$reward_name'";
    mysqli_query($connection,$UpDir) or die(mysqli_error($connection));
    
    //For Second LEvel
 
    $strSP="Select sponcer_id from tbl_memberreg where member_user_id='$sponcer_id'";
    $sponcer_id=ret_val($strSP);
    
    $strSPN="Select member_name from tbl_memberreg where member_user_id='$sponcer_id'";
    $sponcer_name=ret_val($strSPN);
    chkRec($sponcer_id,$sponcer_name,$invest_month,$reward_name);
    
    echo "<br> Second Level : ". $UpDir="Update tbl_tourRewardBusiness set second_level_business=second_level_business+$investment_busd where member_user_id='$sponcer_id' and b_month='$invest_month' and reward_name='$reward_name'";
    mysqli_query($connection,$UpDir) or die(mysqli_error($connection));
    
    echo "<hr>";
    
} 

function chkRec($member_user_id,$member_name,$invest_month,$reward_name)
{
    global $connection;
   echo $strC="Select member_user_id from tbl_tourRewardBusiness where member_user_id='$member_user_id' and b_month='$invest_month' and reward_name='$reward_name'";
    $resC=mysqli_query($connection,$strC);
    if(mysqli_num_rows($resC)==0)
    {
        $Inst="Insert Into tbl_tourRewardBusiness(member_user_id,member_name,b_month,direct_business,second_level_business,self_investment,reward_name)values('$member_user_id','$member_name','$invest_month',0,0,0,'$reward_name')";
        mysqli_query($connection,$Inst) or die(mysqli_error($connection));
    }
}


//Update Bonanza Name
$achived_date=date("Y-m-d");
$Update1="Update tbl_tourRewardBusiness set achived_status=1,achived_date='$achived_date' where self_investment>=5000 and reward_name='$reward_name' and b_month='$invest_month'";
mysqli_query($connection,$Update1) or die(mysqli_error($connection));

$Update2="Update tbl_tourRewardBusiness set achived_status=1,achived_date='$achived_date' where direct_business>=5000 and reward_name='$reward_name' and b_month='$invest_month'";
mysqli_query($connection,$Update2) or die(mysqli_error($connection));


function ret_val($str)
{
	global $connection;
	$result=mysqli_query($connection,$str);
	while($row=mysqli_fetch_array($result))
	{
		$RetRec=$row[0];
	}
	return $RetRec;
}


?>