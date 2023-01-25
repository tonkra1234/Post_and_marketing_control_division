<!-- Modal -->
<div class="modal fade" id="updateModal<?php echo $result['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail of each inspection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <form action="./edit_SQL.php" method="post">
                    <div class="card shadow">
                        <div class="card-header each_inspect_edit">
                            <p class="fw-bold fs-4 text-center mb-0"><?php echo $result['id']?></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="id" name="id" class="form-control"
                                    value="<?php echo $result['id'];?>">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Generic_name" name="Generic_name"
                                            placeholder="Generic name" required
                                            value="<?php echo $result['Generic_name']?>">
                                        <label for="floatingInput">Generic name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Brand_name" name="Brand_name"
                                            placeholder="Brand name" required
                                            value="<?php echo $result['Brand_name']?>">
                                        <label for="floatingInput">Brand name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Batch_No" name="Batch_No"
                                            placeholder="Batch No" required value="<?php echo $result['Batch_No']?>">
                                        <label for="floatingInput">Batch No</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Manufacturer" name="Manufacturer"
                                            placeholder="Manufacturer" required
                                            value="<?php echo $result['Manufacturer']?>">
                                        <label for="floatingInput">Manufacturer</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="MAH" name="MAH" placeholder="MAH"
                                            required value="<?php echo $result['MAH']?>">
                                        <label for="floatingInput">MAH</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Mode_of_registration"
                                            name="Mode_of_registration" placeholder="Mode of registration" required
                                            value="<?php echo $result['Mode_of_registration']?>">
                                        <label for="floatingInput">Mode of registration</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Class_of_medicines"
                                            name="Class_of_medicines" placeholder="Class of medicines" required
                                            value="<?php echo $result['Class_of_medicines']?>">
                                        <label for="floatingInput">Class of medicines</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Class_of_recall"
                                            name="Class_of_recall" placeholder="Class of recall" required
                                            value="<?php echo $result['Class_of_recall']?>">
                                        <label for="floatingInput">Class of recall</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="Level_of_Recall"
                                            name="Level_of_Recall" placeholder="Level of Recall" required
                                            value="<?php echo $result['Level_of_Recall']?>">
                                        <label for="floatingInput">Level of Recall</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="Date_of_recall"
                                            name="Date_of_recall" placeholder="Date of recall" required
                                            value="<?php echo $result['Date_of_recall']?>">
                                        <label for="floatingInput">Date of recall</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="Reason_for_recall" name="Reason_for_recall"
                                            style="height: 100px;" placeholder="Reason for recall"
                                            required><?php echo $result['Reason_for_recall']?></textarea>
                                        <label for="floatingInput">Reason for recall</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" value="Edit recalled product" class="btn btn-warning w-100">Update
                                data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>