<?php
 if(!isset($sitename)){
     $sitename = "Dashboard";
 }
?>

<!-- Sidebar -->
<nav id="sidebar" class="">
    <div class="sidebar-header py-2">
        <a class="navbar-brand" href="../index.html">
            <img src="../img/logo.png" alt="">
        </a>
    </div>

    <ul class="list-unstyled components">

        <hr>
        <div class="px-2" style="color:white">
            <img class="rounded-circle float-left m-2" width="45" height="45" src="../img/profiilikuva.png" alt="Placeholder image" >
            <div class="align-middle">
                User Name<br> <!-- TODO: Get username/image from session -->
                <span><a href="./profile.php">Profile</a> - <a href="./logout.php">Logout</a></span>
            </div>
        </div>
        <hr>
        <li class="<?php if($sitename == "Dashboard"){ echo 'active'; }  ?>">
            <a href="./dashboard.php">
            <i class="fa icon-fixed-width fa-tachometer" aria-hidden="true"></i>
            Dashboard</a>
        </li>
        <hr>
        <li class="<?php if($sitename == "Products"){ echo 'active'; }  ?>">
            <a href="./products.php">
            <i class="fa icon-fixed-width fa-stack-exchange" aria-hidden="true"></i>
            Products</a>
        </li>
        <li class="<?php if($sitename == "Accounts"){ echo 'active'; }  ?>">
            <a href="./accounts.php">
            <i class="fa icon-fixed-width fa-users" aria-hidden="true"></i>
            Accounts</a>
        </li>
        <li class="<?php if($sitename == "Feedback"){ echo 'active'; }  ?>">
            <a href="./feedback.php">
            <i class="fa icon-fixed-width fa-comments-o" aria-hidden="true"></i>
            Feedback</a>
        </li>

    </ul>
</nav>