<div class="offcanvas offcanvas-start" tabindex="-2" id="Detail<?php echo $result['id'];?>"
  aria-labelledby="Detail">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Specific detail</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <div class="row">
        <div class="col-md-6">
          <h6>Application ID</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Application_ID'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Product Name</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Product_Name'];?>
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
          <h6>Requesting Agency</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Requesting_Agency'];?>
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
          <h6>Lot Number</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Lot_Number'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Lot Size (Vials)</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Lot_Size'];?>
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
          <h6>Storage Condition</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Storage_Condition'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Dose & Pharmaceutical Form</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Pharmaceutical_Form'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Presentation (dose/vial)</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Presentation'];?>
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
          <h6>Labels and Leaflets recieved</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Labels_Recieved'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Samples Recieved</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Samples_Recieved'];?>
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
          <h6>Deadline for Assessment</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Deadline_Assessment'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Lot Release Certificate Issue Date</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Certificate_Issue_Date'];?>
        </div>
        <hr class="my-1">
        <div class="col-md-6">
          <h6>Remarks</h6>
        </div>
        <div class="col-md-6">
          <?php echo $result['Remarks'];?>
        </div>
      </div>
  </div>
</div>