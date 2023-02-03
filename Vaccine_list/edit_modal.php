<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $result['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="edit-existing" method="POST" action="./edit_SQL.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit the manufacturer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $result['id'];?>">
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Application_ID" name="Application_ID"
                                    placeholder="Application_ID" required
                                    value="<?php echo $result['Application_ID'];?>">
                                <label for="floatingInput">Application ID</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Product_Name" name="Product_Name"
                                    placeholder="Product_Name'name" required
                                    value="<?php echo $result['Product_Name'];?>">
                                <label for="floatingInput">Product name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Manufacturer" name="Manufacturer"
                                    placeholder="Manufacturer of medicine" required
                                    value="<?php echo $result['Manufacturer'];?>">
                                <label for="floatingInput">Manufacturer</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Storage_Condition" name="Storage_Condition"
                                    placeholder="Storage Condition" required
                                    value="<?php echo $result['Storage_Condition'];?>">
                                <label for="floatingInput">Storage Condition</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="Date_Application" name="Date_Application"
                                    placeholder="Date_Application of medicine" required
                                    value="<?php echo $result['Date_Application'];?>">
                                <label for="floatingInput">Date of Application</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Lot_Number" name="Lot_Number"
                                    placeholder="Lot Number" required value="<?php echo $result['Lot_Number'];?>">
                                <label for="floatingInput">Lot Number</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Lot_Size" name="Lot_Size"
                                    placeholder="Lot size" required value="<?php echo $result['Lot_Size'];?>">
                                <label for="floatingInput">Lot size</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Requesting_Agency" name="Requesting_Agency"
                                    placeholder="Requesting Agency" required
                                    value="<?php echo $result['Requesting_Agency'];?>">
                                <label for="floatingInput">Requesting Agency</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Pharmaceutical_Form"
                                    name="Pharmaceutical Form" placeholder="Pharmaceutical_Form of medicine" required
                                    value="<?php echo $result['Pharmaceutical_Form'];?>">
                                <label for="floatingInput">Pharmaceutical Form</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Presentation" name="Presentation"
                                    placeholder="Presentation" required value="<?php echo $result['Presentation'];?>">
                                <label for="floatingInput">Presentation</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Diluent" name="Diluent"
                                    placeholder="Diluent of medicine" required value="<?php echo $result['Diluent'];?>">
                                <label for="floatingInput">Diluent</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Diluent_Number" name="Diluent_Number"
                                    placeholder="Diluent Number" required
                                    value="<?php echo $result['Diluent_Number'];?>">
                                <label for="floatingInput">Diluent Number</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="SLP_Received"
                                    name="SLP_Received" placeholder="SLP_Received of medicine">
                                    <option value="<?php echo $result['SLP_Received'];?>">
                                        <?php echo $result['SLP_Received'];?></option>
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
                                    id="Labels_Received" name="Labels_Received" placeholder="Labels Received">
                                    <option value="<?php echo $result['Labels_Received'];?>">
                                        <?php echo $result['Labels_Received'];?></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="NA">NA</option>
                                </select>
                                <label for="floatingInput">Labels Received</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" required
                                    id="Samples_Received" name="Samples_Received" placeholder="Samples Received">
                                    <option value="<?php echo $result['Samples_Received'];?>">
                                        <?php echo $result['Samples_Received'];?></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="NA">NA</option>
                                </select>
                                <label for="floatingInput">Samples Received</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="Reviewer_Assigned" name="Reviewer_Assigned"
                                    placeholder="Reviewer Assigned" required
                                    value="<?php echo $result['Reviewer_Assigned'];?>">
                                <label for="floatingInput">Reviewer Assigned</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="Deadline_Assessment"
                                    name="Deadline_Assessment" placeholder="Deadline Assessment" required
                                    value="<?php echo $result['Deadline_Assessment'];?>">
                                <label for="floatingInput">Deadline Assessment</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="form-floating mb-3">
                                <input type="month" class="form-control" id="Date_Manufacture" name="Date_Manufacture"
                                    placeholder="Date Manufacture" required
                                    value="<?php echo $result['Date_Manufacture'];?>">
                                <label for="floatingInput">Date of Manufacture</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="form-floating mb-3">
                                <input type="month" class="form-control" id="Date_Expiry" name="Date_Expiry"
                                    placeholder="Date of Expiry" required value="<?php echo $result['Date_Expiry'];?>">
                                <label for="floatingInput">Date of Expiry</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="Certificate_Issue_Date"
                                    name="Certificate_Issue_Date" placeholder="Certificate Issue Date" required
                                    value="<?php echo $result['Certificate_Issue_Date'];?>">
                                <label for="floatingInput">Certificate Issue Date</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="Remarks" name="Remarks" placeholder="Remarks"
                                    style="height: 100px" required><?php echo $result['Remarks'];?></textarea>
                                <label for="floatingInput">Remarks</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="Edit Manufacturer" class="btn btn-warning w-100">Update data</button>
                </div>
            </form>
        </div>
    </div>
</div>