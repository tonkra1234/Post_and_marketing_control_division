<?php 

require './include/header.php';
require './db.php';

$db = new Database();
$results = $db->read_inspector();

?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        GMP list
    </p>

</div>
<!-- Modal -->
<div class="modal fade" id="addNewManufacturerModal" tabindex="-1" aria-labelledby="addNewManufacturerModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add-new" method="POST" action="./add_SQL.php" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewManufacturerModal">Add new GMP inspection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Firm_inspection" name="Firm_inspection"
                                    placeholder="Firm_inspection" required>
                                <label for="floatingInput">Firm name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Inspector_name"
                                    name="Inspector_name" required>
                                    <option selected value=""></option>
                                    <?php foreach($results as $result){?>
                                    <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                                    <?php }?>
                                </select>
                                <label for="floatingInput">Inspector name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Division"
                                    name="Division" required>
                                    <option value="PMCD">PMCD</option>
                                    <option value="Registration Division">Registration Division</option>
                                    <option value="PPS">PPS</option>
                                </select>
                                <label for="floatingInput">Division</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Country"
                                    name="Country" required>
                                    <?php include './include/country_select.php';?>
                                </select>
                                <label for="floatingInput">Country</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="Date_inspection" name="Date_inspection"
                                    placeholder="Date_inspection" required>
                                <label for="floatingInput">Date of inspection</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example"
                                    id="Sales_and_Distribution" name="Sales_and_Distribution" required>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                                <label for="floatingInput">Sales and Distribution</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Blood_product"
                                    name="Blood_product" required>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                                <label for="floatingInput">Blood and blood product</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="Add Manufacturer" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="">All the Manufacturer in repository</h4>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#addNewManufacturerModal">
                    <div class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-plus"></i>
                        <div class="ms-2 d-none d-sm-block">Add new
                            inspection</div>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach($results as $result){?>

        <div class="col-md-4 col-lg-3 col-12 my-2">
            <div class="card shadow" style="min-height: 36rem;">
                <?php if(is_file('./upload_image/'.$result["picture"])): ?>
                <img src="./upload_image/<?php echo $result['picture']?>" class="img-fluid rounded-pill mx-auto mt-3"
                    alt="logo" style="height: 15em;width:15em;">
                <?php elseif(true) : ?>
                <img src="./upload_image/question_mark.png" class="img-fluid rounded-start p-5" alt="question_mark">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['name']; ?></h5>
                    <div><span class="fs-6 fw-bold">Division : </span><span><?php echo $result['Division']?></span>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="d-flex align-items-center justify-content-between m-3 p-2">
                            <div class="d-flex">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <?php
                            $counts = $db->count_inspection($result['name']);
                            foreach ($counts as $count) {
                            ?>
                            <h4 class=""><?php echo $count['number_inspection'];?></h4>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button type="button" class="btn btn-info w-100 mx-1" data-bs-toggle="modal"
                        data-bs-target="#detailModal<?php echo $result['id'];?>">
                        <i class="fa-solid fa-eye"></i> More detail
                    </button>
                </div>
            </div>
        </div>
        <?php 
        include './detailModal.php';
    }
    ?>
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