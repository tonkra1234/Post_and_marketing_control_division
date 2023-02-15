<?php require './include/header.php';?>
<?php
require_once './database/db_inspection.php';
$db_inspection = new Inspection();

?>
<!-- Modal -->
<div class="modal fade" id="Add_facility" tabindex="-1" aria-labelledby="Add_facility" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit-facility" method="POST" action="./database/add_controller/governement_facility.php"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_question">Add government-veterinary Facilty</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="type" id="type" value="government_veterinary">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Facility_name" name="Facility_name"
                                    placeholder="Facility_name" required>
                                <label for="floatingInput">Facility name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Dzongkhag"
                                    name="Dzongkhag" required>
                                    <option value="">Please, select one</option>
                                    <?php include './include/Dzongkhag.php';?>
                                </select>
                                <label for="floatingInput">Dzongkhag</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row mt-lg-3">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Edit the government-veterinary premises</h4>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#Add_facility">
                            <div class="d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-plus"></i>
                                <div class="ms-2 d-none d-sm-block">Add new facility</div>
                            </div>
                        </button>
                    </div>
                </div>
                <hr class="my-lg-3">
                <div class="col-lg-4 col-12 my-lg-3">
                    <select class="form-select" id="myInput" aria-label="Default select example" onchange="Searching()">
                        <option value="" selected>Show all</option>
                        <?php include './include/Dzongkhag.php';?>
                    </select>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered shadow" id="myTable">
                            <thead class="rounded-3 text-white" style="background-color: #008E2F ;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Facility name</th>
                                    <th scope="col">Dzongkhag</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                     $number = 1;
                     $results_facilty = $db_inspection->fetch_facility_g_v();
                     foreach ($results_facilty as $result) {
                     
                    ?>
                                <tr id="refresh-delete<?php echo $result['id'];?>">
                                    <th scope="row" class="text-center"><?php echo $number;?></th>
                                    <td><?php echo $result['Facility_name'];?></td>
                                    <td><?php echo $result['Dzongkhag'];?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_facility<?php echo $result['id'];?>">
                                                Edit
                                            </button>
                                            <button type="button" class="delete_button btn btn-danger"
                                                value="<?php echo $result['id'];?>">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                        include './Modal/facility_g_v.php';
                        $number++;
                     }
                     ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    function Searching() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var facilityId = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./database/delete_controller/delete_government_facility.php",
                    data: {
                        'type': 'government_premise_verterinary',
                        'facilityId': facilityId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + facilityId).hide(1000);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
</script>
<?php require './include/footer.php';?>