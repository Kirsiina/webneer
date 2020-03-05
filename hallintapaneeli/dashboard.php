<?php
include 'lib/header.php';

$sitename = "Dashboard";

$query = "SELECT COUNT(*) FROM `webneer_kayttajat` WHERE rek_pvm BETWEEN (CURRENT_TIMESTAMP - INTERVAL 30 DAY) AND CURRENT_TIMESTAMP";
$result = mysqli_query($yhteys, $query);
$regamount = mysqli_fetch_row($result);

$query = "SELECT COUNT(*) FROM `webneer_yhteydenottolomake` WHERE pvm BETWEEN (CURRENT_TIMESTAMP - INTERVAL 30 DAY) AND CURRENT_TIMESTAMP";
$result = mysqli_query($yhteys, $query);
$lomakeamount = mysqli_fetch_row($result);
?>

<body>
<div class="wrapper" >

    <?php include 'lib/sidebar.php'; ?>

    <!-- Page Content -->
    <div id="dashboard-content">
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registrations (Past 30 days)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $regamount[0]; ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Feedback (Past 30 days)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $lomakeamount[0]; ?></div>
            </div>
        </div>

    </div>

</div> 

</body>
</html>