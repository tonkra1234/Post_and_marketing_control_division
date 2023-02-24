<?php

// $id = $row["id"] ;
// $data = $db->Data_2022_p($id);
// $inspection_id = $row["inspection_id"];

// $question_ans = $db->Question_ans2022_p($inspection_id);

?>

<!-- Modal -->
<!-- <div class="modal fade" id="twentyTwo<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="twentyOne"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="twentyOne">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="row mx-lg-1">
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Inspection id</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['inspection_id'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Division</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['division'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Date of inspection</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['date_of_inspection'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Date of last inspection</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['date_of__last_inspection'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Type of inspection</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['type_of_inspection'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Dzongkhag</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['dzongkhag'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Name of premise</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['name_of_premise'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Type of premise</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['type_of_premise'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Address of premise</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['address_of_premise'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Scope of inspection</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['scope_of_inspection'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Technical authorization no</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['technical_authorization_no'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Validity premise</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['validity_premise'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Competent_name</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['competent_name'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Email competent</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['email_competent'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>CP registration no</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['cp_registration_no'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Validity competent</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['validity_competent'];?>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <h6>Contact number</h6>
                            </div>
                            <div class="col-lg-6 col-12 border border-dark">
                                <?php echo $data['conatct_number'];?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="row">
                            <div class="col-lg-8 col-12 border border-dark">
                                <p class="mb-lg-0 fw-bold">Question</p>
                            </div>
                            <div class="col-lg-2 col-12 border border-dark">
                                <p class="mb-lg-0 fw-bold">Level</p>
                            </div>
                            <div class="col-lg-2 col-12 border border-dark">
                                <p class="mb-lg-0 fw-bold">Ans</p>
                            </div>
                            <?php 
                            $i = 1;
                            foreach($question2022_p as $result){ 
                            ?>
                                <div class="col-lg-8 col-12 border border-dark">
                                    <?php echo $result['question'];?>
                                </div>
                                <div class="col-lg-2 col-12 border border-dark">
                                    <?php echo $result['level'];?>
                                </div>
                                <div class="col-lg-2 col-12 border border-dark">
                                    <?php echo $question_ans['question'.$i.'_ask'];?>
                                </div>
                            <?php 
                                $i++;
                                } 
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php

$inspect_id = $row["id"];
$fetch_data_score = $db->data_score_p($inspect_id);
$data_score = $fetch_data_score;
$data = $db->Data_2021_p($inspect_id);

$sum_raw = $data_score['premise']+$data_score['Good_storage_Practice']+$data_score['Good_Dispensing_Practice']+$data_score['Documentation'];
$percentage = 100-(($sum_raw * 100)/39);
$sub_percentage_1 = number_format((100 - (($data_score['premise']*100)/6)),1);
$sub_percentage_2 = number_format((100 - (($data_score['Good_storage_Practice']*100)/11)),1);
$sub_percentage_3 = number_format((100 - (($data_score['Good_Dispensing_Practice']*100)/8)),1);
$sub_percentage_4 = number_format((100 - (($data_score['Documentation']*100)/8)),1);


?>
<!-- Modal -->
<div class="modal fade" id="twentyTwo<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="twentyTwo"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="twentyTwo">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-lg-2">
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Inspection id</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['inspection_id'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Division</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['division'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Date of inspection</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['date_of_inspection'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Date of last inspection</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['date_of__last_inspection'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Type of inspection</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['type_of_inspection'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Dzongkhag</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['dzongkhag'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Name of premise</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['name_of_premise'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Type of premise</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['type_of_premise'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Address of premise</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['address_of_premise'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Scope of inspection</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['scope_of_inspection'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Technical authorization no</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['technical_authorization_no'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Validity premise</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['validity_premise'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Competent_name</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['competent_name'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Email competent</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['email_competent'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>CP registration no</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['cp_registration_no'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Validity competent</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['validity_competent'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Contact number</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $data['conatct_number'];?>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Premise</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $sub_percentage_1;?>%
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Good storage Practice</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $sub_percentage_2;?>%
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Good Dispensing Practice</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $sub_percentage_3;?>%
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Documentation</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $sub_percentage_4;?>%
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <h5>Average score</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $percentage;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>