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
                                echo "<tr id='tablerow-".$row['id']."'>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['kayttajatunnus'] . "</td>";
                                    echo "<td>" . $row['sahkoposti'] . "</td>";
                                    echo "<td>" . $row['rooli'] . "</td>";
                                    echo "<td>"; 
                                        echo "<a href='profile.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a> - ";
                                        echo "<a href='#' data-toggle='modal' data-target='#delModal' data-id='".$row['id']."' data-tunnus='".$row['kayttajatunnus']."'><span class='fa fa-trash'></span></a>";
                                        echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You are about to delete X
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="button" class="btn btn-danger" id="delModalBtn">Delete</button>
                </div>
                </div>
            </div>
        </div>
    </div>

</div> 

</body>

<script>
$('#delModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var tunnus = button.data('tunnus')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-title').text('Are you sure?')
  modal.find('.modal-body').text('You are about to delete "'+tunnus+'" from the database.')
  modal.find('#delModalBtn').attr('data-id', id);
});

$(document).on('click', "#delModalBtn",  function() {
    var id = $("#delModalBtn").data('id');
    $.post("accounts_delete.php",{
        id: id
    }).done(function(data) {
        if(data == "Success"){
            $("#delModal").modal('hide');
            $("#tablerow-"+id).remove();
        }else{
            $("#delModal").modal('hide');
            alert('Error removing entry');
        }
    });
})



</script>
</html>