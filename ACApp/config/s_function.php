<?php
function __Bottom_To_TopIds($member_id,$counter,&$ListArr,$max_level)
{
    $selectedfields="member_id,member_code,member_name,sponsor_id,sponsor_code,under_referal_id,under_referal_code,member_status";
	$sqlLevel1="select $selectedfields from tbl_member where member_id='$member_id'";	
	$rsLevel1=mysql_query($sqlLevel1) or die($sqlLevel1.' '.mysql_error());
	if($rows=mysql_num_rows($rsLevel1))
	{	   
	   $data=mysql_fetch_assoc($rsLevel1);		   
	   $counter=$counter+1;
	   $Ids = $data['member_id'].',';
	   $ListArr.=$Ids;		         
	   __Bottom_To_TopIds($data['under_referal_id'],$counter,$ListArr,$max_level);
	   //
	}
   
   //return $ListArr;
}

function _GetMainBalance($current_id,$date='')
{
    
    $MatchingInc = get_income_ammount('tbl_binary_income_cutoff','inc_amount',"where memberId='".$current_id."' and DATE(created_date)<='$date'");
    $RoyaltyInc = get_income_ammount('tbl_royalty_income','inc_amount',"where memberId='".$current_id."' and DATE(created_date)<='$date'");
    $DirectIncome = get_income_ammount('tbl_direct_income','inc_amount',"where memberId='".$current_id."' and DATE(created_date)<='$date'");
    
    $TotalWithdrawal = get_income_ammount('tbl_widthdraw','w_amount',"where (w_memberId='".$current_id."' and w_status=0 and 
    is_reject=0 and DATE(w_request_date)<='$date') or (w_memberId='$current_id' and is_reject=1 and w_status=1 and DATE(w_request_date)<='$date')");
    $Total = ($MatchingInc + $DirectIncome + $RoyaltyInc) - $TotalWithdrawal;
    return $Total;
}
function leftrecursive_function_withMirrorActiveStatus($member_id,&$ltot,&$counter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot2 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
    if($totrow>0)
    {
        while($data1=mysql_fetch_assoc($res))
        {
            $ltempstr = $data1['member_id'];
            $counter=$counter+1;
            $count = count_rows_id_wise('tbl_mirror_tree','id',"where memberId='".$data1['member_id']."'");
            leftrecursive_function_withMirrorActiveStatus($data1['member_id'],$ltot,$counter);
            if($count >0)
            $ltot=$ltot.",".$ltempstr;
        }
    }
}

function rightrecursive_function_withMirrorActiveStatus($member_id,&$rtot,&$rcounter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot3 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
    if($totrow>0)
    {
        while($data1=mysql_fetch_assoc($res))
        {
            $rtempstr = $data1['member_id'];
            $rcounter=$rcounter+1;
            $count = count_rows_id_wise('tbl_mirror_tree','id',"where memberId='".$data1['member_id']."'");
            rightrecursive_function_withMirrorActiveStatus($data1['member_id'],$rtot,$rcounter);
            if($count >0)
            $rtot=$rtot.",".$rtempstr;
        }
    }
}


function send_mail($email,$message,$subject)
{						
	global $sitedata;
	$sitename=$sitedata['site_name'];
	$sqlQuery="select * from tbl_mailer where id='1' and is_status=1";
	$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
	if(mysql_num_rows($rsQuery))
	{
		require_once('mailer/class.phpmailer.php');
		$mailer=mysql_fetch_assoc($rsQuery);
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true;
        //$mail->SMTPSecure = "ssl";
		$mail->SMTPDebug  = 0;                                     
		$mail->Host       = $mailer['host_name']; //"mail.ajtinternational.us";      
		$mail->Port       = $mailer['port']; //587;             
		$mail->AddAddress($email);
		$mail->Username=$mailer['user_name']; //"info@ajtinternational.us";  
		$mail->Password=$mailer['host_password']; // "password@#123@#";      
		$mail->SetFrom($mailer['user_name'],$sitename);
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}
	
}

function getRecords($sqlQuery='')
{
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list=array();
   while($data = mysql_fetch_assoc($rsQuery))
   {
     $list[] = $data;
   }
   return $list;
}

function get_Slider()
{
  $sqlQuery="select * from tbl_slider where is_trash=0 and s_status='Enable'";
  $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
  $list=array();
  while($data = mysql_fetch_assoc($rsQuery))
  {
    $list[] = $data;
  }
  return $list;
}
function get_ProductsName($cond='',$selected='')
{
  $sql="select product_name from tbl_product where product_id in (".$selected.")";
  $rs=mysql_query($sql) or die($sql.''.mysql_error());
  $list="";
	if(mysql_num_rows($rs)>0)
	{
		
		$i =0;
		while($data=mysql_fetch_assoc($rs))
		{
		  if($i<mysql_num_rows($rs)-1)
		  $list.=$data['product_name'].', ';
		  else
		  $list.=$data['product_name'];
		  
		  $i++;
		}
	}
	return $list;
}

function get_BrandsName($cond='',$selected='')
{
  $sql="select brand_name from tbl_brand where brand_id in (".$selected.")";
  $rs=mysql_query($sql) or die($sql.''.mysql_error());
  $list="";
	if(mysql_num_rows($rs)>0)
	{
		
		$i =0;
		while($data=mysql_fetch_assoc($rs))
		{
		  if($i<mysql_num_rows($rs)-1)
		  $list.=$data['brand_name'].', ';
		  else
		  $list.=$data['brand_name'];
		  
		  $i++;
		}
	}
	return $list;
}

function get_CategoriesName($cond='',$selected='')
{
  $sql="select cat_name from tbl_category where cat_id in (".$selected.")";
  $rs=mysql_query($sql) or die($sql.''.mysql_error());
  $list="";
	if(mysql_num_rows($rs)>0)
	{
		
		$i =0;
		while($data=mysql_fetch_assoc($rs))
		{
		  if($i<mysql_num_rows($rs)-1)
		  $list.=$data['cat_name'].', ';
		  else
		  $list.=$data['cat_name'];
		  
		  $i++;
		}
	}
	return $list;
}

function get_Products_list($tbale="",$col_id="",$col_name="",$edit_id="",$cond="",$field1='')
{
    if($edit_id!='')
	$explode = explode(',',$edit_id);
	
	$sql="select * from $tbale $cond";
	$rs=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rs)>0)
	{
		$list="";
		while($data=mysql_fetch_assoc($rs))
		{
			$id=$data[$col_id];
			$name=$data[$col_name];
			if($field1!='')
			$name.=' - '.$data[$field1];
			if(in_array($id,$explode))
			$list.="<option value='$id' selected='selected'>$name </option>";
		    else
			$list.="<option value='$id'>$name</option>";
		
		}
		return $list;
	} 
	
}
function get_Brands_checkboxList($condition='',$selected='')
{
   if($selected!='')
   $explode = explode(',',$selected);
   if($condition=='')
    $sqlQuery="select * from tbl_brand where is_brand_trash=0";
   else
    $sqlQuery="select * from tbl_brand $condition";
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list="";
   while($cat = mysql_fetch_assoc($rsQuery))
   {
     	
	 $id=$cat['brand_id'];
	 $name=$cat['brand_name'];
	 $id_name='checkbox_tags_'.$id;
	 if(in_array($id,$explode))
	 $list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='brand_id[]' id='$id_name' value='$id' checked> <label for='$id_name'>$name</label></div>";
	 else
	 $list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='brand_id[]' id='$id_name' value='$id'> <label for='$id_name'>$name</label></div>"; 
	
   }
   return $list;
  
}
function get_Product_Tags($condition='',$selected='')
{
  
   if($selected!='')
   $explode = explode(',',$selected);
   if($condition=='')
    $sqlQuery="select * from tbl_tags where is_tags_trash=0";
   else
    $sqlQuery="select * from tbl_tags $condition";
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list="";
   while($cat = mysql_fetch_assoc($rsQuery))
   {
     	
	 $id=$cat['tags_id'];
	 $name=$cat['tags_name'];
	 $id_name='checkbox_tags_'.$id;
	 if(in_array($id,$explode))
	 $list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='product_tags[]' id='$id_name' value='$id' checked> <label for='$id_name'>$name</label></div>";
	 else
	 $list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='product_tags[]' id='$id_name' value='$id'> <label for='$id_name'>$name</label></div>"; 
	
   }
   return $list;
}

function get_Category_onDropdown($condition='',$selected='')
{
  if($selected!='')
   $explode = explode(',',$selected);
   if($condition=='')
    $sqlQuery="select * from tbl_category where parent_id=0 and is_cat_trash=0";
   else
    $sqlQuery="select * from tbl_category $condition";
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list="";
   while($cat = mysql_fetch_assoc($rsQuery))
   {
	   $id=$cat['cat_id'];
	   $name=$cat['cat_name'];
	   if($id==$selected)
	       echo"<option value='$id' selected>$name</option>";
       else
		   echo"<option value='$id'>$name</option>";
	   
   }
   return $list;
}
function get_Product_Category($condition='',$selected='')
{
  
  
   if($selected!='')
   $explode = explode(',',$selected);
   
   if($condition=='')
    $sqlQuery="select * from tbl_category where parent_id=0 and is_cat_trash=0";
   else
    $sqlQuery="select * from tbl_category $condition";
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list="";
   while($cat = mysql_fetch_assoc($rsQuery))
   {
     	
	 $id=$cat['cat_id'];
	 $name=$cat['cat_name'];
	 $id_name="input-5".$id;
	 	 
	 if(in_array($id,$explode))
	 $list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='product_cat_id[]' id='$id_name' value='$id' checked> <label for='$id_name'>$name</label></div>";
	 else
	$list.="<div class='checkbox checkbox-replace checkbox-success'><input type='checkbox' class='form-control' name='product_cat_id[]' id='$id_name' value='$id'> <label for='$id_name'>$name</label></div>";
	 
	 
	 $sqlQuery1="select * from tbl_category where parent_id='".$cat['cat_id']."' and is_cat_trash=0";
	 $rsQuery1=mysql_query($sqlQuery1) or die($sqlQuery1.''.mysql_error());
	 while($cat1 = mysql_fetch_assoc($rsQuery1))
     {
	     
		 $id=$cat1['cat_id'];
		 $name=$cat1['cat_name'];
		 $id_name="input-5".$id;	 
		 if(in_array($id,$explode))
		 $list.="<div class='checkbox checkbox-replace checkbox-success' style='margin-left:20px;'><input type='checkbox' class='form-control' name='product_cat_id[]' id='$id_name' value='$id' checked> <label for='$id_name'>$name</label></div>";
		 else
		 $list.="<div class='checkbox checkbox-replace checkbox-success' style='margin-left:20px;'><input type='checkbox' class='form-control' name='product_cat_id[]' id='$id_name' value='$id'> <label for='$id_name'>$name</label></div>";
		
	 }
	 
   }
   return $list;
}
function get_Brand($condition='',$selected='')
{  
   if($condition=='')
    $sqlQuery="select * from tbl_brand where is_brand_trash=0";
   else
    $sqlQuery="select * from tbl_brand $condition";
   $rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
   $list="";
   while($cat = mysql_fetch_assoc($rsQuery))
   {
     	
	 $id=$cat['brand_id'];
	 $name=$cat['brand_name'];		 
	 if($id==$selected)
	 $list.="<option value='$id' selected>$name</option>";
	 else
	 $list.="<option value='$id' >$name</option>";	 
	
   }
   return $list;
}
function _security_msg($message='', $mobile='')
{
$user='sptech';
$pass='suneelmink@@15011988@@';
$sender_id='SPTECH';
$sms_url="http://smsfortius.com";
$sms_regards='SPTECH';
$mobileNo = implode(',',$mobile);
$message= $message.','.$sms_regards;
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

function system_msg($message='', $type='')
{
   $msg ='';
   if($message!='' && $type==true)
   {
      $msg ="<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>$message</strong>  </div>";
	  $_SESSION['success_msg'] = $msg;
   }
   else if($message!='' && $type==false)
   {
       $msg ="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>$message</strong>  </div>";
	  $_SESSION['success_msg'] = $msg;
   }
   
   
   
}
function show_msg()
{
   if($_SESSION['success_msg']!='')
   {
      $msg = $_SESSION['success_msg'];
	  unset($_SESSION['success_msg']);
      return $msg;
   }
}

function count_rows_id_distinct_wise($table_name,$field,$cond){
	$sqlcount="select distinct($field) from $table_name $cond";
	$rscount=mysql_query($sqlcount) or die($sqlcount.' '.mysql_error());	
	$rows= mysql_num_rows($rscount);
	return $rows;
}

function count_rows_id_wise($table_name,$field,$cond)
{
	$rows = 0;
	if($field!='')
	{
		$sqlcount="select $field from $table_name $cond";
		$rscount=mysql_query($sqlcount) or die($sqlcount.' '.mysql_error());	
		$rows= mysql_num_rows($rscount);		
	}
	return $rows;
}
function count_rows($table_name,$field,$cond){
	$sqlcount="select * from $table_name $cond";
	$rscount=mysql_query($sqlcount) or die($sqlcount.' '.mysql_error());	
	$rows= mysql_num_rows($rscount);
	return $rows;
}
function LEFT_recursive_function($member_id,&$ltot,&$counter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot2 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,member_status,sponsor_id,sponsor_code,member_name,member_position,under_referal_code,under_referal_id FROM tbl_member WHERE under_referal_id='$member_id' and sponsor_id!='' and member_position='Left' ORDER BY member_id ASC";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
$data1=mysql_fetch_assoc($res);
//print_r($data1);
$ltempstr = $data1['member_id'];
$counter=$counter+1;
LEFT_recursive_function($data1['member_id'],$ltot,$counter);
$ltot=$ltot.",".$ltempstr;
}
}

function RIGHT_recursive_function($member_id,&$rtot,&$rcounter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot3 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,member_status,sponsor_id,sponsor_code,member_name,member_position,under_referal_code,under_referal_id FROM tbl_member WHERE under_referal_id='$member_id' and sponsor_id!='' and member_position='Right' ORDER BY member_id ASC";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
$data1=mysql_fetch_assoc($res);
$rtempstr = $data1['member_id'];
$rcounter=$rcounter+1;
RIGHT_recursive_function($data1['member_id'],$rtot,$rcounter);
$rtot=$rtot.",".$rtempstr;
}
}

function _Level_recursive_function($member_id,&$ltot,&$counter,$current_level) 
{
    $tot2 = array();
    $sqlA = "SELECT * FROM tbl_level where promoterId='$member_id' and plan_id='$current_level'";
    $res=mysql_query($sqlA) or die ("2Fail recursive");
    $totrow = mysql_num_rows($res);
    if($totrow>0)
    {
        while($data1=mysql_fetch_assoc($res))
        {
            $ltempstr = $data1['memberId'];
            $counter=$counter+1;
            _Level_recursive_function($data1['memberId'],$ltot,$counter,$current_level);
            $ltot=$ltot.",".$ltempstr;
        }
    }
}
function leftrecursive_function($member_id,&$ltot,&$counter) 
{
$tot2 = array();
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
    if($totrow>0)
    {
        while($data1=mysql_fetch_assoc($res))
        {
            $ltempstr = $data1['member_id'];
            $counter=$counter+1;
            leftrecursive_function($data1['member_id'],$ltot,$counter);
            $ltot=$ltot.",".$ltempstr;
        }
    }
}

function leftrecursive_function_withActiveStatus($member_id,&$ltot,&$counter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot2 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
while($data1=mysql_fetch_assoc($res)){
$ltempstr = $data1['member_id'];
$counter=$counter+1;
leftrecursive_function_withActiveStatus($data1['member_id'],$ltot,$counter);
if($data1['member_status']==1)
$ltot=$ltot.",".$ltempstr;
}
}
}

function leftrecursive_function_withDeActiveStatus($member_id,&$ltot,&$counter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot2 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
while($data1=mysql_fetch_assoc($res)){
$ltempstr = $data1['member_id'];
$counter=$counter+1;
leftrecursive_function_withDeActiveStatus($data1['member_id'],$ltot,$counter);
if($data1['member_status']==0)
$ltot=$ltot.",".$ltempstr;
}
}
}


function rightrecursive_function_withActiveStatus($member_id,&$rtot,&$rcounter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot3 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
while($data1=mysql_fetch_assoc($res)){
$rtempstr = $data1['member_id'];
$rcounter=$rcounter+1;
rightrecursive_function_withActiveStatus($data1['member_id'],$rtot,$rcounter);
if($data1['member_status']==1)
$rtot=$rtot.",".$rtempstr;
}
}
}

function rightrecursive_function_withDeActiveStatus($member_id,&$rtot,&$rcounter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot3 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code,member_status FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
while($data1=mysql_fetch_assoc($res)){
$rtempstr = $data1['member_id'];
$rcounter=$rcounter+1;
rightrecursive_function_withDeActiveStatus($data1['member_id'],$rtot,$rcounter);
if($data1['member_status']==0)
$rtot=$rtot.",".$rtempstr;
}
}
}


function rightrecursive_function($member_id,&$rtot,&$rcounter) {
// USEFUL IF YOU WANT TO STOP AT A CERTAIN LEVEL
$tot3 = array();
//DO THE SIMPLE QUERY - PARENT VALUE
if($member_id!='')
$sqlA = "SELECT member_id,member_code,sponsor_id,under_referal_id,sponsor_code FROM tbl_member WHERE under_referal_id='$member_id'";
$res=mysql_query($sqlA) or die ("2Fail recursive");
$totrow = mysql_num_rows($res);
if($totrow>0)
{
while($data1=mysql_fetch_assoc($res)){
$rtempstr = $data1['member_id'];
$rcounter=$rcounter+1;
rightrecursive_function($data1['member_id'],$rtot,$rcounter);
$rtot=$rtot.",".$rtempstr;
}
}
}
############################################################
function count_record($table_name,$field,$cond){
	$sqlcount="select COUNT($field) from $table_name $cond";
	$rscount=mysql_query($sqlcount) or die(mysql_error());
	$count=mysql_fetch_assoc($rscount);
	return $count;
}
############################################################
function get_dd_mm_yy($start='',$end='',$order='',$edit=''){
	if($order!=''){
		for($i=$start;$i<=$end;$i++){
			if($i<10)
			$ii='0'.$i;
		    else
			$ii=$i;
			if($edit==$ii)
			 $list.="<option value='$ii' selected>$ii</option>";
		   else
			$list.="<option value='$ii'>$ii</option>";
		}
	}
	else{
		for($i=$end;$i>=$start;$i--){
			if($i<10)
			$ii='0'.$i;
		    else
			$ii=$i;
			if($edit==$ii)
			 $list.="<option value='$ii' selected>$ii</option>";
		   else
			$list.="<option value='$ii'>$ii</option>";
		}
	}
	return $list;
}
##########################################
function get_single_field_value($table_name,$field_name,$con)
{  
	if($_SESSION['counter']=="" || $_SESSION['counter']==0)
	{
	  $_SESSION['counter']=1;
	  $sqlcount="select $field_name from $table_name $con";
	  $rscount=mysql_query($sqlcount);
	  if(mysql_num_rows($rscount))
	  {
		$counter=mysql_fetch_assoc($rscount);
		$count=$counter[$field_name]+1;
		$query="UPDATE $table_name SET count_no='$count' $con";
		$res=mysql_query($query);
		return $count;
	  }
	}
	else
	 {
	  $sqlcount="select $field_name from $table_name $con";
	  $rscount=mysql_query($sqlcount);
	  $counter=mysql_fetch_assoc($rscount);
	  return $counter[$field_name];   
	  }
  
}
####################################################### function Mobile validation
function mobile_validation($phone)
{
	$phone=test_input($phone);
	if(preg_match('/^\d{10}$/', $phone))
    return true;
    else
	return false;
   
}
function aadhar_validation($uid)
{
	$uid=test_input($uid);
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
####################################################### function for special character
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
####################################################### function for dropdown list
function get_dropdown_list($tbale="",$col_id="",$col_name="",$edit_id="",$cond="",$field1='')
{
  
	$sql="select * from $tbale $cond";
	$rs=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rs)>0)
	{
		$list="";
		while($data=mysql_fetch_assoc($rs))
		{
			$id=$data[$col_id];
			$name=$data[$col_name];
			if($field1!='')
			$name.=' - '.$data[$field1];
			if($edit_id==$id)
			$list.="<option value='$id' selected='selected'>$name </option>";
		    else
			$list.="<option value='$id'>$name</option>";
		
		}
		return $list;
	} 
	
}
#########################################################  function for fetch all record from tables
function fetch_all_record_function($table_name='',$col_id='',$col_name='',$cond='')
{
	if($cond=='')
	 $sql="select * from $table_name";
	else
	 $sql="select * from $table_name $cond";	
	  
	  $ArrayData=array();
	  $rssql=mysql_query($sql) or die(mysql_error());
	  if(mysql_num_rows($rssql))
	  {
		  while($data=mysql_fetch_assoc($rssql))
		  {
			  $ArrayData[$data[$col_id]]=$data[$col_name];
		  }
		  return $ArrayData;
	  }
	  else{
		  return false;
	  }	  
}

################################################################## function for global uploads
function global_file_upload_function($files,$field_name,$upload_path,$upload_path_small)
{
  $allow_extension=array("jpg","png","gif","JPG","PNG","GIF","jpeg","JPEG");
  $new=explode(".",$files[$field_name]['name']);
  $file_extension=end($new);

  if(in_array($file_extension,$allow_extension))
  {
   if($files['size']<25000 && $files['error']==0)
   {
	   $new_file_name=time()."_".$files[$field_name]['name'];
if($file_extension=="jpg" || $file_extension=="jpeg" || $file_extension=='JPG' || $file_extension=='JPEG' )
{
$uploadedfile = $files[$field_name]['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($file_extension=="png" || $file_extension=="PNG")
{
$uploadedfile = $files[$field_name]['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
list($width,$height)=getimagesize($uploadedfile);
$newwidth=458;
//$newheight=($height/$width)*$newwidth;
$newheight=458;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=458;
//$newheight1=($height/$width)*$newwidth1;
$newheight1=458;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

//$filename = $upload_path.$files[$field_name]['name'];

$filename1 = $upload_path_small.$new_file_name;

//imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
//imagedestroy($tmp);
imagedestroy($tmp1);
   if(move_uploaded_file($files[$field_name]['tmp_name'],$upload_path.$new_file_name))
   return $new_file_name;
   else
   return 1;  
   }
   else
   {
		$msg="File Size exceeded.!";
		return 2; 
   }
  }
  else
  {
    $msg="File Format Does Not Allow To Upload.!";
	return 3;
  }
}
################################################################## function for fetch multiple fields from tables / single rows
function get_multi_value($table_name,$col_name,$con)
{
 $sql="select * from $table_name $con";
 $rs=mysql_query($sql) or die(mysql_error());

 if(mysql_num_rows($rs)>0)
 {
  $record=mysql_fetch_assoc($rs);
 return $record; 
 }
 else{
return "0";
 }
}

function get_selected_filed_value($table_name,$field_name='',$con)
{
 if($field_name=='')
 $field_name='*';
 
 $sql="select $field_name from $table_name $con";
 $rs=mysql_query($sql) or die(mysql_error());

 if(mysql_num_rows($rs)>0)
 {
  $record=mysql_fetch_assoc($rs);
  return $record; 
 }
 else{
return "0";
 }
}
function get_All_Records($table_name,$col_name,$con)
{
 $sql="select * from $table_name $con";
 $rs=mysql_query($sql) or die($sql.''.mysql_error());
 $list = array();
 while($data = mysql_fetch_assoc($rs))
 {
    $list[] = $data;
 }
 
 return $list;
}
################################################################## function for checkbox list
function get_checkboxList($table_name="",$column_id="",$column_name="",$check_name="",$selected="",$cond="")
{ 
	if($selected!="")
	$sel_array = explode(",",$selected);
	if($cond=="")
	$SQL="SELECT * FROM $table_name ORDER BY $column_name ASC";
	else
	$SQL="$cond";
	
	$rs=mysql_query($SQL) or die(mysql_error());
	$checklist="";
	while($data = mysql_fetch_assoc($rs))
	{
		if(in_array($data[$column_name],$sel_array))
		{
			$checklist .= "<input type='checkbox' value='$data[$column_name]' name='$check_name' CHECKED>$data[$column_name]<br>";
		}
		else
		{
			$checklist .= "<input type='checkbox' value='$data[$column_name]' name='$check_name'>$data[$column_name]<br>";
		}
	}
	return $checklist;
}
################################################################## function for get income from tables
function get_income_ammount($table_name,$col_name,$cond) 
{
  $sql="select sum($col_name) from $table_name $cond";

  $res=mysql_query($sql) or die(mysql_error());
  $row=mysql_num_rows($res);
  if($row>0)
  {
	 $dd=mysql_fetch_assoc($res);
	 return $dd["sum($col_name)"];
 }
 else
 {
 return 0;
 }
}
################################################################## function for max id or serial no.
function getmax_serial_no($table,$col_id,$cond)
{
  $sql="select max($col_id) from $table $cond";
  $rs=mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($rs))
  {
	$data=mysql_fetch_assoc($rs);
	
	$max=$data["max($col_id)"];
	return ++$max;
  }
  else
  {
  return "1";
  }
}
################################################################## function for fetch single field value from table
function get_value_new($table_name,$col_name,$con)
{
 $sql="select $col_name from $table_name $con";
 $rs=mysql_query($sql) or die(mysql_error());
 $data=mysql_fetch_assoc($rs) or die(mysql_error());
 return $data[$col_name]; 
} 
################################################################## function for fetch single field value from table
function get_value($table_name,$col_name,$con)
{
 $sql="select $col_name from $table_name $con";
 $rs=mysql_query($sql) or die(mysql_error());
 $data=mysql_fetch_assoc($rs) or die(mysql_error());
 return $data[$col_name]; 
} 
################################################################## function for max id or serial no.
function getmaxid_new($table,$col_id,$con="")
{
  $sql="select max($col_id) from $table $con";
  $rs=mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($rs))
  {
	$data=mysql_fetch_assoc($rs);
	
	$max=$data["max($col_id)"];
	return ++$max;
  }
  else
  {
  return "1";
  }
}
################################################################## function for return controls
function return_control_function($Request)
{
$req='';
foreach($Request as $k=>$v)
  {
   $req.="&".$k."=".$v;
  }
  return $req;

}
################################################################## function for find total record in a tables
function get_total_record($table_name,$cond="")
{
  if($cond!='')
  {
  $sql="select * from $table_name $cond";
  }
  else{
  $sql="select * from $table_name";
  }
  //echo $sql; die;
  $rs=mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($rs))
  return mysql_num_rows($rs);
}
################################################################## function for check login
function global_login($table_name='',$cond='')
{
   $sqllogin="select * from $table_name $cond";
   $rslogin=mysql_query($sqllogin) or die(mysql_error());
   if(mysql_num_rows($rslogin)>0)
   {
     return true;
   }
   else
   {
     return false;
   }
}
################################################################## function for check record
function sqlCheckRecord($data)
{
  $sqlcheck=mysql_query($data) or die(mysql_error());
  if(mysql_num_rows($sqlcheck)>0)
  $rscheck=mysql_fetch_assoc($sqlcheck);
  else
  $rscheck=false;
  return $rscheck;
}
################################################################## function for executing the query
function insertQuery($data,$id='')
{
  $resultset=mysql_query($data) or die(mysql_error());
  if($id=='')
  $currentid=mysql_insert_id($resultset);
  else
  $currentid=$id;
    
  return $currentid;
}

function updateQuery($data)
{
  mysql_query($data) or die(mysql_error());
  if(mysql_query($data))
  return true;
  else
  return false;
}

function convertNumberToWordsForIndia($number){
        //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
        $words = array(
        '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
        '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
        '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
        '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
        '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
        '80' => 'eighty','90' => 'ninty');
        
        //First find the length of the number
        $number_length = strlen($number);
        //Initialize an empty array
        $number_array = array(0,0,0,0,0,0,0,0,0);        
        $received_number_array = array();
        
        //Store all received numbers into an array
        for($i=0;$i<$number_length;$i++){    $received_number_array[$i] = substr($number,$i,1);    }

        //Populate the empty array with the numbers received - most critical operation
        for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ $number_array[$i] = $received_number_array[$j]; }
        $number_to_words_string = "";        
        //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for($i=0,$j=1;$i<9;$i++,$j++){
            if($i==0 || $i==2 || $i==4 || $i==7){
                if($number_array[$i]=="1"){
                    $number_array[$j] = 10+$number_array[$j];
                    $number_array[$i] = 0;
                }        
            }
        }
        
        $value = "";
        for($i=0;$i<9;$i++){
            if($i==0 || $i==2 || $i==4 || $i==7){   $value = $number_array[$i]*10; }
            else{ $value = $number_array[$i];    }            
            
			if($value!=0){ $number_to_words_string.= $words["$value"]." "; }
			 
            if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
            if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
            if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }	
			if($i==5 && $value==0){    $number_to_words_string.= "Thousand "; }			
            if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }
        }
        if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
        return ucwords(strtolower($number_to_words_string)." Only.");
    }
    
    //Output ==> Indian Rupees Ninty Eight Crores Seventy Six Lakhs Fifty Four Thousand Three Hundred & Twenty One Only.

function _php_mailer($email_address,$subject,$message,$first_content='',$second_content='',$footer_content='')
{

	global $sitedata;
	global $admin_path;
	global $front_url;
	global $base_url;
	$domain_url = $front_url;
	$sitename=$sitedata['site_name'];
	$team = $sitename.' Team';
	if($sitedata['site_logo']!='')
	$logo_path = $admin_path.'uploads/'.$sitedata['site_logo'];
	else
	$logo_path='';
	//$logo_path = $admin_path.'uploads/a5019e3d-c433-4292-85c6-229a8d9e5cb7.jpg';	
	$play_store_url = $front_url.'images/play-store.jpg';
	$app_store_url = $front_url.'images/appstore.png';
	$logo_url = "<a href='$front_url' target='_blank'><img src='$logo_path' title='$sitename' alt='$sitename' height='100' width='100%' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;'></a>";	
	$sqlQuery="select * from tbl_mailer where id='1' and is_status=1";
	$rsQuery=mysql_query($sqlQuery) or die($sqlQuery.''.mysql_error());
	if(mysql_num_rows($rsQuery))
	{
		$mailer=mysql_fetch_assoc($rsQuery);
		$template="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>Play2btc</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
		</head>
		<body style='margin: 0; padding: 0;'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
				<tr>
					<td style='padding: 10px 0 30px 0;'>
						<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>
							<tr>
								<td align='center' bgcolor='#70bbd9' style='padding: 00px 0 0px 0; color: #153643; font-size: 20px; font-weight: bold; font-family: Arial, sans-serif;'>
								   <h1 align='center'>$sitename</h1>
								</td>
							</tr>
							<tr>
								<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
									<table border='0' cellpadding='0' cellspacing='0' width='100%'>
										<tr>
											<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
												<b>$first_content</b>                                    </td>
										</tr>
										<tr>
											<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
											   $message                                    </td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor='#ee4c50' style='padding: 30px 30px 30px 30px;'>
									<table border='0' cellpadding='0' cellspacing='0' width='100%'>
										<tr>
											<td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;'>
												<div align='center'><a href='$front_url' style='color: #ffffff; text-decoration:none;'>
															  &copy; $sitename Team
												</a>
												</div>
												<table border='0' cellpadding='0' cellspacing='0'>
													<tr>
														<td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;'>                                                </td>
														<td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
														<td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;'>                                                </td>
													</tr>
											</table></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</body>
		</html>";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: $sitename<$mailer[user_name]>" . "\r\n";
		$headers .= "Cc: $site_owner_email" . "\r\n";
		mail($email_address,$subject,$template,$headers); 
		
	}
   
}
?>