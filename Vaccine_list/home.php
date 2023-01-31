<?php 

require './include/header.php';
include './db.php';
$obj = new DataBase;
?>

<div class="my-5">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mt-auto mb-1">Vaccine list in repository</h4>
            </div>
            <div>
                <a class="btn btn-primary" href="./add_page.php"><i class="fa-solid fa-plus"></i> Add new manufacturer</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive shadow">
        <table class="table table-light table-bordered">
            <thead class="table-success">
                <tr class="text-center">
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
                $results = ($obj->read()[0]);

                $page_no = ($obj->read()[1]);
                $total_no_of_pages = ($obj->read()[2]);
                $total_records = ($obj->read()[3]);
                $total_records_per_page = ($obj->read()[4]);
                $number = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                foreach($results as $result){
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Product_Name'];?></td>
                    <td><?php echo $result['Manufacturer'];?></td>
                    <td><?php echo $result['Lot_Number'];?></td>
                    <td><?php echo $result['Lot_Size'];?></td>
                    <td><?php echo $result['Date_Manufacture'];?></td>
                    <td><?php echo $result['Date_Expiry'];?></td>
                    <td><?php echo $result['Storage_Condition'];?></td>
                    <td>
                        <div class="d-grid">
                            <button type="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $result['id'];?>">
                                Edit
                            </button>
                            <a class="btn btn-info rounded-pill d-grid py-1 my-1" data-bs-toggle="offcanvas" href="#Detail<?php echo $result['id'];?>" role="button" aria-controls="#Detail<?php echo $result['id'];?>">
                                Detail
                            </a>
                        </div>
                    </td>
                </tr>

                <?php 
                    $number++;
                    include './detail_offCanvas.php';
                    include './edit_modal.php';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        include './paginator.php';
    ?>

</div>

<?php require './include/footer.php';?>