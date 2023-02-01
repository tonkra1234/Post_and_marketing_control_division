<?php 

require './include/header.php';
require './db.php';

$db = new Database();

?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <a href="./home.php" class="link-secondary">
        Recalled products
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Add recalled products
    </p>
</div>

<div class="d-flex justify-content-center align-items-center my-4">
    <div class="card shadow">
        <form action="./add_SQL.php" method="post" class="needs-validation" novalidate>
            <div class="card-header">
                <h5 class="text-center">Add new recalled product</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Generic_name" name="Generic_name"
                                placeholder="Generic name" required>
                            <label for="floatingInput">Generic name</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Brand_name" name="Brand_name"
                                placeholder="Brand name" required>
                            <label for="floatingInput">Brand name</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Batch_No" name="Batch_No" placeholder="Batch No"
                                required>
                            <label for="floatingInput">Batch No</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Manufacturer" name="Manufacturer"
                                placeholder="Manufacturer" required>
                            <label for="floatingInput">Manufacturer</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="MAH" name="MAH" placeholder="MAH" required>
                            <label for="floatingInput">MAH</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Mode_of_registration"
                                name="Mode_of_registration" placeholder="Mode of registration" required>
                            <label for="floatingInput">Mode of registration</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Class_of_medicines" name="Class_of_medicines"
                                placeholder="Class of medicines" required>
                            <label for="floatingInput">Class of medicines</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Class_of_recall" name="Class_of_recall"
                                placeholder="Class of recall" required>
                            <label for="floatingInput">Class of recall</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Level_of_Recall" name="Level_of_Recall"
                                placeholder="Level of Recall" required>
                            <label for="floatingInput">Level of Recall</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Date_of_recall" name="Date_of_recall"
                                placeholder="Date of recall" required>
                            <label for="floatingInput">Date of recall</label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="Reason_for_recall" name="Reason_for_recall"
                                style="height: 100px;" placeholder="Reason for recall" required></textarea>
                            <label for="floatingInput">Reason for recall</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" value="Edit recalled product" class="btn btn-success w-100 my-2">Submit</button>
            </div>
        </form>
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