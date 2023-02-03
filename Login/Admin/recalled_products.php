<?php require './include/header.php';?>
<?php
require_once './database/db_recalled.php';
$db_recalled_prodcuts = new RecalledProducts();
$results_products = $db_recalled_prodcuts->fetch_trash_recalled_products();
$count_products = $db_recalled_prodcuts->count_trash_recalled_products();

?>

<div class="container-fluid" style="min-height: 80vh;">
    <?php require './include/sidebar.php';?>
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Recalled products</h1>
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
                     $number = 1;
                     if($count_products['total_row_trash'] > 0){
                        foreach ($results_products as $result) {
                     
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
                                    <button type="button" class="retrieve_button btn btn-success btn-sm rounded-pill d-grid py-1 my-1" value="<?php echo $result['id']?>">Retrieve</button>
                                    <button type="button" class="delete_button btn btn-danger btn-sm rounded-pill d-grid py-1 my-1" value="<?php echo $result['id']?>">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $number++;
                        }
                     }else{
                        ?>
                        <tr>
                            <td colspan="7">
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
                    url : "./database/delete_controller/delete_recalled_product.php",
                    data : {
                        'productdelete': "delete",
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
<script>
    $('.retrieve_button').click(function (e) {
        e.preventDefault();
        var productId = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, retrieve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type :"POST",
                    url : "./database/delete_controller/delete_recalled_product.php",
                    data : {
                        'productdelete': "retrieve",
                        'productId': productId,
                    },
                    success:function(reponse){

                    }
                });
                Swal.fire(
                    'Retrieve!',
                    'Your product has been retrieve.',
                    'success'
                )
                $('#refresh-delete'+productId).hide(1000);
            }
        })

    });
</script>
<?php require './include/footer.php';?>