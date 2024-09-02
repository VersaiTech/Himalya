<?php

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("Asia/Kolkata");
global $connection;
$connection = @mysqli_connect("localhost", "root", "", "u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$date = date("Y-m-d");
$time = date("H:ia");
$day = date('D');
$day_of_month = date('d'); // get the day of the month (1-31)

// Check if it's the 5th day of the month
if ($day_of_month == 5) {
    //For Less Then 10000
    $registration_date = date("Y-m-d 00:00:00");

    echo $sql2 = "SELECT * FROM tbl_memberreg WHERE member_user_id NOT IN (select member_user_id from tbl_member_income_dtails where income_type='STAKING BONUS' AND calculate_date='$date') limit 0,50";

    $sql3 = "SELECT set_roi_percent FROM admin WHERE admin_id = '5'";

    $result2 = mysqli_query($connection, $sql2);
    $result3 = mysqli_query($connection, $sql3);

    while ($row3 = mysqli_fetch_array($result3)) {
        echo $roi_rate = $row3['set_roi_percent'];
    }

    echo "<br>";
    echo $cnt = mysqli_num_rows($result2);
    echo "<br>";

    while ($row2 = mysqli_fetch_array($result2)) {
        $member_user_id = $row2['member_user_id'];
        $member_name = $row2['member_name'];
        $current_investment = $row2['current_investment'];
        $income_amt = ($current_investment * $roi_rate / 100);
        echo "<br>" . $income_amt;
        if ($income_amt > 0) {
            echo "<br>" .  $str_in = "Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$member_user_id','$member_name','$date',$income_amt,1,'STAKING BONUS','STAKING BONUS','$member_user_id',$income_amt,'','$current_investment','',$roi_rate)";
            mysqli_query($connection, $str_in) or die(mysqli_error($connection));

            $up = "Update tbl_memberreg set wallet_amount=wallet_amount+$income_amt where member_user_id='$member_user_id'";
            mysqli_query($connection, $up) or die(mysqli_error($connection));
        }
    }
} else {
    echo "Not the 5th day of the month, skipping income calculation.";
}