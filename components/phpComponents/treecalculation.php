<?php

function getInvestments($userId, $level = 0)
{
    $servers = [
        [
            "servername" => "localhost",
            "username" => "root", // Replace with your database username
            "password" => "", // Replace with your database password
            "dbname" => "u358688394_aura3"
        ],
        [
            "servername" => "82.180.167.190",
            "username" => "u358688394_aura3",
            "password" => "umDvTH@4",
            "dbname" => "u358688394_aura3"
        ]
    ];

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
    $query = "SELECT * FROM tbl_binary WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $nodeData = mysqli_fetch_assoc($result);
    mysqli_close($connection);

    $totalInvestment = isset($nodeData['topup_amount']) ? $nodeData['topup_amount'] : null;
    $leftTreeInvestment = 0;
    $rightTreeInvestment = 0;
    $totalDirectBusiness = 0;
    $directLeftBusiness = 0;
    $directRightBusiness = 0;
    $totalTreeMembers = 1;
    $leftTreeMembers = 0;
    $rightTreeMembers = 0;

    if (isset($nodeData['referrer_id']) && $nodeData['referrer_id'] == $_SESSION['member_user_id']) {
        $totalDirectBusiness += $nodeData['topup_amount'];
        if ($nodeData['position'] == 'left') {
            $directLeftBusiness += $nodeData['topup_amount'];
        } elseif ($nodeData['position'] == 'right') {
            $directRightBusiness += $nodeData['topup_amount'];
        }
    }

    if (isset($nodeData['lower_id_left']) && $nodeData['lower_id_left']) {
        $leftTreeResult = getInvestments($nodeData['lower_id_left'], $level + 1);
        $totalInvestment += $leftTreeResult['totalInvestment'];
        $leftTreeInvestment = $leftTreeResult['totalInvestment'];
        $totalDirectBusiness += $leftTreeResult['totalDirectBusiness'];
        $directLeftBusiness += $leftTreeResult['directLeftBusiness'];
        $directRightBusiness += $leftTreeResult['directRightBusiness'];
        $totalTreeMembers += $leftTreeResult['totalTreeMembers'];
        $leftTreeMembers += $leftTreeResult['totalTreeMembers'];
    }

    if (isset($nodeData['lower_id_right']) && $nodeData['lower_id_right']) {
        $rightTreeResult = getInvestments($nodeData['lower_id_right'], $level + 1);
        $totalInvestment += $rightTreeResult['totalInvestment'];
        $rightTreeInvestment = $rightTreeResult['totalInvestment'];
        $totalDirectBusiness += $rightTreeResult['totalDirectBusiness'];
        $directLeftBusiness += $rightTreeResult['directLeftBusiness'];
        $directRightBusiness += $rightTreeResult['directRightBusiness'];
        $totalTreeMembers += $rightTreeResult['totalTreeMembers'];
        $rightTreeMembers += $rightTreeResult['totalTreeMembers'];
    }

    return array(
        'totalInvestment' => $totalInvestment,
        'leftTreeInvestment' => $leftTreeInvestment,
        'rightTreeInvestment' => $rightTreeInvestment,
        'totalDirectBusiness' => $totalDirectBusiness,
        'directLeftBusiness' => $directLeftBusiness,
        'directRightBusiness' => $directRightBusiness,
        'totalTreeMembers' => $totalTreeMembers,
        'leftTreeMembers' => $leftTreeMembers,
        'rightTreeMembers' => $rightTreeMembers
    );
}

$member_user_id = $_SESSION['member_user_id'];
$investmentResult = getInvestments($member_user_id);

//

// Print the results
// echo "Total Investment: ". $investmentResult['totalInvestment']. "<br>";
// echo "Left Tree Investment: ". $investmentResult['leftTreeInvestment']. "<br>";
// echo "Right Tree Investment: ". $investmentResult['rightTreeInvestment']. "<br>";
// echo "Total Direct Business: ". $investmentResult['totalDirectBusiness']. "<br>";
// echo "Direct Left Business: ". $investmentResult['directLeftBusiness']. "<br>";
// echo "Direct Right Business: ". $investmentResult['directRightBusiness']. "<br>";

?>