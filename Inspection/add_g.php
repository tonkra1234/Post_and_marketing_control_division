<?php 

require './include/header.php';

require './db.php';
$today = date('Y-m-d');
$year = date('Y');

$db = new Database();
$last_id = $db->report2023_gNumber();
?>
<div class="d-flex align-items-center justify-content-center my-5" style="min-height: 70vh;">
    <div class="card shadow">
        <form action="./database/add_SQL_g.php" method="post">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white fw-bold">Government inspection</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h5 class="mb-3">A. Information about the Premise</h5>
                    </div>
                    <div class="row">
                        <input type="hidden" name="longitude" id="longitude" value="">
                        <input type="hidden" name="latitude" id="latitude" value="">
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="Inspec_id">Inspection ID</span>
                                <input type="text" class="form-control" id="Inspec_id" name="Inspec_id"
                                    value="IN/<?php echo $year?>/G/<?php echo $last_id['next_id']?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="division">Division</span>
                                <input type="text" class="form-control" id="division" name="division">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="today">Date of inspection</span>
                                <input type="date" class="form-control" id="today" name="today"
                                    value="<?php echo $today?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="last_date">Date of last inspection</span>
                                <input type="date" class="form-control" id="last_date" name="last_date" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="type_inspect">Type of inspection
                                </span>
                                <select class="form-select" aria-label="Default select example" name="type_inspect"
                                    required>
                                    <option selected>Open this select menu</option>
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
                                <select class="form-select h-100" id="dzongkhag" name="dzongkhag" required
                                    onchange="fetch_select(this.value)">
                                    <option value=""></option>
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
                                <input type="text" class="form-control" id="Pname" name="Pname" list="NameOptions"
                                    required>
                                <datalist id="NameOptions"></datalist>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="type_premise">Type of premise</span>
                                <select class="form-select" aria-label="Default select example" id="type_premise"
                                    name="type_premise" required>
                                    <option value="">Select one of these</option>
                                    <optgroup label="Human">
                                        <option value="Referral Hospital">Referral Hospital</option>
                                        <option value="District Hospital">District Hospital</option>
                                        <option value="Hospital">Hospital</option>
                                        <option value="Primary Health Center">Primary Health Center</option>
                                        <option value="Sub-post">Sub-post</option>
                                        <option value="Clinic">Clinic</option>
                                        <option value="Medical Supplies">Medical Supplies</option>
                                        <option value="Traditional">Traditional</option>
                                    </optgroup>
                                    <optgroup label="Veterinary">
                                        <option value="Veterinary Hospital">Veterinary Hospital</option>
                                        <option value="Renewable Natural Resources Extension center">Renewable Natural
                                            Resources Extension center</option>
                                        <option value="Livestock Extension Center">Livestock Extension Center</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Address of the premise</span>
                                <textarea class="form-control" aria-label="Address of the premise" rows="3"
                                    name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Technical Authorization No</span>
                                <input type="text" class="form-control" id="premise_number" name="premise_number">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Validity</span>
                                <input type="text" class="form-control" id="premise_valid" name="premise_valid">
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Scope of inspection</span>
                                <input type="text" class="form-control" id="inspec_scope" name="inspec_scope" required>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-12">
                            <h5 class="mb-3">C. Information of competent person</h5>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Email</span>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">CP/BMHC registration No</span>
                                <input type="text" class="form-control" id="registration_Number"
                                    name="registration_Number">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Validity</span>
                                <input type="text" class="form-control" id="person_valid" name="person_valid">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Conatct number</span>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Other conatct details</span>
                                <input type="text" class="form-control" id="contact_detail" name="contact_detail">
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
                                        <th scope="col" class="text-center align-middle">Remarks/Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                            $results = $db->Question2023_g();
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
                                                class="form-select" required>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="NA">N/A</option>
                                            </select>
                                        </td>
                                        <td><textarea rows="1" class="form-control" name="text<?php echo $number;?>"
                                                placeholder="If No put the remark" id="text<?php echo $number;?>"
                                                readonly></textarea></td>
                                    </tr>
                                    <?php
                                    $number++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Inspected by</span>
                                <select class="form-select" id="multiple-select-field" name="inspector_name[]"
                                    data-placeholder="Choose anything" multiple>
                                    <option value="">Select one</option>
                                    <?php include './include/Inspector.php';?>
                                </select>
                            </div>
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
<script>
    $('#multiple-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });
</script>
<script>
    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    const options = {
        enableHighAccuracy: true,
        maximumAge: 0,
    };

    if (document.getElementById('latitude').value.length === 0) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, error, options);

        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;
        }
    }
</script>
<script type="text/javascript">
    function fetch_select(val) {
        $.ajax({
            type: 'POST',
            url: './database/fetch_SQL_premises.php',
            data: {
                get_option: val,
                type: 'government',
            },
            success: function (response) {
                document.getElementById("NameOptions").innerHTML = response;
            }
        });
    }
</script>
<script src="./js/disable_textarea.js"></script>
<?php require './include/footer.php';?>