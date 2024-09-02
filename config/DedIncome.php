<?php

$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

date_default_timezone_set("Asia/Calcutta");

// $date=date("Y-m-d");
// $cnt=1;
// $str="SELECT * FROM `tbl_member_income_dtails` WHERE `calculate_date` >= '2022-08-16' AND `income_type` LIKE 'REFERRAL BONUS' ";
// $res=mysqli_query($connection,$str);
// while($row=mysqli_fetch_array($res))
// {
//     $member_user_id=$row['member_user_id'];
//     $income_amt=$row['income_amt'];
//     $hash_code=$row['hash_code'];
//     $income_id=$row['income_id'];
//     echo $cnt." : ". $up="Update tbl_memberreg set wallet_amount=wallet_amount-$income_amt,total_earning=total_earning-$income_amt where member_user_id='$member_user_id'";
//     mysqli_query($connection,$up) or die();
    
//     $del="Delete From tbl_member_income_dtails where income_id=$income_id";
//     mysqli_query($connection,$del);
    
//     $UpL="Update tbl_reinvest set level=2 where hash_code='$hash_code'";
//     mysqli_query($connection,$UpL) or die();
//     echo "<br>";
    
//   $cnt=$cnt+1;
    
// }



?>
