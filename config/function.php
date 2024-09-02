<?php
date_default_timezone_set("Asia/Calcutta");
function RemoveSpecialChar($str){ 
      
    // Using str_ireplace() function  
    $res = str_ireplace( array( '\'','-', '"', 
    ',' , ';', '<', '>',']' ,'[','~'), ' ', $str); 
      
    // returning the result  
    return $res; 
    } 

function get_parrent_member_id()
{
	global $connection;
	$str="Select * from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection, $str);
	$row=mysqli_fetch_array($res);
	return $row['member_id'];
}

function get_value($str)
{
    global $connection;
    $res=mysqli_query($connection,$str);
    $row=mysqli_fetch_array($res);
    return $row[0];
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
function test_input($data) {
	
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function ret_val($str)
{
	global $connection;
	$result=mysqli_query($connection,$str);
	while($row=mysqli_fetch_array($result))
	{
		$RetRec=$row[0];
	}
	return $RetRec;
}
function get_company()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['company_name'];
	return $RetRec;
}

function get_icon()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['company_logo'];
	return $RetRec;
}
function get_website()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['website'];
	return $RetRec;
}
function get_associate_code()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['associate_code'];
	return $RetRec;
}
function get_admin()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['admin_per'];
	return $RetRec;
}
function get_tds()
{
	global $connection;
	$strst="Select * from tbl_setting";
	$ress=mysqli_query($connection,$strst);
	$rows=mysqli_fetch_array($ress);
	$RetRec=$rows['tds_per'];
	return $RetRec;
}

function get_sponsor_id($member_user_id)
{
   global $connection;
	 $ssql=$mstr="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	$srow=mysqli_fetch_array($sresult);
	return $srow['sponcer_id'];
	
}
function get_promoter($member_user_id)
{
   global $connection;
	 $ssql=$mstr="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	$srow=mysqli_fetch_array($sresult);
	return $srow['promoter_id'];
	
}

function getid($member_user_id)
{
    global $connection;
    $strL="Select sl_no from tbl_memberreg where member_user_id='$member_user_id'";
    $resL=mysqli_query($connection,$strL);
    $rowL=mysqli_fetch_array($resL);
    return $sl=$rowL['sl_no'];
}

function get_parrent_id()
{
	global $connection;
	$str="Select * from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_id'];
}
function get_parrent_associate_id()
{
	global $connection;
	$str="Select * from tbl_memberreg order by member_id asc";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_user_id'];
}
function get_last_id()
{
	global $connection;
	$str="Select * from tbl_memberreg where sl_no>0 order by sl_no desc";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['member_user_id'];
}
function get_promoter_id($member_user_id)
{
   global $connection;
	 $ssql=$mstr="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$sresult=mysqli_query($connection,$ssql);
	$srow=mysqli_fetch_array($sresult);
	return $srow['promoter_id'];
	
}

function get_associate_name($member_user_id)
{
	global $connection;
	$str="Select * from tbl_memberreg where member_user_id='$member_user_id'";
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
	$str="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['sponcer_id'];
}

function get_contact_no($member_user_id)
{
	global $connection;
	$str="Select * from tbl_memberreg where member_user_id='$member_user_id'";
	$res=mysqli_query($connection,$str);
	$row=mysqli_fetch_array($res);
	return $row['contact'];
}

function get_member_id($member_user_id)
{
   global $connection;
    $mem_id='';
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
$member_id=substr(str_shuffle("0123456789"),0,7);
$mem_idn=$code.$member_id;
return $mem_idn;
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



 ?>