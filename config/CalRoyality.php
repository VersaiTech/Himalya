<?php

date_default_timezone_set("Asia/Kolkata");
$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

echo $RStr="Select * from tbl_royality where paid_status=0 ";
$resR=mysqli_query($connection,$RStr);
while($rowR=mysqli_fetch_array($resR))
{
    $royality_date=date("Y-m-d",strtotime($rowR['royality_date']));
    $turnover_business=$rowR['turnover_business'];
    $total_achivers=$rowR['total_achivers'];
    $royality_amt=$rowR['royality_amt'];
    $reference_no=$rowR['reference_no'];
    $royality_month=$rowR['royality_month'];
    $record_no=$rowR['record_no'];
    
    $upL="Update tbl_royality set paid_status=1 where record_no=$record_no";
    mysqli_query($connection,$upL) or die(mysqli_error($connection));
    
	$strRyl="Select member_user_id,member_name from tbl_memberreg where status=1 and team_business>=1000000 ";
    $resRlt=mysqli_query($connection,$strRyl);
    while($rowrt=mysqli_fetch_array($resRlt))
    {
        $member_user_id=$rowrt['member_user_id'];
        $member_name=$rowrt['member_name'];
        
        $strChk="Select * from tbl_member_income_dtails where member_user_id='$member_user_id' and hash_code='$reference_no' ";
        $resChk=mysqli_query($connection,$strChk);
        if(mysqli_num_rows($resChk)==0)
        {
            echo "<br>". $strInst="Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt,hash_code,investment_amt,invest_type,income_per)values('$member_user_id','$member_name','$royality_date',$royality_amt,1,'ROYALITY BONUS','$royality_month','',$royality_amt,'$reference_no',$turnover_business,'',0)";
            mysqli_query($connection,$strInst) or die(mysqli_error($connection));
            
            $Update="Update tbl_memberreg set wallet_amount=wallet_amount+$royality_amt where member_user_id='$member_user_id'";
            mysqli_query($connection,$Update) or die(mysqli_error($connection));
        }
    }
    
    
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