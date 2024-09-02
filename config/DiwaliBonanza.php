<?php

date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

echo $RStr="SELECT * FROM `tbl_reinvest` WHERE tr_date BETWEEN '2022-10-01' and '2022-11-30' and diwaliRewaerd=0 and invest_type='REGISTRATION' order by record_no limit 0,1";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $member_user_id=$rowR['member_user_id'];
    $member_name=$rowR['member_name'];
    $record_no=$rowR['record_no'];
    $investment_busd=$rowR['investment_busd'];
    $invest_aura=$rowR['invest_package'];
    $invest_month= "Nov-2022";//date("M-Y",strtotime($rowR['tr_date']));
    $reward_name='DIWALI JACKPOT';
    
    $upL="Update tbl_reinvest set diwaliRewaerd=1 where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
    cal_Team($investment_busd,$member_user_id,$invest_aura);
    
  
} 

function cal_Team($investment_busd,$member_user_id,$invest_aura)
{
 
    global $connection;$level_paid=0;
    $member_id=$member_user_id;
    $parant_id=get_parrent_member_id();
    $strC="Select count(member_user_id) as cnt from tbl_memberreg ";
    $total_level=ret_val($strC);
    //$total_level=10;;
    for($cnt=1;$cnt<=$total_level;$cnt++)
    {
        echo "<br>". $mstr="Select sponcer_id from tbl_memberreg where member_user_id='$member_id' ";
        $mresult=mysqli_query($connection, $mstr);
		while($mrow=mysqli_fetch_array($mresult))
		{
            $sponcer_id=$mrow['sponcer_id'];
           echo "<br>". $up="Update tbl_memberreg set diwaliTeamBusiness_BUSD=diwaliTeamBusiness_BUSD+$investment_busd,diwaliTeamBusiness_Aura=diwaliTeamBusiness_Aura+$invest_aura where member_user_id='$sponcer_id'";
            mysqli_query($connection,$up) or die(mysqli_error($connection));
                    
 			if($sponcer_id==$parant_id)
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