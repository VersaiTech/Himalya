<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Binary Tree | Admin Panel</title>

	<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="../UserProfile/images/logo/logo.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	 
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">
		<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

</head>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
	<?php include 'include/header.php'; ?>
		<!-- /Header -->
		
		<!-- Sidebar -->
		<?php include 'include/leftmenu.php'; ?>
		<!-- /Sidebar -->
		
	
	</div>



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
    $query = "SELECT * FROM tbl_binary WHERE user_id = '$userId'";
    $result = mysqli_query($connection, $query);
    $nodeData = mysqli_fetch_assoc($result);
    mysqli_close($connection);

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

<style>
    a[title]:hover:after {
        content: attr(title);
        padding: 5px;
        margin-left: 20px;
        border-radius: 5px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        position: absolute;
        z-index: 1;
        white-space: nowrap;
    }

    /*Now the CSS*/
    * {
        margin: 0;
        padding: 0;
    }

    .tree ul {
        padding-top: 20px;
        position: relative;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree li::before,
    .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 20px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 1px solid #ccc;
    }

    /*We need to remove left-right connectors from elements without 
any siblings*/
    .tree li:only-child::after,
    .tree li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child {
        padding-top: 0;
    }

    /*Remove left connector from first child and 
right connector from last child*/
    .tree li:first-child::before,
    .tree li:last-child::after {
        border: 0 none;
    }

    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;

        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;

        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover,
    .tree li a:hover+ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }

    /*Connector styles on hover*/
    .tree li a:hover+ul li::after,
    .tree li a:hover+ul li::before,
    .tree li a:hover+ul::before,
    .tree li a:hover+ul ul::before {
        border-color: #94a0b4;
    }



    /*... (rest of the CSS remains the same)... */

    /* Add media queries for mobile devices */
    @media only screen and (max-width: 768px) {
        .tree ul {
            padding-top: 10px;
        }

        .tree li {
            padding: 10px 5px 0 5px;
        }

        .tree li::before,
        .tree li::after {
            width: 30%;
        }

        .tree li a {
            font-size: 10px;
            padding: 3px 5px;
        }
    }

    @media only screen and (max-width: 480px) {
        .tree ul {
            padding-top: 5px;
        }

        .tree li {
            padding: 5px 5px 0 5px;
        }

        .tree li::before,
        .tree li::after {
            width: 20%;
        }

        .tree li a {
            font-size: 9px;
            padding: 2px 3px;
        }
    }
</style>



	

	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script> 

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>

</html>

<?php 
function get_direct($member_user_id,$position)
{
    global $connection;
    $str="Select * from tbl_memberreg where sponcer_id='$member_user_id' and position='$position' and status=1";
    $res=mysqli_query($connection,$str);
    return $cnt=mysqli_num_rows($res);
}
?>