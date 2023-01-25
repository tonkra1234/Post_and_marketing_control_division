<!-- Modal -->
<div class="modal fade" id="detailModal<?php echo $number;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail of self inspection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Inspection detail</h4>
                <div class="row mb-3 border">
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold">
                             <i class="fa-solid fa-building"></i> Name of premises :
                        </span>
                        <span><?php echo $result['Name_of_Premise']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-brands fa-unity"></i> Department : </span><span><?php echo $result['Department']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-location-dot"></i> Dzongkhag : </span><span><?php echo $result['Dzongkhag']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-calendar-days"></i> Date of self inspection : </span><span><?php echo $result['Date_self_inspection']?></span>
                    </div>
                    <div class="col-md-8 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-map-location"></i> Address : </span><span><?php echo $result['Address']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-regular fa-id-badge"></i> Name : </span><span><?php echo $result['Name']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-ticket"></i> BMHC No : </span><span><?php echo $result['BMHC_No']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-at"></i> Email : </span><span><?php echo $result['Email']?></span>
                    </div>
                    <div class="col-md-4 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-phone"></i> Contact Number : </span><span><?php echo $result['Contact_Number']?></span>
                    </div>
                    <div class="col-md-8 col-12 border">
                        <span class="fw-bold"><i class="fa-solid fa-note-sticky"></i> Note: </span><span><?php echo $result['Note']?></span>
                    </div>
                </div>
                <h4>Check list detail</h4>
                <div class="row">
                    <div class="col-1 border ps-1 pe-auto fw-bold">
                        <div class="d-flex justify-content-center align-items-center">No</div>
                    </div>
                    <div class="col-4 border fw-bold">Question</div>
                    <div class="col-3 border fw-bold">ANS</div>
                    <div class="col-4 border fw-bold">Note</div>
                </div>
                <!-- <?php 
                $no = 1;
                $answer = json_decode($result['check_list']);
                foreach ($questions as $question) {
                ?>
                <div class="row">
                    <div class="col-1 border">
                        <div class="d-flex justify-content-center align-items-center"><?php echo $no; ?></div>
                    </div>
                    <div class="col-4 border"><?php echo $question['question'];?></div>

                    <div class="col-3 border"><?php echo $answer[$no-1][0];?></div>
                    <div class="col-4 border"><?php echo $answer[$no-1][1];?></div>

                </div>
                <?php
                $no++;
                }
                ?> -->
                <?php 
                $no = 1;
                $answers = json_decode($result['check_list']);
                foreach ($answers as $answer) {
                ?>
                <div class="row">
                    <div class="col-1 border">
                        <div class="d-flex justify-content-center align-items-center"><?php echo $no; ?></div>
                    </div>
                    <div class="col-4 border"><?php echo $answer[2];?></div>

                    <div class="col-3 border"><?php echo $answer[0];?></div>
                    <div class="col-4 border"><?php echo $answer[1];?></div>

                </div>
                <?php
                $no++;
                }
                ?>
            </div>
        </div>
    </div>
</div>