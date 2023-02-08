<?php

$inspect_id = $util->testInput($row["id"]) ;
$fetch_data_score = $db->data_score_g($inspect_id);
$data_score = $fetch_data_score;
$data = $db->Data_2021_g($inspect_id);

$sum_raw = $data_score['premise']+$data_score['Good_storage_Practice']+$data_score['Good_Dispensing_Practice']+$data_score['Documentation']+$data_score['Good_Compounding_Practice'];
$percentage = 100-(($sum_raw * 100)/39);
$sub_percentage_1 = number_format((100 - (($data_score['premise']*100)/6)),1);
$sub_percentage_2 = number_format((100 - (($data_score['Good_storage_Practice']*100)/11)),1);
$sub_percentage_3 = number_format((100 - (($data_score['Good_Dispensing_Practice']*100)/8)),1);
$sub_percentage_4 = number_format((100 - (($data_score['Documentation']*100)/8)),1);
$sub_percentage_5 = number_format((100 - (($data_score['Good_Compounding_Practice']*100)/6)),1);

?>
<!-- Modal -->
<div class="modal fade" id="twentyOne<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="twentyOne"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="twentyOne">Details</h5>
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
                        <h5>Good Compounding Practice</h5>
                    </div>
                    <div class="col-lg-6 col-12 border border-dark">
                        <?php echo $sub_percentage_5;?>%
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