<?php

class Node
{
    public $user_id;
    public $member_name;
    public $topup_status;
    public $sponcer_id;
    public $sponcer_name;
}

class TreeGenerator
{
    private $connection;
    private $seenUsers = [];

    public function __construct()
    {
        // First, try to connect to the local database
        // $this->connection = mysqli_connect("localhost", "root", "", "u358688394_aura3");

        $this->connection = mysqli_connect("89.117.27.118", "u600364601_newhimallya", "[n5Et8xJ", "u600364601_newhimallya");
        
        // If the local connection fails, try the remote server connection
        if (!$this->connection) {
            // Log the error for debugging
            error_log("Local connection failed: " . mysqli_connect_error());
            
            $this->connection = mysqli_connect("89.117.27.118", "u600364601_newhimallya", "[n5Et8xJ", "u600364601_newhimallya");
            
            // Check if the remote connection was successful
            if (!$this->connection) {
                die("Remote connection failed: " . mysqli_connect_error());
            }
        }
    }

    public function __destruct()
    {
        // Close the database connection on object destruction
        mysqli_close($this->connection);
    }

    public function getNodeFromDB($userId)
    {
        $query = "SELECT * FROM tbl_memberreg WHERE member_user_id = '$userId'";
        $result = mysqli_query($this->connection, $query);
        $nodeData = mysqli_fetch_assoc($result);

        if (!$nodeData) {
            return null; // User does not exist
        }

        // Create a Node object from database result
        $node = new Node();
        $node->user_id = $nodeData['member_user_id'];
        $node->member_name = $nodeData['member_name'];
        $node->topup_status = $nodeData['topUp_status'];
        $node->sponcer_id = $nodeData['sponcer_id'];
        $node->sponcer_name = $nodeData['sponcer_name'];

        return $node;
    }

    public function generateTree($node, $level = 0)
    {
        if (!$node || isset($this->seenUsers[$node->user_id])) {
            return; // Skip if node is empty or already processed to avoid duplicates
        }

        $this->seenUsers[$node->user_id] = true; // Mark the node as processed
        $indent = str_repeat("  ", $level);

        echo "$indent<li>\n";
        echo "$indent  <a href=\"#\" title=\"TopUp Status: $node->topup_status, Sponsor: $node->sponcer_name\">$node->user_id - $node->member_name</a>\n";

        if ($level < 3) { // Limit to 3 levels
            $referredMembers = $this->getReferredMembers($node->user_id);
            if (count($referredMembers) > 0) {
                echo "$indent  <ul>\n";
                foreach ($referredMembers as $referralNode) {
                    $this->generateTree($referralNode, $level + 1);
                }
                echo "$indent  </ul>\n";
            }
        }

        echo "$indent</li>\n";
    }

    public function getReferredMembers($userId)
    {
        $query = "SELECT DISTINCT referred_user_id FROM tbl_referrals WHERE sponsor_user_id = '$userId'";
        $result = mysqli_query($this->connection, $query);
        $referredMembers = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $referralNode = $this->getNodeFromDB($row['referred_user_id']);
            if ($referralNode) {
                $referredMembers[] = $referralNode;
            }
        }

        return $referredMembers;
    }
}

// Ensure user session is set
if (isset($_SESSION['member_user_id'])) {
    $treeGenerator = new TreeGenerator();
    $node = $treeGenerator->getNodeFromDB($_SESSION['member_user_id']);
}

?>

<div class="tree">
    <ul>
        <?php
        if (isset($node)) {
            $treeGenerator->generateTree($node);
        } else {
            echo "<li>No user found or session not set.</li>";
        }
        ?>
    </ul>
</div>
