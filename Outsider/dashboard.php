<?php require './include/header.php';?>
<?php
require './Dashboard/dashboard_back.php';
?>

<div class="text-center rounded-3 my-lg-5 my-3 bg-success text-white">
    <h2 class="p-3">Dashboard</h2>
</div>
<div class="row mb-lg-5">
    <div class="col-lg-6 col-12 shadow mb-5">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-2 fw-bold">Number of inspection (Government premises)</span>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Bar_govern" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
    <div class="col-lg-6 col-12 shadow mb-5">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-2 fw-bold">Number of inspection (Private premises)</span>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Bar_private" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
    <div class="col-lg-8 col-12 shadow mb-5">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-2 fw-bold">Number of government facility in Bhutan( Veterinary )</span>
            <div class="pt-2">
                <a class="btn btn-secondary" href="./detail_dashboard.php?type=government_premise_verterinary"
                    role="button">Details</a>
            </div>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Bar_veterinary" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
    <div class="col-lg-4 col-12 mb-5">
        <div class="card h-50 pb-1 shadow">
            <h5 class="card-header bg-primary text-white">Total government facility (Veterinary)</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <p class="fw-bold" style="font-size: 7rem;"><?php echo array_sum($Sum_dzongkhag_veterinary);?>
                </p>
            </div>
        </div>
        <div class="card h-25 my-1 shadow">
            <?php $maxKey = array_search(max($Sum_dzongkhag_veterinary), $Sum_dzongkhag_veterinary);?>
            <h5 class="card-header bg-primary text-white">the highest number of facility</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <h2 class="card-title"><?php echo $Dzongkhag_veterinary[$maxKey] ;?></h2>
            </div>
        </div>
        <div class="card h-25 mt-1 shadow">
            <h5 class="card-header bg-primary text-white">Average facility in each Dzongkhag</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <h2 class="card-title"><?php echo array_sum($Sum_dzongkhag_veterinary)/count($Dzongkhag_veterinary) ;?>
                </h2>
                </h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 mb-5">
        <div class="card h-50 pb-1 shadow">
            <h5 class="card-header bg-primary text-white">Total government facility (Human)</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <p class="fw-bold" style="font-size: 7rem;"><?php echo array_sum($Sum_dzongkhag_govern);?>
                </p>
            </div>
        </div>
        <div class="card h-25 my-1 shadow">
            <?php $maxKey = array_search(max($Sum_dzongkhag_govern), $Sum_dzongkhag_govern);?>
            <h5 class="card-header bg-primary text-white">the highest number of facility</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <h2 class="card-title"><?php echo $Dzongkhag_veterinary[$maxKey] ;?></h2>
            </div>
        </div>
        <div class="card h-25 mt-1 shadow">
            <h5 class="card-header bg-primary text-white">Average facility in each Dzongkhag</h5>
            <div class="card-body text-center align-middle" style="background-color: #EBF5FB;">
                <h2 class="card-title"><?php echo array_sum($Sum_dzongkhag_govern)/count($Dzongkhag_govern) ;?>
                </h2>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12 shadow mb-5">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-2 fw-bold">Number of government facility in Bhutan( Human )</span>
            <div class="pt-2">
                <a class="btn btn-secondary" href="./detail_dashboard.php?type=government_premise_human"
                    role="button">Details</i></a>
            </div>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Pie_govern" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
    <div class="col-lg-6 col-12 shadow">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-2 fw-bold">Number of private facility in Bhutan</span>
            <div class="pt-2">
                <a class="btn btn-secondary" href="./detail_dashboard.php?type=private_premise_human"
                    role="button">Details</a>
            </div>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Pie_private" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
    <div class="col-lg-6 col-12 shadow">
        <div class="d-flex align-items-center justify-content-between">
            <span class="pt-3 fw-bold">Compliance score</span>
        </div>
        <hr class="my-2">
        <div class="">
            <canvas id="Bar_compliance" class="px-2 w-100 h-100"></canvas>
        </div>
    </div>
</div>

<?php require './Dashboard/chart.php';?>

<?php require './include/footer.php';?>