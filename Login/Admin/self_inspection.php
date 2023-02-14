<?php require './include/header.php';?>
<?php
require_once './database/db_self_inspection.php';
$db_self_inspection = new SelfInspection();
$results_question = $db_self_inspection->fetch_question();
$header = $db_self_inspection->header();
?>
<!-- Modal -->
<div class="modal fade" id="Add_question" tabindex="-1" aria-labelledby="Add_question" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add-new-question" method="POST" action="./database/add_controller/question_add.php"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_question">Add question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="question" name="question"
                                    placeholder="question" required>
                                <label for="floatingInput">Question</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="level" name="level"
                                    required>
                                    <option value="O">O</option>
                                    <option value="M">M</option>
                                    <option value="C">C</option>
                                </select>
                                <label for="floatingInput">Level</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
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
                <h1 class="h2">Self inspection</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Question details</h4>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#Add_question">
                            <div class="d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-plus"></i>
                                <div class="ms-2 d-none d-sm-block">Add new
                                    question</div>
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
                            <th scope="col">Question</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     foreach ($results_question as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['id'];?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result['question'];?></td>
                            <td><?php echo $result['level'];?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#edit_question<?php echo $number;?>"
                                        aria-controls="edit_question">
                                        Edit
                                    </button>
                                    <button type="button" class="delete_button btn btn-danger"
                                        value="<?php echo $result['id'];?>">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        include './Modal/question_edit_modal.php';
                        $number++;
                     }
                     ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-12 my-lg-3">
                    <h4>Edit the report header</h4>
                </div>
                <div class="col-lg-6 col-12">
                    <form class="shadow p-lg-3" method="POST" action="./database/edit_controller/header_self_report.php">
                        <div class="row">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $header['id']?>">
                            <div class="mb-3 col-lg-6 col-12">
                                <label for="Document_Number" class="form-label">Document Number</label>
                                <input type="text" class="form-control" id="Document_Number" name="Document_Number" value="<?php echo $header['Document_Number']?>">
                                
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label for="Effective_Date" class="form-label">Effective Date</label>
                                <input type="text" class="form-control" id="Effective_Date" name="Effective_Date" value="<?php echo $header['Effective_Date']?>">
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label for="Review_Date" class="form-label">Review Date</label>
                                <input type="text" class="form-control" id="Review_Date" name="Review_Date" value="<?php echo $header['Review_Date']?>">
                                
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label for="Version" class="form-label">Version</label>
                                <input type="text" class="form-control" id="Version" name="Version" value="<?php echo $header['Version']?>">                                
                            </div>
                            <div class="col-lg-6 col-12">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
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
        var inspectionId = $(this).val();
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
                    url: "./database/delete_controller/delete_question_confirm.php",
                    data: {
                        'inspectiondelete': true,
                        'inspectionId': inspectionId,
                    },
                    success: function (reponse) {

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#refresh-delete' + inspectionId).hide(1000);
            }
        })

    });
</script>
<?php require './include/footer.php';?>