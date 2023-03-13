<div class="offcanvas offcanvas-start" tabindex="-2" id="Detail<?php echo $result['id'];?>" aria-labelledby="Detail">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Specific detail</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Registration No</h6>
            </div>
            <div class="col-md-6">
                <?php echo json_decode($result['RegistrationNo'])[1];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Authorization No</h6>
            </div>
            <div class="col-md-6">
                <?php echo json_decode($result['AuthorizationNo'])[1];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Lot name</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['lot_name'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Importing country</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['importing_country'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Manufacturer</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Manufacturer'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Type of vaccine</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Type_vaccine'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Batch/lot no</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Batch_no'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Date of Manufacture</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Date_Manufacture'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Date of Expiry</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Date_Expiry'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Quantity</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Quantity'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Vial</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Vial'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Requesting Agency</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Requesting_Agency'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Storage Condition</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Storage_Condition'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Date of Application</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Date_Application'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Certificate Issue Date</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Certificate_Issue_Date'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Pharmaceutical Form</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Pharmaceutical_Form'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Diluent</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Diluent'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Diluent Number</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Diluent_Number'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>SLP Received</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['SLP_Received'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Labels_Received</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Labels_Received'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Diluent</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Diluent'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Samples_Received</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Samples_Received'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Reviewer Assigned</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Reviewer_Assigned'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Deadline Assessment</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Deadline_Assessment'];?>
            </div>
            <hr class="my-1">
            <div class="col-md-6">
                <h6>Remarks</h6>
            </div>
            <div class="col-md-6">
                <?php echo $result['Remark'];?>
            </div>
            <hr class="my-2">
            <div class="col-md-12 col-12 my-lg-3 my-1">
                <h5>B. cold chain condition</h5>
            </div>
            <?php 
            $checkB =json_decode($result['checklistB']);
            foreach ($checkB as $Blist) { 
            ?>
            <div class="col-md-10 col-12 border">
                <h6><?php echo $Blist[2]?></h6>
            </div>
            <div class="col-md-2 col-12 border">
                <h6><?php echo $Blist[0]?></h6>
            </div>
            <div class="col-md-12 col-12 border">
                <?php echo $Blist[1];?>
            </div>
            <?php 
            }
            ?>
            <div class="col-md-12 col-12 my-lg-3 my-1">
                <h5>C. Documentary Verification</h5>
            </div>
            <?php 
            $checkC =json_decode($result['checklistC']);
            foreach ($checkC as $Clist) { 
            ?>
            <div class="col-md-10 col-12 border">
                <h6><?php echo $Clist[2]?></h6>
            </div>
            <div class="col-md-2 col-12 border">
                <h6><?php echo $Clist[0]?></h6>
            </div>
            <div class="col-md-12 col-12 border">
                <?php echo $Clist[1];?>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
</div>