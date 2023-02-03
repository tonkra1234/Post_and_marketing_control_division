<?php require './include/header.php';?>
<?php
require_once './database/db_vaccine.php';
$db_vaccine = new Vaccine();
$results_vaccine = $db_vaccine->fetch_trash_vaccine();
$count_vaccine = $db_vaccine->count_trash_vaccine();

$results_approval_vaccine = $db_vaccine->fetch_approval_vaccine();
$count_approval_vaccine = $db_vaccine->count_approval_vaccine();

?>
<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Vaccine list</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Trash list</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered shadow">
                    <thead class="rounded-3 text-white" style="background-color: #B25003 ;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Lot Number</th>
                            <th scope="col">Lot Size (Vials)</th>
                            <th scope="col">Date of Manufacture</th>
                            <th scope="col">Date of Expiry</th>
                            <th scope="col">Storage Condition</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     if($count_vaccine['total_row_trash'] > 0){
                        foreach ($results_vaccine as $result) {
                     
                    ?>
                        <tr id="refresh-delete<?php echo $result['id']?>">
                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result['Product_Name']?></td>
                            <td><?php echo $result['Manufacturer']?></td>
                            <td><?php echo $result['Lot_Number']?></td>
                            <td><?php echo $result['Lot_Size']?></td>
                            <td><?php echo $result['Date_Manufacture']?></td>
                            <td><?php echo $result['Date_Expiry']?></td>
                            <td><?php echo $result['Storage_Condition']?></td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="retrieve_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Retrieve</button>
                                    <button type="button"
                                        class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="min-height: 10rem;">
                                    <h3>There is no data founded</h3>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="">Aproving list</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered shadow">
                    <thead class="rounded-3 text-white" style="background-color: #008E2F ;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Lot Number</th>
                            <th scope="col">Lot Size (Vials)</th>
                            <th scope="col">Date of Manufacture</th>
                            <th scope="col">Date of Expiry</th>
                            <th scope="col">Storage Condition</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $number = 1;
                     if($count_approval_vaccine['total_row_pre_approve'] > 0){
                        foreach ($results_approval_vaccine as $result) {
                     
                    ?>
                        <tr id="refresh-approval<?php echo $result['id']?>">

                            <?php include './vaccine_input_hidden.php';?>

                            <th scope="row" class="text-center"><?php echo $number;?></th>
                            <td><?php echo $result['Product_Name']?></td>
                            <td><?php echo $result['Manufacturer']?></td>
                            <td><?php echo $result['Lot_Number']?></td>
                            <td><?php echo $result['Lot_Size']?></td>
                            <td><?php echo $result['Date_Manufacture']?></td>
                            <td><?php echo $result['Date_Expiry']?></td>
                            <td><?php echo $result['Storage_Condition']?></td>
                            <td>
                                <div class="d-grid">
                                    <button type="button"
                                        class="approval_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Approval</button>
                                    <button type="button"
                                        class="reject_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1"
                                        value="<?php echo $result['id']?>">Reject</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="min-height: 10rem;">
                                    <h3>There is no data founded</h3>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include './js/vaccine_button_control.php';?>
<?php require './include/footer.php';?>