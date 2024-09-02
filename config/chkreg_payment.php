<?php
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");

$connection = @mysqli_connect("localhost","root","","u358688394_aura3")  or die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font>');

$cmd="select * from tbl_memberreg where status=0 order by member_id limit 0,10";
$qrt=mysqli_query($connection,$cmd);
while($rty=mysqli_fetch_array($qrt))
{
    
    $transaction_id=$rty['hash_code'];
    $member_user_id=$rty['member_user_id'];
    $member_name=$rty['member_name'];
    $sponcer_id=$rty['sponcer_id'];
     $sponcer_name=$rty['sponcer_name'];
    $invest_package=$rty['topup_amount'];
    $investment_busd=$rty['investment_busd'];
    $expiry_date=date("Y-m-d",strtotime("+5 Day"));
    $expiry_date2=date("Y-m-d",strtotime("+7 Day"));
    
   echo $promoter_id=$sponcer_id;
    $promoter_name=$sponcer_name;


//   echo $chkstr="Select * from Registration where transaction_id='$transaction_id' and investor='$member_name'";
//     $reschk=mysqli_query($connection,$chkstr);
//     while($rowchk=mysqli_fetch_array($reschk))
//     {
        //  $invest_package=$rowchk['invest_package'];
        //   $investment_busd=$rowchk['investment_busd'];
          
           $dir=0;
            if($investment_busd>=100 )
            {
                $dir=1;
            }
           echo $cmd2="update tbl_memberreg set direct_member=direct_member+1 where member_user_id='$sponcer_id'";
            $RTRR= mysqli_query($connection,$cmd2) or die(mysqli_error($connecion));
            
            
            $roi_rate=getROIRate($investment_busd);
           echo "<br>". $cmd1ere="update tbl_memberreg set status=1,member_status=1,promoter_id='$promoter_id',promoter_name='$promoter_name',status=1,checked=1,current_investment=$invest_package,topup_amount=$invest_package,roi_rate='$roi_rate',expiry_date='$expiry_date',investment_busd=$investment_busd where member_user_id='$member_user_id'";
            mysqli_query($connection,$cmd1ere) or die(mysqli_error($connection));
        //For Investment History
        $tr_date=date("Y-m-d H:i:s");
        echo "<br>". $Ins="Insert Into tbl_reinvest(member_user_id,member_name,invest_package,hash_code,tr_date,checked,payment_status,status,invest_type,investment_busd)values('$member_user_id','$member_name',$invest_package,'$transaction_id','$tr_date',1,1,1,'REGISTRATION',$investment_busd)";
        mysqli_query($connection,$Ins) or die(mysqli_error($connection));
        
        echo "<hr>";
    //}
}

//Check Booster 
// $cdate=date("Y-m-d");
// $UpBooster1="Update tbl_memberreg set booster1=1 where expiry_date<='$cdate' and direct_member>=5 and direct_business>=250";
// mysqli_query($connection,$UpBooster1);

// $UpBooster2="Update tbl_memberreg set booster2=1 where expiry_date2<='$cdate' and direct_member>=5 and direct_business>=250";
// mysqli_query($connection,$UpBooster2);

function getROIRate($invest_package)
{
    $roi_rate=0;
    if($invest_package>=25 && $invest_package<=1000)
    {
        $roi_rate=3;
    }
    else if($invest_package>=1001 && $invest_package<=5000)
    {
        $roi_rate=4;
    }
    else if($invest_package>=5001 && $invest_package<=25000)
    {
        $roi_rate=5;
    }
    else if($invest_package>=25000)
    {
        $roi_rate=6;
    }
    return $roi_rate;
}
function get_slno()
{
    global $connection;
	$str="Select * from tbl_memberreg order by sl_no desc limit 0,1";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['sl_no']+1;
}
function get_investment($member_user_id)
{
	global $connection;
	$str="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['current_investment'];
}
function get_direct($member_user_id)
{
	global $connection;
	$str="Select * from tbl_memberreg where sponcer_id='$member_user_id'";
	$res=mysqli_query($connection, $str);
	return $cntd=mysqli_num_rows($res);
}

function get_wallet($member_user_id)
{
	global $connection;
	$str="Select member_name from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['member_name'];
}

// $grd="delete from tbl_memberreg where checked>10 and status=0";  
// mysqli_query($connection,$grd);

function get_matrix_promoter($member_user_id)
{
    global $connection;
	$promoter_id="";
    $cnt=1;$flag=0;

echo "<br> Firsr Qurye ".$sql="select * from tbl_memberreg where promoter_id='$member_user_id'  order by member_id";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)<2)
	{
        return $promoter_id=$member_user_id;
        $flag=1;
        exit;
	}
	else
	{
    	while($row = mysqli_fetch_array($result))
    	{  
    		    echo "<br> Member ".$member_user_id1= $row['member_user_id'];
        		
        		echo "<br> Second Query ".$sql="select * from tbl_memberreg where promoter_id='$member_user_id1'  order by member_id";
        			$result1=mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result1)<2)
                	{
                	    echo "<br> New Promoter". $promoter_id=$member_user_id1;
                	    $flag=1;
                	    return $promoter_id=$member_user_id1;
                	    exit;
                	}
                	else
                	{
            	         while($row1 = mysqli_fetch_array($result1))
                        { 
            	     	    $list[]=$row1['member_user_id'];
                         }
                	}
     
    	}
    	
   

	}
	return $promoter_id;
}


function get_promoterid($promoter_id)
{
		$flag="1";
	global $connection;
 	  $mstr="Select member_id From tbl_memberreg order by member_id asc";
	  $mresult=mysqli_query($connection,$mstr);
	  while($mrow=mysqli_fetch_array($mresult))
	  {
	  $member_id=$mrow['member_id'];
	  }
	  $member_id=$member_id+1;
	 $str="Select * from tbl_memberreg where promoter_id='$promoter_id'  order by member_Id asc";
     $result=mysqli_query($connection,$str);
     if(mysqli_num_rows($result)>=2)
    {
        //If There Have Any Member In Postion
    	$row=mysqli_fetch_array($result);
        $promoter_id=$row['member_user_id'];
    	$promoter_name=$row['member_name'];
         $cnt=$row['member_id'];
        while($cnt<$member_id)
        {
    		if($flag=="1")
    		{
    		    $chk_str="Select * from tbl_memberreg where promoter_id='$promoter_id' ";
    			$p_result=mysqli_query($connection,$chk_str);
    			if(mysqli_num_rows($p_result)<2)
    			{
    				//If There Have No Memeber
					return $promoter_id;
    				$flag="2";
    			}
				$promoter_id= ret_promoterid($promoter_id)  ;
		
             }
             $cnt=$cnt+1;
        }

    }
    else
    {
	return $promoter_id;
	$flag="2";
          
     }
}
function ret_promoterid($promoter_id)
{
	global $connection;
	$ssql=$mstr="Select * from tbl_memberreg where promoter_id='$promoter_id' ";
	$sresult=mysqli_query($connection,$ssql);
	while($srow=mysqli_fetch_array($sresult))
	{
		$mem_id=$srow['member_user_id'];
	}
	return $mem_id;
}
?>