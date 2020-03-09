<?php
include 'lib/header.php';

$sitename = "Feedback";
?>
<style type="text/css">
        
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{   /*viimesen solun muotoilu*/
            margin-right: 30px;
            
        }
        
</style>
<body>
<div class="wrapper" >

    <?php include 'lib/sidebar.php'; ?>

    <!-- Page Content -->
    <div id="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Contact requests</h2>
                    
                    </div>



                    <?php
                    
                    $sql = "SELECT * FROM webneer_yhteydenottolomake";
                    if($result = mysqli_query($yhteys, $sql)){  //jos löytyy tuloksia ni sit seuraavaan
                        if(mysqli_num_rows($result) > 0){       //jos rivejä on enemmän ku yks ni sit muodostetaan taulukko
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>First name</th>";
                                        echo "<th>Last name</th>";
                                        echo "<th>Topic</th>";
                                        echo "<th>Message</th>";
                                        echo "<th>Phone number</th>";
                                        echo "<th>E-mail</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){ //hakee kaikki tiedot per rivi
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['etunimi'] . "</td>";
                                        echo "<td>" . $row['sukunimi'] . "</td>";
                                        echo "<td>" . $row['aihe'] . "</td>";
                                        echo "<td>" . substr($row['lomake_txt'], 0, 20) . "</td>";
                                        echo "<td>" . $row['puhnro'] . "</td>";
                                        echo "<td>" . $row['sahkoposti'] . "</td>";
                                        echo "<td>"; //Ikonilinkit
                                            echo "<a href='contact_read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>";
                                            
                                            echo "<a href='contact_delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    
                                    
                                } else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }
                            }
         
                            
                            mysqli_close($yhteys);
                            ?>
                        </div>
                    </div>        
                </div>
        
        </div> 
        
        </body>
        </html>