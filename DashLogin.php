<?Php
session_start();
 include "config/config.php"; 
 $user_login_name=$_REQUEST['Uid'];
$str="Select * from  tbl_memberreg where member_user_id='$user_login_name' or wallet_address='$user_login_name'  ";
$result=mysqli_query($connection,$str); 
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
	$_SESSION['view_type']="MAIN";
	$_SESSION['member_id']=$row['member_id'];
	$_SESSION['member_user_id']=$row['member_user_id'];
	$_SESSION['member_full_name']=$row['mmeber_full_name'];
	$_SESSION['member_hex_address']=$row['member_hex_address'];
	}
    header("Location:overview");
}
else
{
	echo "!User does not exist";
}
?>