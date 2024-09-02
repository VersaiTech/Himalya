<?php
date_default_timezone_set("Asia/Calcutta");
$connection = @mysqli_connect('localhost','example','example','example') or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$date=date("Y-m-d");

echo $total_user=get_user();
 echo $Tstr="Select * from tbl_assign_daily_task where task_date='$date' and assign_user<$total_user order by record_no limit 0,1";
$resT=mysqli_query($connection,$Tstr);
 mysqli_num_rows($resT);
while($rowt=mysqli_fetch_array($resT))
{
  
    $task_id=$rowt['task_id']; 
    $task_name=$rowt['task_name'];
    $task_type=$rowt['task_type']; 
    $task_subject=$rowt['task_subject']; 
    $token_qty=$rowt['token_qty']; 
    
  echo  $str="Select * from tbl_memberreg where member_user_id not in(select member_user_id from tbl_member_daily_task where task_id='$task_id' and task_date='$date') limit 0,10";
    $resM=mysqli_query($connection,$str);
    while($rowM=mysqli_fetch_array($resM))
    {
        // echo "<br>";
        $member_user_id=$rowM['member_user_id'];
      echo $Ins="Insert Into tbl_member_daily_task(member_user_id,task_date,task_id,task_name,token_qty,task_type,task_subject)values('$member_user_id','$date','$task_id','$task_name',$token_qty,'$task_type','$task_subject')";
        mysqli_query($connection,$Ins) or die(mysqli_error($connection));
        echo "<br>";
      echo  $up="Update tbl_assign_daily_task set assign_user=assign_user+1 where task_id='$task_id'";
        mysqli_query($connection,$up) or die(mysqli_error($connection));
    }
  
}
function get_user()
{
    global $connection;
    $str="Select count(*) as cnt from tbl_memberreg ";
    $res=mysqli_query($connection,$str);
    $row=mysqli_fetch_array($res);
   return $cnt=$row['cnt'];
}

?>
