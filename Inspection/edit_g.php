<?php 

require './include/header.php';

require './db.php';
$inspection_id = (isset($_GET['inspection_id']))?$_GET['inspection_id']:'';

$db = new Database();
$fetch_each_data_g = $db->fetch_each_data_g($inspection_id);
$count_question = json_decode($fetch_each_data_g['check_list']);
?>
<div class="d-flex align-items-center justify-content-center my-5" style="min-height: 70vh;">
    <div class="card shadow">
        <form action="./database/edit_SQL_g.php" method="post">
            <div class="card-header" style="background-color:#D4B700 ;">
                <h3 class="text-center text-white fw-bold">Edit government inspection</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">A. Information about the Premise</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                        <input type="hidden" id="id" name="id" value="<?php echo $fetch_each_data_g['id'];?>">
                        <input type="hidden" id="count_question" name="count_question" value="<?php echo count($count_question);?>">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="Inspec_id">Inspection ID</span>
                                <input type="text" class="form-control" id="Inspec_id" name="Inspec_id"
                                    value="<?php echo $fetch_each_data_g['inspection_id'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="division">Division</span>
                                <input type="text" class="form-control" id="division" name="division" value="<?php echo $fetch_each_data_g['division'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="today">Date of inspection</span>
                                <input type="date" class="form-control" id="today" name="today"
                                value="<?php echo $fetch_each_data_g['date_of_inspection'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="last_date">Date of last inspection</span>
                                <input type="date" class="form-control" id="last_date" name="last_date" value="<?php echo $fetch_each_data_g['date_of_last_inspection'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="type_inspect">Type of inspection
                                </span>
                                <select class="form-select" aria-label="Default select example" name="type_inspect" required>
                                    <option value="<?php echo $fetch_each_data_g['type_of_inspection'];?>"><?php echo $fetch_each_data_g['type_of_inspection'];?></option>
                                    <option value="Routine">Routine</option>
                                    <option value="Follow-up">Follow-up</option>
                                    <option value="Special">Special</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="dzongkhag">Dzongkhag
                                </span>
                                <select class="form-select h-100" id="dzongkhag" name="dzongkhag" required>
                                    <option value="<?php echo $fetch_each_data_g['dzongkhag'];?>"><?php echo $fetch_each_data_g['dzongkhag'];?></option>
                                    <?php include './include/Dzongkhag.php';?>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="col-md-12 col-12">
                            <h5 class="mb-3">B. Information of pharmacy/premises</h5>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="Pname">Name of premise</span>
                                <input type="text" class="form-control" id="Pname" name="Pname" required value="<?php echo $fetch_each_data_g['name_of_premise'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="type_premise">Type of premise</span>
                                <input type="text" class="form-control" id="type_premise" name="type_premise" value="<?php echo $fetch_each_data_g['type_of_premise'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Address of the premise</span>
                                <textarea class="form-control" aria-label="Address of the premise" rows="3"
                                    name="address"><?php echo $fetch_each_data_g['address_of_premise'];?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Technical Authorization No</span>
                                <input type="text" class="form-control" id="premise_number" name="premise_number" value="<?php echo $fetch_each_data_g['technical_authorization_no'];?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Validity</span>
                                <input type="text" class="form-control" id="premise_valid" name="premise_valid" value="<?php echo $fetch_each_data_g['validity_premise'];?>">
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Scope of inspection</span>
                                <input type="text" class="form-control" id="inspec_scope" name="inspec_scope" value="<?php echo $fetch_each_data_g['scope_of_inspection'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-12">
                            <h5 class="mb-3">C. Information of competent person</h5>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control" id="name" name="name" required value="<?php echo $fetch_each_data_g['competent_name'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Email</span>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $fetch_each_data_g['email_competent'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">CP/BMHC registration No</span>
                                <input type="text" class="form-control" id="registration_Number"
                                    name="registration_Number" value="<?php echo $fetch_each_data_g['cp_registration_no'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Validity</span>
                                <input type="text" class="form-control" id="person_valid" name="person_valid" value="<?php echo $fetch_each_data_g['validity_competent'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Conatct number</span>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $fetch_each_data_g['conatct_number'];?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Other conatct details</span>
                                <input type="text" class="form-control" id="contact_detail" name="contact_detail" value="<?php echo $fetch_each_data_g['other_contact'];?>">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-12">
                            <h5 class="mb-3">D. Check list</h5>
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
                            $results = json_decode($fetch_each_data_g['check_list']);
                            $number = 1;
                            foreach ($results as $result) {
                            ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $number; ?></th>
                                        <td><?php echo $result[2];?></td>
                                        <input type="hidden" class="form-control" id="question<?php echo $number; ?>"
                                            name="question<?php echo $number; ?>"
                                            value="<?php echo $result[2]; ?>">
                                        <input type="hidden" class="form-control" id="level<?php echo $number; ?>"
                                            name="level<?php echo $number; ?>" value="<?php echo $result[3]; ?>">
                                        <td>
                                            <select name="select<?php echo $number;?>" id="select<?php echo $number;?>"
                                                class="form-select" required>
                                                <option value="<?php echo $result[0]; ?>"><?php echo $result[0]; ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">N/A</option>
                                            </select>
                                        </td>
                                        <td><textarea rows="1" class="form-control" name="text<?php echo $number;?>" id="text<?php echo $number;?>"><?php echo $result[1]; ?></textarea>
                                        </td>
                                    </tr>
                                    <?php
                                    $number++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-warning w-100" type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>

<?php require './include/footer.php';?>