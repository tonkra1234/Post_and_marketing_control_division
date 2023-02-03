<?php 

require './include/header.php';
include './db.php';
$obj = new DataBase;
?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Vaccine list
    </p>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mt-auto mb-1">Vaccine list in repository</h4>
            </div>
            <div>
                <a class="btn btn-primary" href="./add_page.php">
                    <div class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-plus"></i>
                        <div class="ms-2 d-none d-sm-block">Add new manufacturer</div>
                    </div>
                </a>
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
                <tr id="refresh-delete<?php echo $result['id'];?>">
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
                            <button type="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1"
                                data-bs-toggle="modal" data-bs-target="#editModal<?php echo $result['id'];?>">
                                Edit
                            </button>
                            <a class="btn btn-info rounded-pill d-grid py-1 my-1" data-bs-toggle="offcanvas"
                                href="#Detail<?php echo $result['id'];?>" role="button"
                                aria-controls="#Detail<?php echo $result['id'];?>">
                                Detail
                            </a>
                            <button type="button" class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1" value="<?php echo $result['id'] ;?>">Delete</button>
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
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var vaccineId = $(this).val();
    
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type :"POST",
                    url : "./delete_confirm.php",
                    data : {
                        'vaccinedelete': true,
                        'vaccineId': vaccineId,
                    },
                    success:function(reponse){

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#refresh-delete'+vaccineId).hide(1000);
            }
        })

    });
</script>

<?php require './include/footer.php';?>