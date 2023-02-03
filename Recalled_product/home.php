<?php 

require './include/header.php';
require './db.php';

$db = new Database();

?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Recalled products
    </p>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="">All the recalled products in repository</h4>
            </div>
            <div>
            <a href="./add_page.php" class="btn btn-primary">
                <div class="d-flex align-items-center justify-content-center"><i class="fa-solid fa-plus"></i>
                        <div class="ms-2 d-none d-sm-block">Add new
                    recalled product</div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive shadow">
        <table class="table table-striped table-bordered table-hover rounded-3">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Generic name</th>
                    <th scope="col">Brand name</th>
                    <th scope="col">Batch No</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Level of Recall</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $results = ($db->read()[0]);
            $page_no = ($db->read()[1]);
            $total_no_of_pages = ($db->read()[2]);
            $total_records = ($db->read()[3]);
            $total_records_per_page = ($db->read()[4]);
            $number = ($total_records_per_page*$page_no)-($total_records_per_page-1);
            foreach($results as $result){
            ?>
                <tr id="refresh-delete<?php echo $result['id']?>">
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Generic_name']?></td>
                    <td><?php echo $result['Brand_name']?></td>
                    <td><?php echo $result['Batch_No']?></td>
                    <td><?php echo $result['Manufacturer']?></td>
                    <td><?php echo $result['Level_of_Recall']?></td>
                    <td>
                        <div class="d-grid">
                            <button type="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1"
                                data-bs-toggle="modal"
                                data-bs-target="#updateModal<?php echo $result['id'] ;?>">Edit</button>
                            <button class="btn btn-info btn-sm rounded-pill d-grid py-1 my-1" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#detailModal<?php echo $result['id'];?>"
                                aria-controls="offcanvasExample">
                                More
                            </button>
                            <button type="button" class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1" value="<?php echo $result['id'] ;?>">Delete</button>
                        </div>
                    </td>
                </tr>
                <?php 
                $number++;
                include './detailModal.php';
                include './editModal.php';
                
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
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()

                    }

                    form.classList.add('was-validated')




                }, false)
            })
    })()
</script>
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var productId = $(this).val();
    
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
                        'inspectordelete': true,
                        'productId': productId,
                    },
                    success:function(reponse){

                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $('#refresh-delete'+productId).hide(1000);
            }
        })

    });
</script>


<?php require './include/footer.php';?>