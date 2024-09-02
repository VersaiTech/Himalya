<?Php
session_start();
include './config/config.php'; 


$user_login_name=$_REQUEST['WalletAddress'];
$password=$_REQUEST['WalletAddress'];

 $str="Select * from  tbl_memberreg where member_name='$user_login_name' or wallet_address='$user_login_name' and isblock=0";
 if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }


 $result=mysqli_query($connection,$str); 
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
	$_SESSION['view_type']="MAIN";
	$_SESSION['member_id']=$row['member_id'];
	$_SESSION['member_user_id']=$row['member_user_id'];
	$_SESSION['wallet_address']=$row['wallet_address'];
	$_SESSION['member_name']=$row['wallet_address'];
	}
    echo "Exist";
}
else
{
	echo "!User does not exist";
}
?>