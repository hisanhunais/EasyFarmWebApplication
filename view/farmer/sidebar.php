<?php

// Initializing variables.
$homeActive = $harvestActive = $paddyOrderActive = $transportActive = $fertilizerOrderActive = $announcementActive = $discussionForumActive = $reportActive = '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'home.php':
        $homeActive = $active;
    break;

    case 'harvest.php':
        $harvestActive = $active;
    break;

    case 'paddyOrder.php':
        $paddyOrderActive = $active;
    break;

    case 'announcement.php':
        $announcementActive = $active;
    break;

    case 'fertilizerOrder.php':
        $fertilizerOrderActive = $active;
    break;

    case 'transport.php':
        $paddyOrderActive = $active;
    break;

    case 'discussionForum.php':
        $discussionForumActive = $active;
    break;

    case 'report.php':
        $reportActive = $active;
    break;

    // By default, we assume you will be at index.php (setting $homeActive).
    default:
        $homeActive = $active;
    break;
}
?>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/homepage.css" rel="stylesheet">

<div class="list-group">
    <a href="home.php" id="homeBtn" class="list-group-item <?php echo $homeActive;?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
    <a href="harvest.php" id="harvestBtn" class="list-group-item <?php echo $harvestActive;?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Harvest</a>
    <a href="paddyOrder.php" id="paddyOrderBtn" class="list-group-item <?php echo $paddyOrderActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Paddy Orders</a>
    <a href="fertilizerOrder.php" id="fertilizerOrderBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Fertilizer Orders</a>
    <a href="transport.php" id="transportBtn" class="list-group-item"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Transport</a>
    <a href="announcement.php" id="announcementBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Announcements</a>
    <a href="discussionForum.php" id="discussionBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Discussion Forum</a>
    <a href="report.php" id="reportBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
</div>