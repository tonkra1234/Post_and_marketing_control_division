<?php 

require './include/header.php';

?>
<div class="mt-5">
    <a class="btn btn-light fw-bold shadow" href="./home.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>  Back to home page</a>
</div>

<div class="d-flex my-5">
    <div class="card shadow rounded-3">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white">Add new vaccine</h3>
        </div>
        <form class="row g-3 needs-validation" novalidate>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Application_ID" name="Application_ID"
                                placeholder="Application_ID" required>
                            <label for="floatingInput">Application ID</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Product_Name" name="Product_Name"
                                placeholder="Product_Name'name" required>
                            <label for="floatingInput">Product name</label>
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
                            <input type="text" class="form-control" id="Storage_Condition" name="Storage_Condition"
                                placeholder="Storage Condition" required>
                            <label for="floatingInput">Storage Condition</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Date_Application" name="Date_Application"
                                placeholder="Date_Application of medicine" required>
                            <label for="floatingInput">Date of Application</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Lot_Number" name="Lot_Number"
                                placeholder="Lot Number" required>
                            <label for="floatingInput">Lot Number</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Lot_Size" name="Lot_Size" placeholder="Lot size"
                                required>
                            <label for="floatingInput">Lot size</label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Requesting_Agency" name="Requesting_Agency"
                                placeholder="Requesting Agency" required>
                            <label for="floatingInput">Requesting Agency</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Pharmaceutical_Form" name="Pharmaceutical Form"
                                placeholder="Pharmaceutical_Form of medicine" required>
                            <label for="floatingInput">Pharmaceutical Form</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Presentation" name="Presentation"
                                placeholder="Presentation" required>
                            <label for="floatingInput">Presentation</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Diluent" name="Diluent"
                                placeholder="Diluent of medicine" required>
                            <label for="floatingInput">Diluent</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Diluent_Number" name="Diluent_Number"
                                placeholder="Diluent Number" required>
                            <label for="floatingInput">Diluent Number</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" id="SLP_Received"
                                name="SLP_Received" placeholder="SLP_Received of medicine">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="NA">NA</option>
                            </select>
                            <label for="floatingInput">SLP Received</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" required
                                id="Labels_Recieved" name="Labels_Recieved" placeholder="Labels Recieved">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="NA">NA</option>
                            </select>
                            <label for="floatingInput">Labels Recieved</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" required
                                id="Samples_Recieved" name="Samples_Recieved" placeholder="Samples Recieved">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="NA">NA</option>
                            </select>
                            <label for="floatingInput">Samples Recieved</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Reviewer_Assigned" name="Reviewer_Assigned"
                                placeholder="Reviewer Assigned" required>
                            <label for="floatingInput">Reviewer Assigned</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Deadline_Assessment" name="Deadline_Assessment"
                                placeholder="Deadline Assessment" required>
                            <label for="floatingInput">Deadline Assessment</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-floating mb-3">
                            <input type="month" class="form-control" id="Date_Manufacture" name="Date_Manufacture"
                                placeholder="Date Manufsacture" required>
                            <label for="floatingInput">Date of Manufacture</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-floating mb-3">
                            <input type="month" class="form-control" id="Date_Expiry" name="Date_Expiry"
                                placeholder="Date of Expiry" required>
                            <label for="floatingInput">Date of Expiry</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Certificate_Issue_Date"
                                name="Certificate_Issue_Date" placeholder="Certificate Issue Date" required>
                            <label for="floatingInput">Certificate Issue Date</label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="Remarks" name="Remarks" placeholder="Remarks"
                                style="height: 100px" required></textarea>
                            <label for="floatingInput">Remarks</label>
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