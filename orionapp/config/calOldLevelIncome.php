<?php
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$strUp="Update tbl_reinvest set status=1,payment_status=1 where status=0";
mysqli_query($connection,$strUp);

$date=date("Y-m-d");
 $sys_date=date('Y-m-d');
echo $RStr="Select * from tbl_reinvest where level=2 and status=1 and payment_status=1 and record_no<3815 order by record_no limit 0,10";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $member_user_id=$rowR['member_user_id'];
    $invest_packag=$rowR['invest_package'];
    $hash_code=$rowR['hash_code'];
    $invest_type=$rowR['invest_type'];
    $record_no=$rowR['record_no'];
    $investment_busd=$rowR['investment_busd'];
    
    
    $upL="Update tbl_reinvest set level=1 where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
  
    cal_level_incentive($invest_packag,$hash_code,$member_user_id);
} 



function cal_level_incentive($topup_amount,$hash_code,$member_user_id)
{
     $sys_date=date('Y-m-d');
    global $connection;$level_paid=0;
    $parent_id=get_parrent_member_id();
    $member_id=$member_user_id;
    $total_level=10;;
    for($cnt=1;$cnt<=$total_level;$cnt++)
    {
       $strLV="Select level_values from tbl_level_amt where level_name=$cnt";
       $income_per=ret_val($strLV);
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
            	$qulifid_direct=$row['qulifid_direct'];
            	$direct_business=$row['direct_business'];
                if($cnt==1)
                {
                    //For Direct Income
                    $income_amt=$topup_amount*$income_per/100;
                   	echo	$str_in="Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'REFERRAL BONUS','REFERRAL BONUS','$member_user_id',$income_amt,'$hash_code','$topup_amount','',$income_per)"; echo "<br>";
            			mysqli_query($connection,$str_in) or die(mysqli_error($connection));
            			
            			 $up="Update tbl_memberreg set oldWithdraw=oldWithdraw+$income_amt,total_earning=total_earning+$income_amt where member_user_id='$sponcer_id'";
                        mysqli_query($connection,$up) or die(mysqli_error($connection));
            			
                            }
                else if($qulifid_direct>=3 && $direct_business>=1000)
                {
      
                     $income_amt=$topup_amount*$income_per/100;
                   	echo	$str_in="Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'REFERRAL BONUS','REFERRAL BONUS','$member_user_id',$income_amt,'$hash_code','$topup_amount','',$income_per)"; echo "<br>";
            			mysqli_query($connection,$str_in) or die(mysqli_error($connection));
                    
                    	 $up="Update tbl_memberreg set oldWithdraw=oldWithdraw+$income_amt,total_earning=total_earning+$income_amt where member_user_id='$sponcer_id'";
                        mysqli_query($connection,$up) or die(mysqli_error($connection));
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



function get_parrent_member_id()
{
	global $connection;
	$str="Select member_user_id from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['member_user_id'];
}

function get_member_id($member_user_id)
{
   global $connection;
	$ssql=$mstr="Select member_id from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	while($srow=mysqli_fetch_array($sresult))
	{
		$mem_id=$srow['member_id'];
	}
	return $mem_id;
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

function get_total_level_percentage($level)
{
    if($level==1)
    {
        $level_values=5;
    }
    else if($level==2)
    {
        $level_values=2;
    }
    else if($level==3)
    {
        $level_values=1;
    }
    else if($level==4)
    {
        $level_values=1;
    }
    else if($level==5)
    {
        $level_values=1;
    }
    return $level_values;
}

function get_total_level()
{
	global $connection;
     $str="Select * from  tbl_level_amt ";
      $res=mysqli_query($connection,$str);
  return $cnt=mysqli_num_rows($res);

}

?>