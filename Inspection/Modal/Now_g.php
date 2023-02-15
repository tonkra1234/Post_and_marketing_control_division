<!-- Modal -->
<div class="modal fade" id="Now_g<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="Now_g"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Now_g">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="row mx-lg-1">
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Inspection id</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['inspection_id'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Division</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['division'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Date of inspection</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['date_of_inspection'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Date of last inspection</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['date_of_last_inspection'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Type of inspection</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['type_of_inspection'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Dzongkhag</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['dzongkhag'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Name of premise</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['name_of_premise'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Type of premise</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['type_of_premise'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Address of premise</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['address_of_premise'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Scope of inspection</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['scope_of_inspection'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Technical authorization no</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['technical_authorization_no'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Validity premise</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['validity_premise'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Competent_name</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['competent_name'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Email competent</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['email_competent'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>CP registration no</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['cp_registration_no'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Validity competent</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['validity_competent'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Contact number</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['conatct_number'];?>
                            </div>
                            <div class="col-lg-3 col-12 border border-dark">
                                <h6>Other Contact</h6>
                            </div>
                            <div class="col-lg-9 col-12 border border-dark">
                                <?php echo $row['other_contact'];?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="row mx-lg-1 mt-lg-5">
                            <div class="col-1 border border-dark">
                                <p class="mb-lg-0 fw-bold">No</p>
                            </div>
                            <div class="col-9 border border-dark">
                                <p class="mb-lg-0 fw-bold">Question</p>
                            </div>
                            <div class="col-1 border border-dark">
                                <p class="mb-lg-0 fw-bold">Level</p>
                            </div>
                            <div class="col-1 border border-dark">
                                <p class="mb-lg-0 fw-bold">Ans</p>
                            </div>
                            <?php 
                            $i = 1;
                            $check_list = json_decode($row['check_list']);
                            foreach($check_list as $result){ 
                            ?>
                                <div class="col-1 border border-dark">
                                    <?php echo $i;?>
                                </div>
                                <div class="col-9 border border-dark">
                                    <?php echo $result[2];?>
                                </div>
                                <div class="col-1 border border-dark">
                                    <?php echo $result[3];?>
                                </div>
                                <div class="col-1 border border-dark">
                                    <?php echo $result[0];?>
                                </div>
                            <?php 
                                $i++;
                                } 
                            ?>
                        </div>

                    </div>
                    <?php 
                    $location = json_decode($row['GPS_position']);
                    if(isset($location) && !empty($location)):
                    ?>
                    <div class="col-lg-12 col-12 mx-lg-2 my-lg-4">
                        <?php 
                        ?>
                        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $location[1];?>,<?php echo $location[0];?>&output=embed"></iframe>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>