<?php
date_default_timezone_set("Asia/Calcutta");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servers = [
    // [
    //     "servername" => "localhost",
    //     "username" => "root", // Replace with your database username
    //     "password" => "", // Replace with your database password
    //     "dbname" => "u358688394_aura3"
    // ],
    [
        "servername" => "89.117.27.118",
        "username" => "u600364601_newhimallya",
        "password" => "[n5Et8xJ",
        "dbname" => "u600364601_newhimallya"
    ]
];

// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = null;
$connected = false;
$error_message = '';

foreach ($servers as $server) {
    try {
        $connection = new mysqli($server['servername'], $server['username'], $server['password'], $server['dbname']);
        if ($connection->connect_error) {
            throw new Exception("Connection failed: " . $connection->connect_error);
        } else {
            // echo "Connected & server Name rn is ".$server['servername'] ;
            $connected = true;
            break;
        }
    } catch (Exception $e) {
        error_log("Connection attempt failed: " . $e->getMessage());
        $error_message = "Connection attempt failed: " . $e->getMessage();
    }
}

if (!$connected) {
    die('Connection could not be made to the SQL Server. Please report this system error at <font color="blue">info@servername.com</font><br>Error: ' . htmlspecialchars($error_message));
}
?>
