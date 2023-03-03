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
    <a href="./list_instruction.php" class="link-secondary">
        List working instruction for vaccine
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Create working instruction for vaccine
    </p>
</div>

<div class="d-flex my-4">
    <div class="card shadow rounded-3">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Create working instruction for vaccine</h3>
        </div>
        <form method="POST" action="./add_instruction.php" class="row g-3 needs-validation" novalidate>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="RegistrationNo">Is this vaccine registered?</label>
                            <div class="input-group-text">
                                <select class="form-select" id="RegistrationNoCheck" name="RegistrationNoCheck">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" id="" name="RegistrationNo">
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="AuthorizationNo">Is import authorization issued
                                against this vaccine?</label>
                            <div class="input-group-text">
                                <select class="form-select" id="AuthorizationNoCheck" name="AuthorizationNoCheck">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" id="AuthorizationNo" name="AuthorizationNo">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Lot_name" name="Lot_name"
                                placeholder="Lot_name" required>
                            <label for="floatingInput">Lot name</label>
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
                            <input type="text" class="form-control" id="Batch_no" name="Batch_no" placeholder="Batch_no"
                                required>
                            <label for="floatingInput">Batch/Lot No.</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Date_Manufacture" name="Date_Manufacture"
                                placeholder="Date_Manufacture" required>
                            <label for="floatingInput">Date of Manufacture</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Date_Expiry" name="Date_Expiry"
                                placeholder="Date of Expiry" required>
                            <label for="floatingInput">Date of Expiry</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="importing_country" name="importing_country">
                                    <?php include './include/country_select.php';?>
                            </select>
                            <label for="floatingInput">Importing country</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity"
                                required>
                            <label for="floatingInput">Quantity(Vials)</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Vial" name="Vial" placeholder="Vial" required>
                            <label for="floatingInput">Dose/vial</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 my-lg-3">
                        <h5 class="mb-3">B. Cold chain conditions</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Particulars</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $results = $db->ChecklistB();
                            $number = 1;
                            foreach ($results as $result) {
                            ?>
                                <tr>
                                    <td><?php echo $result['particulars'];?></td>
                                    <input type="hidden" class="form-control" id="particularsB<?php echo $number; ?>"
                                        name="particularsB<?php echo $number; ?>"
                                        value="<?php echo $result['particulars']; ?>">
                                    <td>
                                        <select name="selectB<?php echo $number;?>" id="selectB<?php echo $number;?>"
                                            class="form-select" required>
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="NA">N/A</option>
                                        </select>
                                    </td>
                                    <td><textarea rows="1" class="form-control" name="textB<?php echo $number;?>"
                                            placeholder="If No put the remark"
                                            id="textB<?php echo $number;?>"></textarea></td>
                                </tr>
                                <?php
                                    $number++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-12 my-lg-3">
                        <h5 class="mb-3">C. Documentary verification</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Particulars</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $results = $db->ChecklistC();
                            $number = 1;
                            foreach ($results as $result) {
                            ?>
                                <tr>
                                    <td><?php echo $result['particulars'];?></td>
                                    <input type="hidden" class="form-control" id="particularsC<?php echo $number; ?>"
                                        name="particularsC<?php echo $number; ?>"
                                        value="<?php echo $result['particulars']; ?>">
                                    <td>
                                        <select name="selectC<?php echo $number;?>" id="selectC<?php echo $number;?>"
                                            class="form-select" required>
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="NA">N/A</option>
                                        </select>
                                    </td>
                                    <td><textarea rows="1" class="form-control" name="textC<?php echo $number;?>"
                                            placeholder="If No put the remark"
                                            id="textC<?php echo $number;?>"></textarea></td>
                                </tr>
                                <?php
                                    $number++;
                                    }
                                    ?>
                            </tbody>
                        </table>
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