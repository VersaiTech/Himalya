<?php
// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$servers = [
    [
        "servername" => "localhost",
        "username" => "root",
        "password" => "",
        "dbname" => "u358688394_aura3"
    ],
    // [
    //     "servername" => "82.180.167.190",
    //     "username" => "u358688394_aura3",
    //     "password" => "umDvTH@4",
    //     "dbname" => "u358688394_aura3"
    // ]
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


$date = date("Y-m-d");
$sys_date = date('Y-m-d');

class Node
{
    public $id;
    public $lower_id_left;
    public $lower_id_right;
}

function getNodeFromDB($userId)
{
    $connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");
    $query = "SELECT * FROM tbl_binary WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $nodeData = mysqli_fetch_assoc($result);
    mysqli_close($connection);

    $node = new Node();
    $node->id = $nodeData['user_id'];
    $node->lower_id_left = $nodeData['lower_id_left'];
    $node->lower_id_right = $nodeData['lower_id_right'];

    return $node;
}


function checkRefferal($userId){

    $connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");

    $query = "SELECT * FROM tbl_binary WHERE referrer_id = '$userId' AND position = 'Left'";

    $result = mysqli_query($connection, $query);



    if (mysqli_num_rows($result) > 0) {

    } else {
        return false;
    }

    $query2 = "SELECT * FROM tbl_binary WHERE referrer_id = '$userId' AND position = 'Right'";

    $result2 = mysqli_query($connection, $query2);

    mysqli_close($connection);

    if (mysqli_num_rows($result2) > 0) {
        return true;
    } else {
        return false;
    }

}



function updateMatchingIncomeInDB($userId, $bonusAmount, $complete_level)
{
    $connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");

    $todayDate = date("Y-m-d");

    $qry = "SELECT * FROM tbl_binary WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $qry);
    $row = mysqli_fetch_assoc($result);

    if ($row['today_matching_bonus_received'] == $todayDate) {
        // echo "inside";
        if ($row['today_maching_income'] >= $row['capping_limit']) {
            echo $userId . " capping limit exceeded. Cannot update matching income." . "<br>";
            return;
        }
    }

    $query = "UPDATE tbl_binary SET matching_income = matching_income + '$bonusAmount', today_matching_bonus_received = '$todayDate', complete_level = '$complete_level', today_maching_income = '$bonusAmount' WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    if ($result) {
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
        return; // Exit the function on error
    }



    $query = "UPDATE tbl_memberreg 
    SET 
        wallet_amount = wallet_amount + '$bonusAmount', 
        total_earning = total_earning + '$bonusAmount' 
    WHERE member_user_id = '$userId'";


    mysqli_query($connection, $query);
    mysqli_close($connection);

    echo "User ID: $userId, Matching Income: $bonusAmount", "<br>";
}





function calculateMatchingBonus($userId, $level, $bonusAmount, $complete_level,  &$visited = array())
{
    usleep(100000);
    $node = getNodeFromDB($userId);



    if ($level > 5 || in_array($userId, $visited))
        return 0;
    $visited[] = $userId;

    $totalNodes = 1;

    $childNodes = getChildNodes($node);

    if(!checkRefferal($userId)){
        echo "no refferal found " . $userId . "<br>";
        return;
    }


    if ($level == 1) {

        if ($complete_level  >= 1) {
            return;
        }

        if (count($childNodes) == 2) {
            $leftChild = $childNodes[0];
            $rightChild = $childNodes[1];
            $leftGrandChildren = getChildNodes($leftChild);
            $rightGrandChildren = getChildNodes($rightChild);
            if (count($leftGrandChildren) > 0 || count($rightGrandChildren) > 0) {
                updateMatchingIncomeInDB($userId, $bonusAmount, 1);
                return 1;
            }
        }
    }

    echo "userid: " . $userId . " " . count(getGreatChildren($childNodes)) . "<br>";


    // if ($level === 2) {
    //     $childNodesCount = count($childNodes);
    //     $greatChildrenCount = count(getGreatChildren($childNodes));
    //     $greatGrandChildrenCount = count(getGreatGrandChild($childNodes));

    //     if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount >= 1) {
    //         updateMatchingIncomeInDB($userId, $bonusAmount);
    //     }
    // }

    
    if ($level == 2) {

        if ($complete_level  >= 2) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);
            }
        }

        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 2);
            return 1;
        }
    }

    if ($level == 3) {
        if ($complete_level  >= 3) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;
        $greatGrandGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);

                foreach ($greatGrandChildren as $greatGrandChild) {
                    $greatGrandGrandChildren = getChildNodes($greatGrandChild);
                    $greatGrandGrandChildrenCount += count($greatGrandGrandChildren);
                }
            }
        }

        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount === 8 && $greatGrandGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 3);
            return 1;
        }
    }


    if ($level == 4) {
        if ($complete_level  >= 4) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;
        $greatGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);

                foreach ($greatGrandChildren as $greatGrandChild) {
                    $greatGrandGrandChildren = getChildNodes($greatGrandChild);
                    $greatGrandGrandChildrenCount += count($greatGrandGrandChildren);

                    foreach ($greatGrandGrandChildren as $greatGrandGrandChild) {
                        $greatGrandGrandGrandChildren = getChildNodes($greatGrandGrandChild);
                        $greatGrandGrandGrandChildrenCount += count($greatGrandGrandGrandChildren);
                    }
                }
            }
        }

        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount === 8 && $greatGrandGrandChildrenCount === 16 && $greatGrandGrandGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 4);
            return 1;
        }
    }

    if ($level == 5) {
        if ($complete_level  >= 5) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;
        $greatGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);

                foreach ($greatGrandChildren as $greatGrandChild) {
                    $greatGrandGrandChildren = getChildNodes($greatGrandChild);
                    $greatGrandGrandChildrenCount += count($greatGrandGrandChildren);

                    foreach ($greatGrandGrandChildren as $greatGrandGrandChild) {
                        $greatGrandGrandGrandChildren = getChildNodes($greatGrandGrandChild);
                        $greatGrandGrandGrandChildrenCount += count($greatGrandGrandGrandChildren);

                        foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                            $greatGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandChild);
                            $greatGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandChildren);
                        }
                    }
                }
            }
        }

        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount === 8 && $greatGrandGrandChildrenCount === 16 && $greatGrandGrandGrandChildrenCount === 32 && $greatGrandGrandGrandGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 5);
            return 1;
        }
    }

    if ($level == 6) {
        if ($complete_level  >= 6) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;
        $greatGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);

                foreach ($greatGrandChildren as $greatGrandChild) {
                    $greatGrandGrandChildren = getChildNodes($greatGrandChild);
                    $greatGrandGrandChildrenCount += count($greatGrandGrandChildren);

                    foreach ($greatGrandGrandChildren as $greatGrandGrandChild) {
                        $greatGrandGrandGrandChildren = getChildNodes($greatGrandGrandChild);
                        $greatGrandGrandGrandChildrenCount += count($greatGrandGrandGrandChildren);

                        foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                            $greatGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandChild);
                            $greatGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandChildren);

                            foreach ($greatGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandChild) {
                                $greatGrandGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandGrandChild);
                                $greatGrandGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandGrandChildren);
                            }
                        }
                    }
                }
            }
        }

        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount === 8 && $greatGrandGrandChildrenCount === 16 && $greatGrandGrandGrandChildrenCount === 32 && $greatGrandGrandGrandGrandChildrenCount === 64 && $greatGrandGrandGrandGrandGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 6);
            return 1;
        }
    }

    if ($level == 7) {
        if ($complete_level  >= 7) {
            return;
        }
        $childNodesCount = count($childNodes);
        $greatChildrenCount = 0;
        $greatGrandChildrenCount = 0;
        $greatGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandGrandChildrenCount = 0;
        $greatGrandGrandGrandGrandGrandGrandChildrenCount = 0;

        foreach ($childNodes as $childNode) {
            $greatChildren = getChildNodes($childNode);
            $greatChildrenCount += count($greatChildren);

            foreach ($greatChildren as $greatChild) {
                $greatGrandChildren = getChildNodes($greatChild);
                $greatGrandChildrenCount += count($greatGrandChildren);

                foreach ($greatGrandChildren as $greatGrandChild) {
                    $greatGrandGrandChildren = getChildNodes($greatGrandChild);
                    $greatGrandGrandChildrenCount += count($greatGrandGrandChildren);

                    foreach ($greatGrandGrandChildren as $greatGrandGrandChild) {
                        $greatGrandGrandGrandChildren = getChildNodes($greatGrandGrandChild);
                        $greatGrandGrandGrandChildrenCount += count($greatGrandGrandGrandChildren);

                        foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                            $greatGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandChild);
                            $greatGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandChildren);

                            foreach ($greatGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandChild) {
                                $greatGrandGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandGrandChild);
                                $greatGrandGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandGrandChildren);

                                foreach ($greatGrandGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandGrandChild) {
                                    $greatGrandGrandGrandGrandGrandGrandChildren = getChildNodes($greatGrandGrandGrandGrandGrandChild);
                                    $greatGrandGrandGrandGrandGrandGrandChildrenCount += count($greatGrandGrandGrandGrandGrandGrandChildren);
                                }
                            }
                        }
                    }
                }
            }
        }
        if ($childNodesCount === 2 && $greatChildrenCount === 4 && $greatGrandChildrenCount === 8 && $greatGrandGrandChildrenCount === 16 && $greatGrandGrandGrandChildrenCount === 32 && $greatGrandGrandGrandGrandChildrenCount === 64 && $greatGrandGrandGrandGrandGrandChildrenCount >= 128 && $greatGrandGrandGrandGrandGrandGrandChildrenCount >= 1) {
            updateMatchingIncomeInDB($userId, $bonusAmount, 7);
            return 1;
        }
    }

    return $totalNodes;
}

function getGreatChildren($childNodes)
{
    $greatChildren = array();
    foreach ($childNodes as $childNode) {
        if ($childNode->lower_id_left != 0) {
            $greatChildren[] = getNodeFromDB($childNode->lower_id_left);
        }
        if ($childNode->lower_id_right != 0) {
            $greatChildren[] = getNodeFromDB($childNode->lower_id_right);
        }
    }
    return $greatChildren;
}

function getGreatGrandChild($childNodes)
{
    $greatGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            if ($greatChild->lower_id_left != 0) {
                $greatGrandChild[] = getNodeFromDB($greatChild->lower_id_left);
                break;
            }
            if ($greatChild->lower_id_right != 0) {
                $greatGrandChild[] = getNodeFromDB($greatChild->lower_id_right);
                break;
            }
        }
    }
    return $greatGrandChild;
}


function getGreatGreatGrandChild($childNodes)
{
    $greatGreatGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            $greatGrandChildren = getGreatGrandChild(array($greatChild));
            foreach ($greatGrandChildren as $greatGrandChild) {
                if ($greatGrandChild->lower_id_left != 0) {
                    $greatGreatGrandChild[] = getNodeFromDB($greatGrandChild->lower_id_left);
                    break;
                }
                if ($greatGrandChild->lower_id_right != 0) {
                    $greatGreatGrandChild[] = getNodeFromDB($greatGrandChild->lower_id_right);
                    break;
                }
            }
        }
    }
    return $greatGreatGrandChild;
}


function getGreatGrandGrandChild($childNodes)
{
    $greatGrandGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            $greatGrandChildren = getGreatGrandChild(array($greatChild));
            foreach ($greatGrandChildren as $greatGrandChild) {
                $greatGreatGrandChildren = getGreatGreatGrandChild(array($greatGrandChild));
                foreach ($greatGreatGrandChildren as $greatGreatGrandChild) {
                    if ($greatGreatGrandChild->lower_id_left != 0) {
                        $greatGrandGrandChild[] = getNodeFromDB($greatGreatGrandChild->lower_id_left);
                        break;
                    }
                    if ($greatGreatGrandChild->lower_id_right != 0) {
                        $greatGrandGrandChild[] = getNodeFromDB($greatGreatGrandChild->lower_id_right);
                        break;
                    }
                }
            }
        }
    }
    return $greatGrandGrandChild;
}

function getGreatGrandGrandGrandChild($childNodes)
{
    $greatGrandGrandGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            $greatGrandChildren = getGreatGrandChild(array($greatChild));
            foreach ($greatGrandChildren as $greatGrandChild) {
                $greatGreatGrandChildren = getGreatGreatGrandChild(array($greatGrandChild));
                foreach ($greatGreatGrandChildren as $greatGreatGrandChild) {
                    $greatGrandGrandGrandChildren = getGreatGrandGrandChild(array($greatGreatGrandChild));
                    foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                        if ($greatGrandGrandGrandChild->lower_id_left != 0) {
                            $greatGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandChild->lower_id_left);
                            break;
                        }
                        if ($greatGrandGrandGrandChild->lower_id_right != 0) {
                            $greatGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandChild->lower_id_right);
                            break;
                        }
                    }
                }
            }
        }
    }

    return $greatGrandGrandGrandChild;
}

function getGreatGrandGrandGrandGrandChild($childNodes)
{
    $greatGrandGrandGrandGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            $greatGrandChildren = getGreatGrandChild(array($greatChild));
            foreach ($greatGrandChildren as $greatGrandChild) {
                $greatGreatGrandChildren = getGreatGreatGrandChild(array($greatGrandChild));
                foreach ($greatGreatGrandChildren as $greatGreatGrandChild) {
                    $greatGrandGrandGrandChildren = getGreatGrandGrandChild(array($greatGreatGrandChild));
                    foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                        $greatGrandGrandGrandGrandChildren = getGreatGrandGrandGrandChild(array($greatGrandGrandGrandChild));
                        foreach ($greatGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandChild) {
                            if ($greatGrandGrandGrandGrandChild->lower_id_left != 0) {
                                $greatGrandGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandGrandChild->lower_id_left);
                                break;
                            }
                            if ($greatGrandGrandGrandGrandChild->lower_id_right != 0) {
                                $greatGrandGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandGrandChild->lower_id_right);
                                break;
                            }
                        }
                    }
                }
            }
        }
    }
    return $greatGrandGrandGrandGrandChild;
}

// ============================================================================================================================================================
// this below code is for level7
function getGreatGrandGrandGrandGrandGrandChild($childNodes)
{
    $greatGrandGrandGrandGrandGrandChild = array();
    foreach ($childNodes as $childNode) {
        $greatChildren = getGreatChildren($childNode);
        foreach ($greatChildren as $greatChild) {
            $greatGrandChildren = getGreatGrandChild(array($greatChild));
            foreach ($greatGrandChildren as $greatGrandChild) {
                $greatGreatGrandChildren = getGreatGreatGrandChild(array($greatGrandChild));
                foreach ($greatGreatGrandChildren as $greatGreatGrandChild) {
                    $greatGrandGrandGrandChildren = getGreatGrandGrandChild(array($greatGreatGrandChild));
                    foreach ($greatGrandGrandGrandChildren as $greatGrandGrandGrandChild) {
                        $greatGrandGrandGrandGrandChildren = getGreatGrandGrandGrandChild(array($greatGrandGrandGrandChild));
                        foreach ($greatGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandChild) {
                            $greatGrandGrandGrandGrandGrandChildren = getGreatGrandGrandGrandGrandChild(array($greatGrandGrandGrandGrandChild));
                            foreach ($greatGrandGrandGrandGrandGrandChildren as $greatGrandGrandGrandGrandGrandChild) {
                                if ($greatGrandGrandGrandGrandGrandChild->lower_id_left != 0) {
                                    $greatGrandGrandGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandGrandGrandChild->lower_id_left);
                                    break;
                                }
                                if ($greatGrandGrandGrandGrandGrandChild->lower_id_right != 0) {
                                    $greatGrandGrandGrandGrandGrandChild[] = getNodeFromDB($greatGrandGrandGrandGrandGrandChild->lower_id_right);
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $greatGrandGrandGrandGrandGrandChild;
}
// ============================================================================================================================================================



function hasChildNode($userId)
{
    $node = getNodeFromDB($userId);
    $childNodes = getChildNodes($node);
    return count($childNodes) > 0;
}



function getChildNodes($node)
{
    $childNodes = array();
    if ($node->lower_id_left != 0) {
        $childNodes[] = getNodeFromDB($node->lower_id_left);
    }
    if ($node->lower_id_right != 0) {
        $childNodes[] = getNodeFromDB($node->lower_id_right);
    }
    return $childNodes;
}

// Example usage:
$level = 1;
$userId = 3764219;


$RStr = "Select user_id, capping_limit, complete_level from tbl_binary";
$resR = mysqli_query($connection, $RStr);
while ($rowR = mysqli_fetch_array($resR)) {
    calculateMatchingBonus($rowR['user_id'], 5, $rowR['capping_limit'], $rowR['complete_level']);
}








// working code of updateMatchingIncomeInDB
// function updateMatchingIncomeInDB($userId, $bonusAmount)
// {
//     $connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");

//     $todayDate = date("Y-m-d");

//     $query2 = "UPDATE tbl_binary SET matching_income = matching_income + '$bonusAmount' WHERE user_id = '$userId'";

//     $result = mysqli_query($connection, $query2);
//     if ($result) {
//         $row = mysqli_fetch_assoc($result);
//         echo $row['today_matching_bonus_received'] . "<br>";
//     } else {
//         echo "Error: " . $query2 . "<br>" . mysqli_error($connection);
//     }

//     if ($row['today_matching_bonus_received'] == $todayDate) {
//         echo "capping limit exit";
//         return;
//     } else {
//         $query = "UPDATE tbl_memberreg 
//         SET 
//             wallet_amount = wallet_amount + '$bonusAmount', 
//             total_earning = total_earning + '$bonusAmount' 
//         WHERE member_user_id = '$userId'";

//         $query2 = "UPDATE tbl_binary SET today_matching_bonus_received = '$todayDate' WHERE user_id = '$userId'";

//     }

//     mysqli_query($connection, $query);
//     mysqli_query($connection, $query2);

//     mysqli_close($connection);

//     echo "User ID: $userId, Matching Income: $bonusAmount", "<br>";
// }
