<?php
include 'lib/header.php';

$sitename = "Accounts";
?>

<body>
<div class="wrapper" >

    <?php include 'lib/sidebar.php'; ?>

    <!-- Page Content -->
    <div id="content">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tunnus</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rooli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT webneer_kayttajat.id, kayttajatunnus, sahkoposti, webneer_oikeudet.rooli as rooli  FROM webneer_kayttajat JOIN webneer_oikeudet on oikeudet = webneer_oikeudet.id";
                    if($result = mysqli_query($yhteys, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['kayttajatunnus'] . "</td>";
                                    echo "<td>" . $row['sahkoposti'] . "</td>";
                                    echo "<td>" . $row['rooli'] . "</td>";
                                    echo "<td>"; 
                                        echo "<a href='profile.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a> - ";
                                        echo "<a href='#". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>";
                                        echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }
                    }
                    ?>
                    <!--
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    </tr>
-->
                </tbody>
                </table>
            </div>
        </div>
    </div>

</div> 

</body>
</html>