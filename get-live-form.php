<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $mt5group = $_POST['mt5group'];
    $leverage = $_POST['leverage'];
    echo "THe name of group is ". $mt5group ."and the nME OF LEVERAGE IS ". $leverage;
}
?>