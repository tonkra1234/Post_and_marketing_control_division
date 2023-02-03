<?php require './include/header.php';?>
<?php
require_once './database/db_GMP.php';
$db_gmp = new GmpInspection();
$results_inspectors = $db_gmp->inspectors();

?>
<!-- Modal -->
<div class="modal fade" id="Add_inspector" tabindex="-1" aria-labelledby="Add_inspector" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add-new-inspector" method="POST" action="./database/add_controller/inspector_add.php"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_inspector">Add inspector</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Inspector_name" name="Inspector_name"
                                    placeholder="Inspector_name" required>
                                <label for="floatingInput">Inspector name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Division"
                                    name="Division" required>
                                    <option value="">Select one of these</option>
                                    <option value="PMCD">PMCD</option>
                                    <option value="Registration Division">Registration Division</option>
                                    <option value="PPS">PPS</option>
                                </select>
                                <label for="floatingInput">Division</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="mb-3">
                                <label for="Avatar" class="form-label">Avatar</label>
                                <input class="form-control" type="file" accept=".jpg, .jpeg, .png" id="Avatar"
                                    name="Avatar" aria-label="Avatar file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Good Manufacturing Practices inspection</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Inspector details</h4>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#Add_inspector">
                            <div class="d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-plus"></i>
                                <div class="ms-2 d-none d-sm-block">Add new
                                    inspection</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered caption-top shadow">
                    <caption>Inspectors</caption>
                    <thead class="rounded-3 text-white" style="background-color: #008E2F ;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Avartar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Division</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     foreach ($results_inspectors as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['id'];?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td>
                                <?php if(is_file('./image/Officer_image/'.$result['picture'])): ?>
                                <div class="d-flex align-items-center justify-content-center"><img
                                        class="rounded-circle"
                                        src="./image/Officer_image/<?php echo $result['picture']?>" width="30"></div>
                                <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center"><img
                                        class="rounded-circle" src="./image/Officer_image/question_mark.png" width="30">
                                </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['Division'];?></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#edit_inspector<?php echo $number;?>"
                                    aria-controls="edit_inspector">
                                    Edit
                                </button>
                                <button type="button" value="<?php echo $result['id'];?>" class="delete_button btn btn-danger">Delete</button>
                                <input type="hidden" value="<?php echo $result['picture'];?>" class="delete_file_name<?php echo $result['id'];?>">
                            </div>
                            </td>
                        </tr>
                        <?php 
                        include './Modal/gmp_edit_modal.php';
                        $number++;
                     }
                     ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var inspectorId = $(this).val();
        var fileName = $('.delete_file_name'+inspectorId).val();
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
                    type :"POST",
                    url : "./database/delete_controller/delete_inspector_confirm.php",
                    data : {
                        'inspectordelete': true,
                        'inspectorId': inspectorId,
                        'fileName': fileName,
                    },
                    success:function(reponse){

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#refresh-delete'+inspectorId).hide(1000);
            }
        })

    });
</script>
<?php require './include/footer.php';?>