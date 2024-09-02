<?php
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$strUp="Update tbl_reinvest set status=1,payment_status=1 where status=0";
mysqli_query($connection,$strUp);

$date=date("Y-m-d");
 $sys_date=date('Y-m-d');
echo $RStr="Select * from tbl_reinvest where level=0 and status=1 and payment_status=1 order by record_no limit 0,10";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $member_user_id=$rowR['member_user_id'];
    $invest_packagAura=$rowR['invest_package'];
    $hash_code=$rowR['hash_code'];
    $invest_type=$rowR['invest_type'];
    $record_no=$rowR['record_no'];
    $investment_busd=$rowR['investment_busd'];
    $first_date=date('Y-m-d', strtotime("+8 Month"));
    $second_date=date('Y-m-d', strtotime("+16 Month"));
    $third_date=date('Y-m-d', strtotime("+24 Month"));
    
    $upL="Update tbl_reinvest set level=1,current_stake_token=$invest_packagAura,first_date='$first_date',second_date='$second_date',third_date='$third_date' where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
    
    $strD="Select investment_busd from tbl_memberreg where member_user_id='$member_user_id'";
    $current_invest_busd=ret_val($strD);
    $roi_rate=getROIRate($current_invest_busd+$investment_busd);
    if($invest_type!="REGISTRATION")
    {
        $UpB="Update tbl_memberreg set topup_amount=topup_amount+$invest_packagAura,current_investment=current_investment+$invest_packagAura,roi_rate=$roi_rate,investment_busd=investment_busd+$investment_busd where member_user_id='$member_user_id'";
        mysqli_query($connection,$UpB) or die(mysqli_error($connection));
        
 
    }
    $strSD="Select sponcer_id from tbl_memberreg where member_user_id='$member_user_id'";
    $sponcer_id=ret_val($strSD);
        
    $strCD="SELECT member_user_id FROM tbl_memberreg WHERE sponcer_id='$sponcer_id' and investment_busd>=100 ";
    $resCD=mysqli_query($connection,$strCD);
    $qulifid_direct=mysqli_num_rows($resCD);
    
    $strD="SELECT IFNULL(SUM(investment_busd),0) as investment_busd,IFNULL(SUM(current_investment),0) as invest_packag FROM tbl_memberreg WHERE sponcer_id='$sponcer_id' ";
    $resD=mysqli_query($connection,$strD);
    $rowD=mysqli_fetch_array($resD);
    $Dinvestment_busd=$rowD['investment_busd'];
    $Dinvest_packag=$rowD['invest_packag'];
    
    $UpdateSp="Update tbl_memberreg set qulifid_direct=$qulifid_direct,direct_business=$Dinvestment_busd,direct_business_aura=$Dinvest_packag where member_user_id='$sponcer_id'";
    mysqli_query($connection,$UpdateSp) or die(mysqli_error($connection));
        
    cal_level_incentive($invest_packagAura,$hash_code,$member_user_id);
} 


function cal_Team($topup_amount,$member_user_id)
{
 
    global $connection;$level_paid=0;
    $member_id=$member_user_id;
    $parant_id=get_parrent_member_id();
    $total_level=10;;
    for($cnt=1;$cnt<=$total_level;$cnt++)
    {
        echo "<br>". $mstr="Select sponcer_id from tbl_memberreg where member_user_id='$member_id' ";
        $mresult=mysqli_query($connection, $mstr);
		while($mrow=mysqli_fetch_array($mresult))
		{
            $sponcer_id=$mrow['sponcer_id'];
           echo "<br>". $up="Update tbl_memberreg set team_business=team_business+$topup_amount where member_user_id='$sponcer_id'";
            mysqli_query($connection,$up) or die(mysqli_error($connection));
                    
 			if($sponcer_id==$parant_id)
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
function getROIRate($invest_package)
{
    $roi_rate=0;
    if($invest_package>=25 && $invest_package<=1000)
    {
        $roi_rate=3;
    }
    else if($invest_package>=1001 && $invest_package<=5000)
    {
        $roi_rate=4;
    }
    else if($invest_package>=5001 && $invest_package<=25000)
    {
        $roi_rate=5;
    }
    else if($invest_package>=25000)
    {
        $roi_rate=6;
    }
    return $roi_rate;
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
            	$dire=chkDirect($sponcer_id);
            
                if($cnt==1 )
                {
                    //For Direct Income
                    $income_amt=$topup_amount*$income_per/100;
                   	echo	$str_in="Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'REFERRAL BONUS','REFERRAL BONUS','$member_user_id',$income_amt,'$hash_code','$topup_amount','',$income_per)"; echo "<br>";
            			mysqli_query($connection,$str_in) or die(mysqli_error($connection));
            			
            		    $up="Update tbl_memberreg set wallet_amount=wallet_amount+$income_amt,total_earning=total_earning+$income_amt where member_user_id='$sponcer_id'";
                        mysqli_query($connection,$up) or die(mysqli_error($connection));
                }
                else if($qulifid_direct>=3 && $direct_business>=1000 && $dire>=0)
                {
      
                     $income_amt=$topup_amount*$income_per/100;
                   	echo	$str_in="Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'REFERRAL BONUS','REFERRAL BONUS','$member_user_id',$income_amt,'$hash_code','$topup_amount','',$income_per)"; echo "<br>";
            			mysqli_query($connection,$str_in) or die(mysqli_error($connection));
                    
                	$up="Update tbl_memberreg set wallet_amount=wallet_amount+$income_amt,total_earning=total_earning+$income_amt where member_user_id='$sponcer_id'";
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