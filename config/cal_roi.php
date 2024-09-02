<?php

error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
global $connection;
$connection = @mysqli_connect("localhost", "root", "", "u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$date = date("Y-m-d");

$time = date("H:ia");
$day = date('D');

//For Less Then 10000
$registration_date = date("Y-m-d 00:00:00");

echo $sql2 = "SELECT * FROM tbl_memberreg WHERE roi_rate>0 and member_user_id NOT IN (select member_user_id from tbl_member_income_dtails where income_type='STAKING BONUS' AND calculate_date='$date') limit 0,50";

$result2 = mysqli_query($connection, $sql2);
echo "<br>";
echo $cnt = mysqli_num_rows($result2);
echo "<br>";

while ($row2 = mysqli_fetch_array($result2)) {
    $member_user_id = $row2['member_user_id'];
    $member_name = $row2['member_name'];
    $current_investment = $row2['current_investment'];
    $roi_rate = $row2['roi_rate'];
    $income_amt = ($current_investment * $roi_rate / 100) / 30;
    if ($income_amt > 0) {
        echo "<br>" .  $str_in = "Insert Into tbl_member_income_dtails(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$member_user_id','$member_name','$date',$income_amt,1,'STAKING BONUS','STAKING BONUS','$member_user_id',$income_amt,'','$current_investment','',$roi_rate)";
        mysqli_query($connection, $str_in) or die(mysqli_error($connection));

        $up = "Update tbl_memberreg set wallet_amount=wallet_amount+$income_amt where member_user_id='$member_user_id'";
        mysqli_query($connection, $up) or die(mysqli_error($connection));

        cal_level_incentive($member_user_id, $income_amt, $member_user_id);
    }
}


function cal_level_incentive($sponcer_id, $topup_amount, $member_user_id)
{
    $sys_date = date('Y-m-d');
    global $connection;
    $level_paid = 0;
    $parent_id = "0123456";
    $member_id = $sponcer_id;
    $total_level = 10;;
    for ($cnt = 1; $cnt <= $total_level; $cnt++) {
        $strLV = "Select level_values from tbl_level_amt where level_name=$cnt";
        $income_per = ret_val($strLV);

        echo $mstr = "Select * from tbl_memberreg where member_user_id='$member_id' ";
        $mresult = mysqli_query($connection, $mstr);
        while ($mrow = mysqli_fetch_array($mresult)) {
            $sponcer_id = $mrow['sponcer_id'];
            $sponcer_name = $mrow['sponcer_name'];
            $status = $mrow['status'];
            $direct_member = $mrow['direct_member'];
            $dir = chkDirect($sponcer_id);
            $income_amt = $topup_amount * $income_per / 100;
            if ($dir >= 0) {
                echo $str_in = "Insert Into tbl_passiveBonus(member_user_id,member_name,calculate_date,income_amt,income_level,income_type,b_type,income_member_id,net_amt ,hash_code,investment_amt,invest_type,income_per)values('$sponcer_id','$sponcer_name','$sys_date',$income_amt,$cnt,'PASSIVE BONUS','PASSIVE BONUS','$member_user_id',$income_amt,'','$topup_amount','',$income_per)";
                echo "<br>";
                mysqli_query($connection, $str_in) or die(mysqli_error($connection));

                $up = "Update tbl_memberreg set wallet_amount=wallet_amount+$income_amt,total_earning=total_earning+$income_amt where member_user_id='$sponcer_id'";
                mysqli_query($connection, $up) or die(mysqli_error($connection));
            }
            if ($member_id == $parent_id) {
                $cnt = $total_level + 20;
            }
            $member_id = $sponcer_id;
        }
    }
}

function chkDirect($member_user_id)
{
    global $connection;
    $sysdate = date("Y-m-01");
    $strK = "Select * from tbl_memberreg where registration_date>='$sysdate' and sponcer_id='$member_user_id' and investment_busd>=100";
    $resK = mysqli_query($connection, $strK);
    return $cnt = mysqli_num_rows($resK);
}
function ret_val($str)
{
    global $connection;
    $result = mysqli_query($connection, $str);
    while ($row = mysqli_fetch_array($result)) {
        $RetRec = $row[0];
    }
    return $RetRec;
}
