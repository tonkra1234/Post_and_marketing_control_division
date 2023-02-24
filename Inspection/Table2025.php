<?php require './include/header.php';?>
<?php
$type = (isset($_GET['type']))?$_GET['type']:'';
// variable to store number of rows per page
$limit = 10;    

    // update the active page number
if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];    
}    
else {    
    $page_number=1;    
}   

// get the initial page number
$initial_page = ($page_number-1) * $limit;

require './db.php';
$db = new DataBase();
// $question2022_g = $db->Question2022_g();
// $question2022_p = $db->Question2022_p();
?>

<div class="d-flex my-5">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <a href="./home.php" class="link-secondary">
        Home
    </a>
    <div class="mx-1">
        /
    </div>
    <?php if($type === 'government'):?>
    <p class="text-dark fw-bold">
        Government table 2025
    </p>
    <?php elseif($type === 'private'):?>
    <p class="text-dark fw-bold">
        Private table 2025
    </p>
    <?php endif?>
</div>
<?php if($type === 'government'):?>
<?php
 
$fetch_table_now_g = $db->fetch_table2025_g($initial_page,$limit);

?>

<div class="container my-5">
    <div class="table-responsive shadow">
        <table class="table table-hover table-bordered border-light table-striped rounded-3">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Inspection ID</th>
                    <th scope="col">Name of premise</th>
                    <th scope="col">Name of CP</th>
                    <th scope="col">Date of inspection</th>
                    <th scope="col">Name of inspector</th>
                    <th scope="col">Dzongkhag</th>
                    <th scope="col">Status</th>
                    <th scope="col">More detail</th>
                    <th scope="col">Report</th>
                    <?php if($user_type === 'user_edit'):?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>

                <?php
                $number= $limit*($page_number-1)+1;
                if (count($fetch_table_now_g)>0) {
                    foreach ($fetch_table_now_g as $row){
                ?>

                <tr id='refresh-delete<?php echo $row["id"]; ?>'>
                    <th scope="row"><?php echo $number; ?></th>
                    <td><?php echo $row["inspection_id"]; ?></td>
                    <td><?php echo $row["name_of_premise"]; ?></td>
                    <td><?php echo $row["competent_name"]; ?></td>
                    <td><?php echo $row["date_of_inspection"]; ?></td>
                    <td>
                        <?php 
                        $inspectors = json_decode($row["inspector_name"]);
                        foreach($inspectors as $inspector){?>
                            <span><?php echo $inspector;?>,</span>
                        <?php
                        };
                        ?>
                    </td>
                    <td><?php echo $row["dzongkhag"]; ?></td>
                    <td>
                        <?php if($row["verify"] === 'Verified'): ?>
                            <span class="badge rounded-pill bg-success"><?php echo $row["verify"]; ?></span>
                        <?php elseif($row["verify"] === 'Non-verified'): ?>
                            <span class="badge rounded-pill bg-danger"><?php echo $row["verify"]; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#Now_g<?php echo $row["id"]; ?>">
                            Detail
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-secondary"
                            href="./Report/Report_g.php?inspection_id=<?php echo $row["inspection_id"]; ?>">
                            Report
                        </a>
                    </td>
                    <?php if($user_type === 'user_edit'):?>
                    <td>
                        <a class="btn btn-warning"
                            href="./edit_g.php?inspection_id=<?php echo $row["inspection_id"]; ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <input type="hidden" value="<?php echo $row["id"]; ?>" id="Id" name="Id">
                        <input type="hidden" value="government" id="delete_type" name="delete_type">
                        <button type="button" class="delete_button btn btn-danger"
                            value="<?php echo $row["inspection_id"]; ?>">
                            Delete
                        </button>
                    </td>
                    <?php endif;?>
                </tr>

                <?php
                    $number++;
                    require './Modal/Now_g.php';
                }}else{ 
                ?>
                <tr>
                    <td colspan="12" class="fw-bold fs-4 text-center py-lg-5">No data founded</td>
                </tr>
                <?php    
                    };
                ?>

            </tbody>
        </table>
    </div>
</div>
<?php $type_required ='government_detail2023';?>
<?php elseif($type === 'private'):?>
<?php
$fetch_table_now_p = $db->fetch_table2025_p($initial_page,$limit);

?>

<div class="container">
    <div class="table-responsive shadow">
        <table class="table table-hover table-bordered border-light table-striped rounded-3">
            <thead class="bg-success text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Inspection ID</th>
                    <th scope="col">Name of premise</th>
                    <th scope="col">Name of CP</th>
                    <th scope="col">Date of inspection</th>
                    <th scope="col">Name of inspector</th>
                    <th scope="col">Dzongkhag</th>
                    <th scope="col">Status</th>
                    <th scope="col">More detail</th>
                    <th scope="col">Report</th>
                    <?php if($user_type === 'user_edit'):?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>

                <?php
                $number= $limit*($page_number-1)+1;
                if (count($fetch_table_now_p)>0) {
                    foreach ($fetch_table_now_p as $row){
                ?>

                <tr id="refresh-delete<?php echo $row["id"]; ?>">
                    <th scope="row"><?php echo $number; ?></th>
                    <td><?php echo $row["inspection_id"]; ?></td>
                    <td><?php echo $row["name_of_premise"]; ?></td>
                    <td><?php echo $row["competent_name"]; ?></td>
                    <td><?php echo $row["date_of_inspection"]; ?></td>
                    <td>
                        <?php 
                        $inspectors = json_decode($row["inspector_name"]);
                        foreach($inspectors as $inspector){?>
                            <span><?php echo $inspector;?>,</span>
                        <?php
                        };
                        ?>
                    </td>
                    <td><?php echo $row["dzongkhag"]; ?></td>
                    <td>
                        <?php if($row["verify"] === 'Verified'): ?>
                            <span class="badge rounded-pill bg-success"><?php echo $row["verify"]; ?></span>
                        <?php elseif($row["verify"] === 'Non-verified'): ?>
                            <span class="badge rounded-pill bg-danger"><?php echo $row["verify"]; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#Now_p<?php echo $row["id"]; ?>">
                            Detail
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-secondary"
                            href="./Report/Report_p.php?inspection_id=<?php echo $row["inspection_id"]; ?>">
                            Report
                        </a>
                    </td>
                    <?php if($user_type === 'user_edit'):?>
                    <td>
                        <a class="btn btn-warning"
                            href="./edit_p.php?inspection_id=<?php echo $row["inspection_id"]; ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <input type="hidden" value="<?php echo $row["id"]; ?>" id="Id" name="Id">
                        <input type="hidden" value="private" id="delete_type" name="delete_type">
                        <button type="button" class="delete_button btn btn-danger"
                            value="<?php echo $row["inspection_id"]; ?>">
                            Delete
                        </button>
                    </td>
                    <?php endif;?>
                </tr>

                <?php
                $number++;
                    require './Modal/Now_p.php';
                }}else{ 
                ?>
                <tr>
                    <td colspan="12" class="fw-bold fs-4 text-center py-lg-5">No data founded</td>
                </tr>
                <?php    
                    };
                ?>

            </tbody>
        </table>
    </div>
</div>
<?php $type_required ='private_detail2023';?>

<?php endif?>

<!-- pagination -->
<div class="Items">

    <?php  
  $result = $db->count_inspection_2025($type_required);

  // get total roll number    
  $total_rows = $result['sum'];              

  echo "</br>";            

  // get the required number of pages
  $total_pages = ceil($total_rows / $limit);     

  $pageURL = "";     
?>

    <ul class="pagination d-flex align-items-center justify-content-end mb-lg-5">
        <?php
  // go previous page 
  if($page_number>=2){   
      echo "<li class='page-item'><a class='page-link' href='./TableNow.php?page=".($page_number-1)."&type=".($type)."'>  Prev </a></li>";   
  }                          

  // number of pages
  for ($i=1; $i<=$total_pages; $i++) {   
    if ($i == $page_number) {   
        $pageURL .= "<li class='page-item'><a class = 'active page-link' href='./TableNow.php?page=" .$i."&type=".($type)."'>".$i." </a></li>";   
    }               
    else  {   
        $pageURL .= "<li class='page-item'><a class ='page-link' href='./TableNow.php?page=".$i."&type=".($type)."'> ".$i." </a></li>";     
    }   
  };     

  echo $pageURL;    

  // go to next page
  if($page_number<$total_pages){   
      echo "<a class='page-link' href='./TableNow.php?page=".($page_number+1)."&type=".($type)."'>  Next </a></li>";   
  }     
?>
    </ul>

</div>

</div>
<script>
    $('.delete_button').click(function (e) {
        e.preventDefault();
        var inspectionId = $(this).val();
        var Id = $('#Id').val();
        var delete_type = $('#delete_type').val();

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
                    type: "POST",
                    url: "./database/delete_SQL.php",
                    data: {
                        'inspectiondelete': delete_type,
                        'inspectionId': inspectionId,
                    },
                    success: function (reponse) {
                        $('#refresh-delete' + Id).hide(1000);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });
</script>
<?php require './include/footer.php';?>