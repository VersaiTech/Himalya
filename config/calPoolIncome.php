<?php
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');


$date=date("Y-m-d");
 $sys_date=date('Y-m-d');
echo $RStr="Select * from tbl_reinvest where pool_status=0 and status=1 and payment_status=1 order by record_no limit 0,5";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $member_user_id=$rowR['member_user_id'];
    $invest_packag=$rowR['invest_package'];
    $hash_code=$rowR['hash_code'];
    $invest_type=$rowR['invest_type'];
    $record_no=$rowR['record_no'];
    $tr_date=$rowR['tr_date'];
    $investment_busd=$rowR['investment_busd'];
    
     $upL="Update tbl_reinvest set pool_status=1 where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
    
    cal_pool_incentive($invest_packag,$hash_code,$member_user_id,$tr_date);
} 


function cal_pool_incentive($topup_amount,$hash_code,$member_user_id,$tr_date)
{
    $sys_date=date('Y-m-d',strtotime($tr_date));
    global $connection;
    $parent_id=get_parrent_member_id();
    $member_id=$member_user_id;
    $total_level=27;//get_total_level();;
    for($cnt=1;$cnt<=$total_level;$cnt++)
    {
          $income_per=1;
       echo $mstr="Select sponcer_id from tbl_memberreg where member_user_id='$member_id' ";
        $mresult=mysqli_query($connection, $mstr);
		while($mrow=mysqli_fetch_array($mresult))
		{
            $sponcer_id=$mrow['sponcer_id'];
           	$str="Select * from tbl_memberreg where member_user_id='$sponcer_id'";
        	$res=mysqli_query($connection, $str);
        	while($row=mysqli_fetch_array($res))
        	{
            	$sponcer_name=$row['member_name'];
            	$status=$row['status'];
            	$team_business=$row['team_business'];
            	$dir=chkDirect($sponcer_id);
                //For Direct Income
                if($team_business>=300000 && $cnt>10  && $cnt>11 && $dir>=1)
                {
                    $income_amt=$topup_amount*$income_per/100;
                   	echo	$str_in="Insert Into tbl_poolIncome(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'POOL BONUS','POOL BONUS','$member_user_id',$income_amt,'$hash_code','$topup_amount','',$income_per)"; echo "<br>";
            			mysqli_query($connection,$str_in) or die(mysqli_error($connection));
            			
                 }
		    }
 			if($member_id==$parent_id)
			{
			    $cnt=$total_level+20;
			}
			$member_id=$sponcer_id;
		}
   
    }
    
 
}

function chkDirect($member_user_id)
{
    global $connection;
    $fdate=date("Y-m-01",strtotime(' - 1 Month')); 
    $adate=date("Y-m-d",strtotime($fdate.' + 1 Month')); 
    $ldate=date("Y-m-d",strtotime($adate.' - 1 Day')); 
    
    $strK="Select * from tbl_memberreg where registration_date between '$fdate' and '$ldate' and sponcer_id='$member_user_id' and investment_busd>=100";
    $resK=mysqli_query($connection,$strK);
    return mysqli_num_rows($resK);
    
}

function get_parrent_member_id()
{
	global $connection;
	$str="Select member_user_id from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['member_user_id'];
}



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


function get_total_level()
{
	global $connection;
     $str="Select member_user_id from  tbl_memberreg ";
      $res=mysqli_query($connection,$str);
  return $cnt=mysqli_num_rows($res);

}

?>