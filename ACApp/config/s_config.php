<?php
error_reporting(0);
ob_start();
session_start();
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            // this is HTTPS
            $protocol  = "https";
        } else {
            // this is HTTP
            $protocol  = "http";
        }
if($_SERVER['HTTP_HOST']=='localhost:8080'){
$host=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('agnrealcon.in') or die(mysql_error());
$base_url=$protocol.'://'.$_SERVER['HTTP_HOST'].'/agnrealcon.in/web-app/';
$path=$base_url.'admin/uploads/';
$admin_path=$base_url.'admin/';
$store_path=$base_url.'estore/';
$admin_path1=$admin_path;
$user_path=$base_url.'user/';
$associate_path=$base_url.'associate/';
$url=$base_url;
$theme_path=$base_url.'theme/';
$front_url=$protocol.'://'.$_SERVER['HTTP_HOST'];
}
else
{
$host=mysql_connect("localhost","agnrealcon_mlmusers","nadcab!@#123!@#") or die('Connection error '.mysql_error());
$db=mysql_select_db('agnrealcon_mlmdatabase') or die('Database Connection error '.mysql_error());
$base_url=$protocol.'://'.$_SERVER['HTTP_HOST'].'/web-app/';
$path=$base_url.'admin/uploads/';
$admin_path=$base_url.'admin/';
$store_path=$base_url.'estore/';
$admin_path1=$admin_path;
$user_path=$base_url.'user/';
$associate_path=$base_url.'associate/';
$url=$base_url;
$theme_path=$base_url.'theme/';
$front_url=$protocol.'://'.$_SERVER['HTTP_HOST'];
}
date_default_timezone_set("Asia/Kolkata");
$ID_Prefix='AGN';
$RootId ='AGN00001';
$Image_ext = array("jpg","png","gif","jpeg","JPG","PNG");
$Image_size = 2000;
$File_size = 3000;
$File_ext = array('doc','docx','pdf','pdf5','pdfx','xls','xlsx');
/*
  md5 user as md5('payment'),md5(fr_id),md5(dc_id),md5(dc_orderid),md5(fr_orderid),md5('confired'),
  
*/
$sqlQuery = "select * from tbl_sms where sms_id=1 and is_status=0";
$rsQuery = mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
if(mysql_num_rows($rsQuery))
{
   $sms = mysql_fetch_assoc($rsQuery);
   $user = $sms['sms_user_id'];
   $pass = $sms['sms_user_password'];
   $sender_id = $sms['sms_sender_id'];
   $sms_url = $sms['sms_url'];
   $sms_regards = $sms['sms_regards'];
   $sms_status = $sms['is_status'];
}
##################################################################
$sqlsocial="select * from tbl_social where so_id='1'";
$rssocial=mysql_query($sqlsocial) or die(mysql_error());
if(mysql_num_rows($rssocial)>0)
$social=mysql_fetch_assoc($rssocial);
##################################################################
$sqlsite="select * from tbl_site where site_id='1'";
$rssite=mysql_query($sqlsite) or die(mysql_error());
$sitedata=mysql_fetch_assoc($rssite);


##################################################################
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
 ################################################################
 function get_mem_info($mem_id)
 {
	$sql="select * from member where mem_id='$mem_id'";
	$rs=mysql_query($sql);
	$dt=mysql_fetch_assoc($rs);
	
	 return $dt;
 }
################################################################
function rand_str($length = 32, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890')
{
    // Length of character list
    $chars_length = (strlen($chars) - 1);

    // Start our string
    $string = $chars{rand(0, $chars_length)};
   
    // Generate random string
    for ($i = 1; $i < $length; $i = strlen($string))
    {
        // Grab a random character from our list
        $r = $chars{rand(0, $chars_length)};
       
        // Make sure the same two characters don't appear next to each other
        if ($r != $string{$i - 1}) $string .=  $r;
    }
   
    // Return the string
    return $string;
}
##################################################################
function tstr($data, $len=13)
{
    $more="";
    if (strlen($data)>$len){$more=" ...";}
    return substr($data,0,$len).$more;
}

##################################
function testSMSAPI($message,$numbers)
{
    global $user,$pass,$sender_id,$sms_url,$sms_regards;
    //$numbers[0] = '9140754281';
    $mobileNo = implode(',',$numbers);
    $message= $message;
    if($sms_regards!='')
    $message.=','.$sms_regards;
    $endAPI = $sms_url."/api/mt/SendSMS/";
    
    $params= array(
    'user'		=> $user,
    'password'	=> $pass,
    'senderid'	=> $sender_id,
    'channel'	=> 'Trans',
    'DCS'		=> 0,
    'flashsms'	=> 0,
    'number' 	=> $mobileNo,
    'text' 		=> $message, 
    'route' 	=> 2
    );
    $options = array();			
    $defaults = array(
    CURLOPT_URL => $endAPI, 
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
    );
    
    $defaults = array( 
    CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
    CURLOPT_HEADER => 0, 
    CURLOPT_RETURNTRANSFER => TRUE, 
    CURLOPT_TIMEOUT => 4 
    );
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch)){ 
    trigger_error(curl_error($ch)); 
    } 
    curl_close($ch);
    return $result;
}


######################## Message API
function BirthDayMessageTemplate($message='', $mobile='',$datetime=''){
global $user,$pass,$sender_id,$sms_url,$sms_regards;
$mobileNo = implode(',',$mobile);
$message= $message;
if($sms_regards!='')
$message.=','.$sms_regards;
$endAPI = $sms_url."/api/mt/SendSMS/";

$params= array(
'user'		=> $user,
'password'	=> $pass,
'senderid'	=> $sender_id,
'channel'	=> 'Trans',
'DCS'		=> 0,
'flashsms'	=> 0,
'number' 	=> $mobileNo,
'text' 		=> $message, 
'schedtime' => $datetime,
'route' 	=> 2
);
$options = array();			
$defaults = array(
CURLOPT_URL => $endAPI, 
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);

$defaults = array( 
CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
CURLOPT_HEADER => 0, 
CURLOPT_RETURNTRANSFER => TRUE, 
CURLOPT_TIMEOUT => 4 
);

$ch = curl_init();

curl_setopt_array($ch, ($options + $defaults));


if( ! $result = curl_exec($ch)){ 
trigger_error(curl_error($ch)); 
} 
curl_close($ch);
return $result;
}

function sendSMSTemplate($message='', $mobile='')
{
    global $user,$pass,$sender_id,$sms_url,$sms_regards;
    //$mobile[0] = '9140754281';
    $mobileNo = implode(',',$mobile);
    $message= $message;
    if($sms_regards!='')
    $message.=','.$sms_regards;
    $endAPI = $sms_url."/api/mt/SendSMS/";
    
    $params= array(
    'user'		=> $user,
    'password'	=> $pass,
    'senderid'	=> $sender_id,
    'channel'	=> 'Trans',
    'DCS'		=> 0,
    'flashsms'	=> 0,
    'number' 	=> $mobileNo,
    'text' 		=> $message, 
    'route' 	=> 2
    );
    $options = array();			
    $defaults = array(
    CURLOPT_URL => $endAPI, 
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
    );
    
    $defaults = array( 
    CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
    CURLOPT_HEADER => 0, 
    CURLOPT_RETURNTRANSFER => TRUE, 
    CURLOPT_TIMEOUT => 4 
    );
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch)){ 
    trigger_error(curl_error($ch)); 
    } 
    curl_close($ch);
    return $result;
}

#################### Message Deliver Reports
function get_delivery($JobId){
global $user,$pass,$sender_id,$sms_url;
$endAPI = $sms_url."/api/mt/GetDelivery/";
$params= array(
'user'		=> $user,
'password'	=> $pass,
'senderid'	=> $sender_id,
'channel'	=> 'Trans',
'route' 	=> 2,
'jobid'	=> $JobId
);
$options = array();			
$defaults = array(
CURLOPT_URL => $endAPI, 
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);

$defaults = array( 
CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
CURLOPT_HEADER => 0, 
CURLOPT_RETURNTRANSFER => TRUE, 
CURLOPT_TIMEOUT => 4 
);

$ch = curl_init();

curl_setopt_array($ch, ($options + $defaults));


if( ! $result = curl_exec($ch)){ 
  trigger_error(curl_error($ch)); 
} 
curl_close($ch);
return $result;

}

function getBalance()
{
global $user,$pass,$sender_id,$sms_url;
$endAPI = $sms_url."/api/mt/GetBalance/";
$params= array(
'user'		=> $user,
'password'	=> $pass,
'senderid'	=> $sender_id,
'channel'	=> 'Trans',
'route' 	=> 2,
'jobid'	=> $JobId
);
$options = array();			
$defaults = array(
CURLOPT_URL => $endAPI, 
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);

$defaults = array( 
CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
CURLOPT_HEADER => 0, 
CURLOPT_RETURNTRANSFER => TRUE, 
CURLOPT_TIMEOUT => 4 
);

$ch = curl_init();

curl_setopt_array($ch, ($options + $defaults));


if( ! $result = curl_exec($ch)){ 
  trigger_error(curl_error($ch)); 
} 
curl_close($ch);
return $result;
   
}

function sendHindiSMS($message='', $mobile=''){
global $user,$pass,$sender_id,$sms_url,$sms_regards;
$mobileNo = implode(',',$mobile);
$message= $message;
if($sms_regards!='')
$message.=','.$sms_regards;
$endAPI = $sms_url."/api/mt/SendSMS/";

$params= array(
'user'		=> $user,
'password'	=> $pass,
'senderid'	=> $sender_id,
'channel'	=> 'Trans',
'DCS'		=> 8,
'flashsms'	=> 0,
'number' 	=> $mobileNo,
'text' 		=> $message, 
'route' 	=> 2
);
$options = array();			
$defaults = array(
CURLOPT_URL => $endAPI, 
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);
$defaults = array( 
CURLOPT_URL => $endAPI. (strpos($endAPI, '?') === FALSE ? '?' : ''). http_build_query($params), 
CURLOPT_HEADER => 0, 
CURLOPT_RETURNTRANSFER => TRUE, 
CURLOPT_TIMEOUT => 4 
);

$ch = curl_init();

curl_setopt_array($ch, ($options + $defaults));


if( ! $result = curl_exec($ch)){ 
trigger_error(curl_error($ch)); 
} 
curl_close($ch);
return $result;
}
/*
$selected_fileds="member_id,member_code,sponsor_id,sponsor_code,under_referal_id,under_referal_code,member_name,member_mobile";
$sqlQ="select $selected_fileds from tbl_member where member_mobile!='' ORDER BY member_id ASC";
$rsQ=mysql_query($sqlQ) or die($sqlQ.' '.mysql_error());
while($data=mysql_fetch_assoc($rsQ))
{
   
    $message="Hi ".$data['member_name']." ( User Id ".$data['member_code']." ), Vistaraindian server is migrating / updating. Kindly make patience by today. It will take 24 Hours in migrating / updating. Thanks for supporting. Vistaraindian.com ";
    $mobile[0]  = $data['member_mobile'];
    sendSMSTemplate($message, $mobile);
}
$message='Test message';
$numbers[0]='9140754281';
$numbers[1]='8896402409';
$res= testSMSAPI($message, $numbers);
print_r($res);
$res= sendSMSTemplate($message, $numbers);
print_r($res);
*/
?>