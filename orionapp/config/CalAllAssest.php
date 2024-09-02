<?php
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");

$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');
$cnt=1;
$cmd="SELECT sum(topup_amount) as topup_amount,sum(investment_busd) as investment_busd,sponcer_id FROM `tbl_memberreg` GROUP by sponcer_id";
$qrt=mysqli_query($connection,$cmd);
while($rty=mysqli_fetch_array($qrt))
{

    $member_user_id=$rty['sponcer_id'];
    $topup_amount=$rty['topup_amount'];
    $investment_busd=$rty['investment_busd'];
    echo "<br>". $cnt++ .$uP="update tbl_memberreg set direct_business=$investment_busd,direct_business_aura=$topup_amount where member_user_id='$member_user_id'";
    mysqli_query($connection,$uP) or die(mysqli_error($connection));
 
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