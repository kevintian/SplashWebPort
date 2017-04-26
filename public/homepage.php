<?php
require '../resources/library/loggedInChecker.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="css/style.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
</head>

<body>

<div style="height: 100vh">
    <div class="text-right">
        <h2 class="text-right navButton" id="editProfile">Edit Profile</h2>
        <h2 class="text-right navButton" id="logout">Logout</h2>
    </div>
    <div class="flex-column">

        <div class="text-center animated fadeIn" style="animation-duration: 2s; margin: 3em 0 3em 0">
            <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
            <p class="text-muted"><?php echo $_SESSION['user_type'] ?></p>
        </div>

        <div class="text-center animated fadeInDown">

            <h2>What would you like to do?</h2>

            <?php if ($_SESSION['user_type'] == "CONTRIBUTOR"): ?>
            <div class="card-deck w-50 card-center">
                <?php else : ?>
                <div class="card-deck w-75 card-center">
                <?php endif; ?>

                <div id="viewSourceReports" class="card hoverable card-clickable">
                    <img class="card-img-top" src="img/poiCard.jpg" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">View Water Source Reports</h4>
                    </div>
                </div>

                <div id="submitSourceReport" class="card hoverable card-clickable">
                    <img class="card-img-top" src="img/dataCard.jpg" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">Submit Water Source Report</h4>
                    </div>
                </div>

                <?php if ($_SESSION['user_type'] == "WORKER" || $_SESSION['user_type'] == "MANAGER" || $_SESSION['user_type'] == "ADMINISTRATOR"): ?>
                    <div id="viewQualityReports" class="card hoverable card-clickable">
                        <img class="card-img-top" src="img/reviewData.png" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">View Water Quality Reports</h4>
                        </div>
                    </div>

                    <div id="submitQualityReport" class="card hoverable card-clickable">
                        <img class="card-img-top" src="img/filterAndSearch.png" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Submit Water Quality Report</h4>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION['user_type'] == "MANAGER" || $_SESSION['user_type'] == "ADMINISTRATOR"): ?>
                    <div id="viewWaterTrends" class="card hoverable card-clickable">
                        <img class="card-img-top" src="img/reviewData.png" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">View Water Trends</h4>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript" src="js/homepage.js"></script>


</body>

</html>
