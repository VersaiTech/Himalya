<?php
session_start();
ob_start();
 include "../config/config.php"; 
 include "../config/function.php"; 
 
 $private_key=get_privatekey();
 $request_from_server=$_SERVER['HTTP_REFERER'];
$this_server=$_SERVER['HTTP_HOST'];
if($request_from_server!=''){
	check_access_url($request_from_server,$this_server);
}

// echo $_SESSION['login_status'];echo "<br>";
// echo $_SESSION['private_key'];echo "<br>";
// echo $_SESSION['admin_name'];echo "<br>";

if($_SESSION['login_status']!='YES' || $_SESSION['private_key']!=$private_key || $_SESSION['private_key']=='' || $_SESSION['admin_name']=='')
{
    echo "Blank";
	header("Location:../AppLogin");
	exit();
}
else
{
   $sys_date=date("Y-m-d H:i:s");
print_r($_REQUEST);

echo $user_wallet=$_REQUEST['wallet_Address'];
echo $user_id=$_REQUEST['member_user_id'];
echo $record_no=$_REQUEST['record_no'];
echo $user_trx_array=$_REQUEST['with_amt'];
echo $hashcode=$_REQUEST['hashcode'];
//$total_usdt=$_REQUEST['total_usdt'];


$wallet_array=explode("%",$user_wallet);
$member_array=explode("%",$user_id);
$rec_array=explode("A",$record_no);
$income_array=explode("A",$user_trx_array);

$total_usdt=0;
echo "<br>";
echo $arrlength = count($wallet_array);
	for($x = 0; $x < $arrlength; $x++) 
	{
	   echo $wallet_address= $wallet_array[$x];
	    $member_user_id= $member_array[$x];
	    $income_amt= $income_array[$x]/1000000;
	    $record_id= $rec_array[$x];
        $total_usdt=$total_usdt+$income_amt;
		echo $ss="Update tbl_income_withdrawal set status=1,transaction_id='$hashcode',tr_date='$sys_date' where record_no='$record_id'";
		mysqli_query($connection,$ss) or die(mysqli_error($connection));

	}

echo $pstr="Insert Into tbl_paymentTrns(hash_code,sdate,total_amt,status,checked)values('$hashcode','$sys_date',$total_usdt,0,0)";
    mysqli_query($connection,$pstr);
    

} 
header("Location:../PendingWithdrawRequest");
?>