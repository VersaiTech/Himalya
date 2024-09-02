<?php
//date_default_timezone_set("Asia/Calcutta");
 date_default_timezone_set("Asia/Kuala_Lumpur");

 function RemoveSpecialChar($str){ 
      
    // Using str_ireplace() function  
    $res = str_ireplace( array( '\'','-', '"', 
    ',' , ';', '<', '>',']' ,'[','~'), ' ', $str); 
      
    // returning the result  
    return $res; 
    } 

function sendmysms($mobileNumber, $message)
  {
		global $connection;
		$strst="Select * from tbl_setting";
		$ress=mysqli_query($connection,$strst);
		$rows=mysqli_fetch_array($ress);
		$title_name =$rows['title_name'];
		$company_name=$rows['company_name'];
		$user =$rows['sma_user_name'];
		$api_key =$rows['sms_api'];
		$sender =$rows['sms_sender_id'];
		$baseurl  =$rows['sms_base_url'];
		$website  =$rows['website'];
		
		//For Send SMS
		$ret = TRUE;	
		$user = $user;
		$api_key = $api_key; //will get from system  778
		$baseurl =$baseurl;   
		$message = $message;
		$message =  urlencode($message);
		$to = $mobileNumber;
		$sender = $sender;
		$to = trim($mobileNumber); 
	$url="http://37.59.76.46/api/mt/SendSMS?user=NAYGON&password=q12345&senderid=SMSOTP&channel=trans&DCS=0&flashsms=0&number=$mobileNumber&text=$message&route=2";
		try 
		{
		$ret = file_get_contents($url);
		}
		catch (Exception $e) 
		{
		echo $e->getMessage();
		}
		
		if($ret == FALSE)
		{
		return $action = "notsend";
		}
		else
		{
		return $action = "sendsuccess";
		}
}
function phone_validation($phone)
{
	
	$phone=test_input($phone);
	if(preg_match('/^\d{10}$/', $phone))
    return true;
    else
	return false;
   
}
function aadhar_validation($aadhar)
{
	$uid=test_input($aadhar);
	if(preg_match('/^\d{12}$/', $uid))
    return true;
    else
	return false;
}

function get_value($str)
{
    global $connection;
    $res=mysqli_query($connection,$str);
    $row=mysqli_fetch_array($res);
    return $row[0];
}
####################################################### function Email Validation
function email_validation($email)
{
	
	$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	$email=test_input($email);
	if(preg_match($emailval, $email))
    return true;
    else
	return false;
    
} 
function text_input($data) {
	
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function ret_val($str)
{

	$result=mysqli_query($connection,$str);
	while($row=mysqli_fetch_array($result))
	{
		$RetRec=$row[0];
	}
	return $RetRec;
}

function get_privatekey()
{
	global $connection;
	$strst="Select private_key from admin";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['private_key'];
	return $RetRec;
}

function get_company()
{
	global $connection;
	$strst="Select company_name from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['company_name'];
	return $RetRec;
}

function get_icon()
{
	global $connection;
	$strst="Select company_logo from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['company_logo'];
	return $RetRec;
}
function get_website()
{
	global $connection;
	$strst="Select website from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['website'];
	return $RetRec;
}
function get_associate_code()
{
	global $connection;
	$strst="Select associate_code from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['associate_code'];
	return $RetRec;
}
function get_admin()
{
	global $connection;
	$strst="Select admin_per from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['admin_per'];
	return $RetRec;
}
function get_tds()
{
	global $connection;
	$strst="Select tds_per from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['tds_per'];
	return $RetRec;
}

function get_total_level()
{
	global $connection;
	$level=1;
	$str="Select * from  tbl_level_amt ";
	$res=mysqli_query($connection,$str);
	return mysqli_num_rows($res);
	if(mysqli_num_rows($res)>0)
	{
	$level=mysqli_num_rows($res);
	}
	return $level;
}


function get_sponsor_id($member_user_id)
{
   global $connection;
	 $ssql=$mstr="Select sponcer_id from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	$srow=mysqli_fetch_array($sresult);
	return $srow['sponcer_id'];
	
}
function get_parrent_id()
{
	global $connection;
	$str="Select member_id from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_id'];
}
function get_parrent_associate_id()
{
	global $connection;
	$str="Select member_user_id from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_user_id'];
}


function get_associate_name($member_user_id)
{
	global $connection;
	$str="Select member_name from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_name'];
}

function get_promoter_email($sponcer_id){
	global $connection;
	$str="Select * from tbl_memberreg where member_user_id='$sponcer_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['email_id'];
}

function get_sponcer($member_user_id)
{
	global $connection;
	$str="Select sponcer_id from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['sponcer_id'];
}

function get_contact_no($member_user_id)
{
	global $connection;
	$str="Select contact from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['contact'];
}
function total_active_member($member_id)
{
	global $connection;
	$parrent_id=get_parrent_id();
	$ssql123="Select * from tbl_level_amt";
	$res123=mysqli_query($connection,$ssql123);
	echo $nooflevel=mysqli_num_rows($res123);

	for($a=1;$a<=$nooflevel;$a++)
	{
         $mstr="Select * from tbl_memberreg where member_id='$member_id'"; 
		$mresult=mysqli_query($connection,$mstr);
		if(mysqli_num_rows($mresult)>0)
		{
			while($mrow=mysqli_fetch_array($mresult))
			{
			    $promoter=$mrow['promoter_id'];
                $member_id=get_member_id($promoter); echo "<br/>";
                $sql1="Update tbl_memberreg set total_active_member=total_active_member+1 where member_user_id='".$promoter."'"; 
                mysqli_query($connection,$sql1); 
			}
			 //$member_id=$mem_id; echo "<br/>";
		}
	}
}
function total_reg_member($member_id)
{
  	global $connection;
	echo $parrent_id=get_parrent_id();
	while($member_id >= $parrent_id)
	{
        echo  $mstr="Select * from tbl_memberreg where member_id='$member_id'"; 
		$mresult=mysqli_query($connection,$mstr);
		if(mysqli_num_rows($mresult)>0)
		{
			while($mrow=mysqli_fetch_array($mresult))
			{
			    $promoter=$mrow['promoter_id'];
                $mem_id=get_member_id($promoter); echo "<br/>";
 				
              echo $sql1="Update tbl_memberreg set total_member=total_member+1 where member_user_id='".$promoter."'"; 
                mysqli_query($connection,$sql1); 
			}
			 $member_id=$mem_id; echo "<br/>";
		}
	}

}
function get_member_id($member_user_id)
{
   global $connection;
	$ssql=$mstr="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	while($srow=mysqli_fetch_array($sresult))
	{
		$mem_id=$srow['member_id'];
	}
	return $mem_id;
}
function get_srno()
{
	global $connection;
	$activation_id=0;
	$qry="Select * from tbl_memberreg order by sl_no  desc";
	$result1=mysqli_query($connection,$qry);
	$rows=mysqli_fetch_array($result1);
	return $activation_id= $rows['sl_no']+1;
}
function return_mem_uname()
{
global $connection;
$mem_idn="";
$code=get_associate_code();
$member_id=substr(str_shuffle("0123456789"),0,8);
$mem_idn=$code.$member_id;
return $mem_idn;
}

function get_singleleg_promoter()
{
	global $connection;
	$str="Select * from add_gold_member where package_member<2 and package_name='GOLD' order by gold_id Asc";//member_user_id!='$parrent_id' and 
	$result=mysqli_query($connection,$str);
	$cnt=mysqli_num_rows($result);
	if($cnt>0)
	{
		$row=mysqli_fetch_array($result);
		$int_code=$row['member_user_id'];
	}
	return  $int_code;
}

function get_diamond_promoter()
{
	global $connection;
	$str="Select * from add_diamond_member where package_member<2 and package_name='DIAMOND' order by dia_id Asc";//member_user_id!='$parrent_id' and 
	$result=mysqli_query($connection,$str);
	$cnt=mysqli_num_rows($result);
	if($cnt>0)
	{
		$row=mysqli_fetch_array($result);
		$int_codeS=$row['member_user_id'];
	}
	return  $int_codeS;
}



function get_promoterid($promoter_id,$postion)
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
	 $str="Select * from tbl_memberreg where promoter_id='$promoter_id' and postion='$postion' order by member_Id asc";
     $result=mysqli_query($connection,$str);
     if(mysqli_num_rows($result)>0)
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
    		    $chk_str="Select * from tbl_memberreg where promoter_id='$promoter_id' and postion='$postion'";
    			$p_result=mysqli_query($connection,$chk_str);
    			if(mysqli_num_rows($p_result)==0)
    			{
    				//If There Have No Memeber
					return $promoter_id;
    				$flag="2";
    			}
				$promoter_id= ret_promoterid($promoter_id,$postion)  ;
		
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




function get_promoter($tp_amt)
{
	global $connection;
 $str="Select * from tbl_memberreg where total_active_member<3 and topup_amount ='$tp_amt' order by member_id Asc";
	
	$result=mysqli_query($connection,$str);
	$cnt=mysqli_num_rows($result);
	if($cnt>0)
	{
		$row=mysqli_fetch_array($result);
		$int_code=$row['member_user_id'];
	}
	  return $int_code;
}



function getBaseUrl() 
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 
    
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 
    
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 
    
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    
    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}

function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}


function get_client_ip() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

	return $ipaddress;
	
}
################################################################## check outsider url target
function check_access_url($request_from_server,$this_server){
	if (strpos($request_from_server, $this_server) !== false) {
		return true;
	}else{
		header("Location:$request_from_server?msg=Invalid Request...!");
		exit;
	}
	
}
##################################################################
function check_special_char($data)
{
  $return=array();
  foreach($data as $k=>$v)
  {
   $return[$k]=mysql_real_escape_string($v);
  }
  return $return;
}
##################################################################

 ?>