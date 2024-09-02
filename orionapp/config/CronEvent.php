<?php



echo $url="https://maruticoin.io/token";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $contents = curl_exec($ch);
echo $result=json_decode($contents,true);

echo "Success";

?>