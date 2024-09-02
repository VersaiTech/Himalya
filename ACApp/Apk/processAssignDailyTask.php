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
    $task_name=text_input($_REQUEST['assigntask']);
    $token_qty=text_input($_REQUEST['token_qty']);
     $task_type=text_input($_REQUEST['task_type']);
      $task_subject=text_input($_REQUEST['task_subject']);
    $task_id=text_input($_REQUEST['task_id']);
    $task_date=date("Y-m-d",strtotime($_REQUEST['task_date']));
    $chk="Select * from tbl_assign_daily_task where task_id='$task_id'";
    $reschk=mysqli_query($connection,$chk);
    if(mysqli_num_rows($reschk)==0)
    {
       echo $insStr="Insert Into tbl_assign_daily_task(task_date,task_name,token_qty,task_id,task_type,task_subject)values('$task_date','$task_name',$token_qty,'$task_id','$task_type','$task_subject')";
        mysqli_query($connection,$insStr) or die(mysqli_error($connection));
        $msg="Success";
    }
    else
    {
        $msg="Success";
    }
}
echo $msg;
header("Location:../AssignDailyTask?msg=$msg");
?>