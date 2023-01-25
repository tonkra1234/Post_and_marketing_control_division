<!-- Modal -->
<div class="modal fade" id="detailModal<?php echo $result['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail of each inspection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    <?php
                        $details = $db->read_detail($result['name']);
                        foreach ($details as $detail) {
                        $date = date_create($detail['Date_inspection']);
                        ?>
                    <div class="col-6 mb-3">
                        <div class="card shadow">
                            <div class="card-header each_inspect_detail">
                                <span class="fw-bold fs-6"><?php echo $detail['Firm_inspection']?></span>
                            </div>
                            <div class="card-body">
                                <div>
                                    <i class="fa-regular fa-earth-americas"></i> <span class="fs-6 fw-bold">Country
                                        :
                                    </span><span><?php echo $detail['Country']?>
                                </div>
                                <div>
                                    <i class="fa-solid fa-calendar-days"></i> <span class="fs-6 fw-bold">Date of
                                        inspection : </span><span><?php echo date_format($date,'d-M-Y');?></span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-building-circle-arrow-right"></i> <span
                                        class="fs-6 fw-bold">Sale and distribution :
                                    </span><span><?php echo $detail['Sales_and_Distribution']?></span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-briefcase-medical"></i> <span class="fs-6 fw-bold">Blood
                                        and
                                        blood product :
                                    </span><span><?php echo $detail['Blood_product']?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-warning w-100"
                                    data-bs-target="#editDetail<?php echo $detail['id'];?>" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Edit</button>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                            
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$details = $db->read_detail($result['name']);
foreach ($details as $detail) {
?>
<div class="modal fade" id="editDetail<?php echo $detail['id'];?>" aria-hidden="true" aria-labelledby="editDetail"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="./edit_SQL.php" method="post" id="edit-GMP">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Edit form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="id" required
                            value="<?php echo $detail['id'];?>">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Firm_inspection" name="Firm_inspection"
                                    placeholder="Firm_inspection" required
                                    value="<?php echo $detail['Firm_inspection'];?>">
                                <label for="floatingInput">Firm name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Inspector_name"
                                    name="Inspector_name" required>
                                    <option selected><?php echo $detail['Inspector'];?></option>
                                    <?php foreach($results as $result){?>
                                    <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                                    <?php }?>
                                </select>
                                <label for="floatingInput">Inspector name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Division"
                                    name="Division" required>
                                    <option selected><?php echo $detail['Division'];?></option>
                                    <option value="PMCD">PMCD</option>
                                    <option value="Registration Division">Registration Division</option>
                                    <option value="PPS">PPS</option>
                                </select>
                                <label for="floatingInput">Division</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Country"
                                    name="Country" required>
                                    <option selected><?php echo $detail['Country'];?></option>
                                    <?php include './include/country_select.php';?>
                                </select>
                                <label for="floatingInput">Country</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="Date_inspection" name="Date_inspection"
                                    placeholder="Date_inspection" required
                                    value="<?php echo $detail['Date_inspection'];?>">
                                <label for="floatingInput">Date of inspection</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example"
                                    id="Sales_and_Distribution" name="Sales_and_Distribution" required>
                                    <option selected><?php echo $detail['Sales_and_Distribution'];?></option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                                <label for="floatingInput">Sales and Distribution</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="Blood_product"
                                    name="Blood_product" required>
                                    <option selected><?php echo $detail['Blood_product'];?></option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                                <label for="floatingInput">Blood and blood product</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100">
                        <button type="button" class="btn btn-secondary w-50 mx-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value="Edit GMP" class="btn btn-warning w-50 mx-1">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
}
?>
