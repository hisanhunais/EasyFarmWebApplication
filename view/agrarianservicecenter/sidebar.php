<?php

// Initializing variables.
$homeActive =  $paddyOrderActive = $transportActive = $reportActive = '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'agrarianhome.php':
        $homeActive = $active;
    break;
    case 'agrariancreatepro.php';
        $proActive=$active;
    break;


    case 'agrarianmeeting.php':
        $meetingActive = $active;
    break;

    case 'agrariandiscussion.php':
        $discussiontActive = $active;
    break;
    case'agrarianannouncement.php';
        $annActive=$active;
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
    <a href="agrarianhome.php" class="list-group-item <?php echo $homeActive;?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
                      </a>

                      <a href="agrariancreatepro.php" class="list-group-item <?php echo $proActive;?>"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Create Farmer Profiles</a>
                      <a href="agrarianmeeting.php" class="list-group-item <?php echo $meetingActive;?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Meetings</a>
                      <a href="agrariandiscussion.php" class="list-group-item <?php echo $discussionActive;?>"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion <span class="badge">12</span></a>
                      <a href="agrarianannouncement.php" class="list-group-item <?php echo $annActive;?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Posts</a>
                      <a href="agrarianreport.php" class="list-group-item <?php echo $reportActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
</div>