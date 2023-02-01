<?php require './include/header.php';?>
<?php
require_once './database/db_self_inspection.php';
$db_self_inspection = new SelfInspection();
$results_question = $db_self_inspection->fetch_question();

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
<div class="container-fluid">
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
                        <tr>
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
                                    <a href="./database/delete_controller/question_delete.php?id=<?php echo $result['id']?>"
                                        class="btn btn-danger">Delete</a>
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
            <div class="row">
                <div class="col-lg-6">

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
<?php require './include/footer.php';?>