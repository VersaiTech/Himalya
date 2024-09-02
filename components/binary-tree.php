<?php

class Node
{
    public $id;
    public $lower_id_left;
    public $lower_id_right;
    public $topup_amount;
    public $position;
    public $referrer_id;
}

function getNodeFromDB($userId)
{
    $connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");
    if (!$connection) {
        $connection = mysqli_connect("82.180.167.190", "u358688394_aura3", "umDvTH@4", "u358688394_aura3");
    }
    $query = "SELECT * FROM tbl_binary WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $nodeData = mysqli_fetch_assoc($result);
    mysqli_close($connection);

    if (!$nodeData) {
        return null; // user_id does not exist
    }

    $node = new Node();
    $node->id = $nodeData['user_id'];
    $node->lower_id_left = $nodeData['lower_id_left'];
    $node->lower_id_right = $nodeData['lower_id_right'];
    $node->topup_amount = $nodeData['topup_amount'];
    $node->position = $nodeData['position'];
    $node->referrer_id = $nodeData['referrer_id'];

    return $node;
}

function generateTree($node, $level = 0)
{
    if (!$node) {
        echo "Your investment history is empty. Please perform an investment to see your tree.";
        return;
    }

    $indent = str_repeat("  ", $level);
    echo "$indent<li>\n";
    echo "$indent  <a href=\"#\" title=\"Topup Amount: $node->topup_amount, Position: $node->position, Referral: $node->referrer_id\">$node->id</a>\n";
    if ($node->lower_id_left || $node->lower_id_right) {
        echo "$indent  <ul>\n";
        if ($node->lower_id_left) {
            $leftNode = getNodeFromDB($node->lower_id_left);
            generateTree($leftNode, $level + 1);
        }
        if ($node->lower_id_right) {
            $rightNode = getNodeFromDB($node->lower_id_right);
            generateTree($rightNode, $level + 1);
        }
        echo "$indent  </ul>\n";
    }
    echo "$indent</li>\n";
}

$node = getNodeFromDB($_SESSION['member_user_id']);

?>

<div class="tree">
    <ul>
        <?php generateTree($node); ?>
    </ul>
</div>