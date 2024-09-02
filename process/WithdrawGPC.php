<?php
ob_start();
session_start();
//print_r($_REQUEST); die;

include './config/config.php';
include './config/function.php';
$member_user_id=$_SESSION['member_user_id'];
$wallet_address=$_SESSION['wallet_address'];
$withdrawAmt=trim($_REQUEST['withdrawAmt']);
$with_referrance=trim($_REQUEST['reference_no']);
$withtype=trim($_REQUEST['withtype']);
$date=date("Y-m-d H:i:s");
$a=$withdrawAmt%1;
// if($a>0)
// {
//     echo "Withdraw is Multiple in 1 Matic";
// }
// else
if($withdrawAmt>=1000)
{
    $strW="Select * from tbl_memberreg where member_user_id='$member_user_id' and staking_wallet>=$withdrawAmt";
    
    // Ensure connection is established
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
  }
    
    $resW=mysqli_query($connection,$strW);
    if(mysqli_num_rows($resW)>0)
    {
 
        $strTr="Select with_referrance from tbl_withdraw where with_referrance='$with_referrance'";
        $resTr=mysqli_query($connection,$strTr);
        
        if(mysqli_num_rows($resTr)==0)
        {
              $Int="Insert Into tbl_withdraw(member_user_id,member_name,with_amt,reinvestment_amt,net_amt,with_referrance,with_date,with_type)values('$member_user_id','$wallet_address',$withdrawAmt,$withdrawAmt,$withdrawAmt,'$with_referrance','$date','$withtype')";
            mysqli_query($connection,$Int);
            
            $Upw="Update tbl_memberreg set staking_wallet=staking_wallet-$withdrawAmt,staking_withdraw=staking_withdraw+$withdrawAmt where member_user_id='$member_user_id'";
            mysqli_query($connection,$Upw);
            echo "Withdraw Success";
        }
        else
        {
            echo "Withdraw Success";
        }
        
    }
    else
    {
        echo "Insufficient Wallet Balance";
    }
}
else
{
    echo "Minimum Withdraw 1000 GPC Coin";
}

?>




