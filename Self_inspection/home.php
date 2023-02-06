<?php 

require './include/header.php';

require './db.php';

$db = new Database();
?>
<div class="d-flex align-items-center justify-content-center my-5" style="min-height: 70vh;">
    <div class="card shadow">
        <form action="./add_SQL.php" method="post">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white fw-bold">Self inspection</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">A. Information about the Premise</h5>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Name_of_Premise" name="Name_of_Premise"
                                placeholder="Name of Premise" required>
                            <label for="floatingInput">Name of Premise</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Department" name="Department"
                                placeholder="Department/Unit/Section">
                            <label for="floatingInput">Department/Unit/Section</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" id="Category_of_premises" name="Category_of_premises" required>
                                <option value="">Select one of these</option>
                                <option value="Government">Government</option>
                                <option value="Private">Private</option>
                            </select>
                            <label for="floatingInput">Category of premises</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select h-100" id="Dzongkhag" name="Dzongkhag">
                                <option value=""></option>
                                <?php include './include/Dzongkhag.php';?>
                            </select>
                            <label for="floatingInput">Dzongkhag</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Date_self_inspection"
                                name="Date_self_inspection" placeholder="Date of self-inspection">
                            <label for="floatingInput">Date of inspection</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" id="type_of_premises" name="type_of_premises" required>
                                <option value="">Select one of these</option>
                                <option value="Human">Human</option>
                                <option value="Veterinary">Veterinary</option>
                            </select>
                            <label for="floatingInput">Type of premises</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="Address" name="Address"
                                style="height: 100px;" placeholder="Address"></textarea>
                            <label for="floatingInput">Address</label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">B. Details of the In-charge</h5>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required>
                            <label for="floatingInput">Name</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="BMHC_No" name="BMHC_No" placeholder="BMHC No">
                            <label for="floatingInput">BMHC No</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email ID">
                            <label for="floatingInput">Email ID</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Contact_Number" name="Contact_Number"
                                placeholder="Contact Number">
                            <label for="floatingInput">Contact Number</label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">C. Inspection checklist</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" class="text-center align-middle">No.</th>
                                    <th scope="col" rowspan="2" class="text-center align-middle">DESCRIPTION</th>
                                    <th scope="col" colspan="2" class="text-center align-middle">Compliance</th>
                                </tr>
                                <tr>
                                    <th scope="col" class="text-center align-middle">Check</th>
                                    <th scope="col" class="text-center align-middle">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $results = $db->read_question();
                            $number = 1;
                            foreach ($results as $result) {
                            ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $number; ?></th>
                                    <td><?php echo $result['question'];?></td>
                                    <input type="hidden" class="form-control" id="question<?php echo $number; ?>"
                                        name="question<?php echo $number; ?>"
                                        value="<?php echo $result['question']; ?>">
                                    <input type="hidden" class="form-control" id="level<?php echo $number; ?>"
                                        name="level<?php echo $number; ?>" value="<?php echo $result['level']; ?>">
                                    <td>
                                        <select name="select<?php echo $number;?>" id="select<?php echo $number;?>"
                                            class="form-select">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="NA">N/A</option>
                                        </select>
                                    </td>
                                    <td><textarea rows="1" class="form-control" name="text<?php echo $number;?>"
                                            id="text<?php echo $number;?>" readonly></textarea></td>
                                </tr>
                                <?php
                            $number++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">Note</h5>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="Note" name="Note" style="height: 100px;"
                                placeholder="Note"></textarea>
                            <label for="floatingInput">Note</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="check_true" id="self_check"
                                name="self_check">
                            <label class="form-check-label" for="self_check">
                                This self inspection report is submitted based on the true findings observed during self
                                inspection by the undersigned.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success w-100" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="./js/disable_textarea.js"></script>
<?php require './include/footer.php';?>