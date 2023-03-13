<?php 

require './include/header.php';
include './db.php';
$db = new DataBase;
?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <a href="./list_plan.php" class="link-secondary">
        List plan form for vaccine
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Create plan form for vaccine
    </p>
</div>

<div class="d-flex my-4">
    <div class="card shadow rounded-3">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Create plan form for vaccine</h3>
        </div>
        <form method="POST" action="./create_plan_SQL.php" class="row g-3 needs-validation" novalidate>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Premises_name" name="Premises_name"
                                placeholder="premises_name" required>
                            <label for="floatingInput">Name & Address of Premises</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Manufacturer" name="Manufacturer"
                                placeholder="Manufacturer of medicine" required>
                            <label for="floatingInput">Manufacturer</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Type_vaccine" name="Type_vaccine"
                                placeholder="Type_vaccine" required>
                            <label for="floatingInput">Type of vaccine</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Proposed_Date" name="Proposed_Date"
                                placeholder="Proposed Date" required>
                            <label for="floatingInput">Proposed Date of Lot Release</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Name_Vaccine" name="Name_Vaccine" placeholder="Name_Vaccine"
                                required>
                            <label for="floatingInput">Name of Vaccine</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Estimated_Cost" name="Estimated_Cost" placeholder="Estimated Cost" required>
                            <label for="floatingInput">Estimated Cost</label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Proposed_official" name="Proposed_official" placeholder="Estimated Cost" required>
                            <label for="floatingInput">Name of the proposed official(s) for lot release:</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success w-100" type="submit">Submit</button>
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