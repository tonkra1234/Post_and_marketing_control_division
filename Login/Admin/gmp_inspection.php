<?php require './include/header.php';?>
<?php
require_once './database/db_GMP.php';
$db_gmp = new GmpInspection();
$results_inspectors = $db_gmp->inspectors();

?>
<div class="container-fluid">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Good Manufacturing Practices inspection</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Inspector details</h4>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#addNewManufacturerModal"><div class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-plus"></i><div class="ms-2 d-none d-sm-block">Add new
                            inspection</div></div></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table caption-top shadow">
                    <caption>Inspectors</caption>
                    <thead class="rounded-3 text-white" style="background-color: #008E2F ;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Avartar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Division</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     foreach ($results_inspectors as $result) {
                     
                    ?>
                        <tr>
                            <th scope="row"><?php echo $number;?></th>
                            <td>
                                <?php if(is_file('./image/Officer_image/'.$result['picture'])): ?>
                                <div class="d-flex align-items-center"><img class="rounded-circle"
                                        src="./image/Officer_image/<?php echo $result['picture']?>" width="30"></div>
                                <?php else: ?>
                                <div class="d-flex align-items-center"><img class="rounded-circle"
                                        src="./image/Officer_image/question_mark.png" width="30"></div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $result['name'];?></td>
                            <td><?php echo $result['Division'];?></td>
                        </tr>
                        <?php 
                     $number++;
                     }
                     ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
        </main>
    </div>
</div>
<?php require './include/footer.php';?>