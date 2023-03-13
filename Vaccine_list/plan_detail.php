<div class="offcanvas offcanvas-start" tabindex="-2" id="Detail<?php echo $result['id'];?>" aria-labelledby="Detail">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Specific detail</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row">
      <div class="col-md-6">
        <h6>Premises name</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Premises_name'];?>
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
        <h6>Manufacturer</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Manufacturer'];?>
      </div>
      <hr class="my-1">
      <div class="col-md-6">
        <h6>Proposed Date</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Proposed_Date'];?>
      </div>
      <hr class="my-1">
      <div class="col-md-6">
        <h6>Name of Vaccine</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Name_Vaccine'];?>
      </div>
      <hr class="my-1">
      <div class="col-md-6">
        <h6>Estimated Cost</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Estimated_Cost'];?>
      </div>
      <hr class="my-1">
      <div class="col-md-6">
        <h6>Name of the proposed official(s)</h6>
      </div>
      <div class="col-md-6">
        <?php echo $result['Proposed_official'];?>
      </div>
      <hr class="my-1">
    </div>
  </div>
</div>