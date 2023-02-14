<div class="modal fade" tabindex="-1" id="edit_facility<?php echo $result['id'];?>" aria-labelledby="edit_facility">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit-facility" method="POST" action="./database/edit_controller/governement_facility.php"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_question">Edit government-veterinary Facilty</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result['id']?>">
                        <input type="hidden" class="form-control" name="type" id="type" value="government_veterinary">
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Facility_name" name="Facility_name"
                                    placeholder="Facility_name" required value="<?php echo $result['Facility_name'];?>">
                                <label for="floatingInput">Facility name</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Dzongkhag"
                                    name="Dzongkhag" required>
                                    <option value="<?php echo $result['Dzongkhag'];?>">
                                        <?php echo $result['Dzongkhag'];?></option>
                                    <?php include './include/Dzongkhag.php';?>
                                </select>
                                <label for="floatingInput">Dzongkhag</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-warning">Edit</button>
            </form>
        </div>
    </div>
</div>