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
  
    $royality_date=date("Y-m-d",strtotime($_REQUEST['royality_date']));
    $turnover=text_input($_REQUEST['turnover']);
    $royality_achiver=text_input($_REQUEST['royality_achiver']);
    $royality_income=text_input($_REQUEST['royality_income']);
    $referrenceNo=text_input($_REQUEST['referrenceNo']);
    $royality_month=text_input($_REQUEST['royality_month']);
 
    $str="Select * from tbl_royality where reference_no='$referrenceNo' or royality_month='$royality_month'";
    $res=mysqli_query($connection,$str);
    if(mysqli_num_rows($res)==0)
    {
        $Inse="Insert Into tbl_royality(royality_date,turnover_business, 	total_achivers,royality_amt,reference_no,royality_month)values('$royality_date','$turnover','$royality_achiver','$royality_income','$referrenceNo','$royality_month')";
        mysqli_query($connection,$Inse);
    }
}

header("Location:../SendRoyality");
?>