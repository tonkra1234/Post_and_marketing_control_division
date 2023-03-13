<?php 

require './include/header.php';

include './db.php';

$search_key = (isset($_GET['search']))?$_GET['search']:'';

// variable to store number of rows per page
$total_records_per_page = 10;   

// update the active page number
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

// get the initial page number
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


$db = new DataBase;
if(!empty($search_key)){
    $total_records = $db->count_work_instruction_search_public($search_key);
}else{
    $total_records = $db->count_work_instruction_public();
}

$total_records = $total_records['sum'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);


?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        List of vaccine
    </p>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mt-auto mb-1">Vaccine public list</h4>
            </div>
        </div>
        <div class="col-lg-8 col-12">
            <form class="shadow p-lg-3 p-2" action="" method="GET" accept-charset="utf-8">
                <div class="row gap-lg-0 gap-2">
                    <div class="col-lg-6 col-12">
                        <input class="border w-100 form-control" type="search" name="search" placeholder="Search"
                            aria-label="Search" value="<?php echo $search_key; ?>">
                    </div>
                    <div class="col-lg-3 col-12 d-grid">
                        <button class="btn btn-secondary btn-block" type="submit"
                            style="background-color: #31968B ;">Search Results</button>
                    </div>
                    <div class="col-lg-3 col-12 d-grid">
                        <a class="btn btn-danger" role="button" href="./list_instruction.php">Clear all</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="table-responsive shadow">
        <table class="table table-light table-bordered">
            <thead class="table-success">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Application no.</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Batch/lot number</th>
                    <th scope="col">Type of vaccine</th>
                    <th scope="col">Mfg. date</th>
                    <th scope="col">Exp. date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                if(!empty($search_key)){
                    $results =$db->fetch_instruction_search_public($offset,$total_records_per_page,$search_key);
                }else{
                    $results =$db->fetch_instruction_public($offset,$total_records_per_page);
                }
                

                foreach($results as $result){
                ?>
                <tr id="refresh-delete<?php echo $result['id'];?>">
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Application_number'];?></td>
                    <td><?php echo $result['Manufacturer'];?></td>
                    <td><?php echo $result['Batch_no'];?></td>
                    <td><?php echo $result['Type_vaccine'];?></td>
                    <?php if ($result['Date_Manufacture'] === '0000-00-00'):?>
                    <td>N/A</td>
                    <?php else: ?>
                    <td><?php echo date_format(date_create($result['Date_Manufacture']),'d-M-Y');?></td>
                    <?php endif ;?>

                    <?php if ($result['Date_Expiry'] === '0000-00-00'):?>
                    <td>N/A</td>
                    <?php else: ?>
                    <td><?php echo date_format(date_create($result['Date_Expiry']),'d-M-Y');?></td>
                    <?php endif ;?>

                    <td>
                        <?php if($result["show_status"] === 'Verified'): ?>
                        <span class="badge rounded-pill bg-success"><?php echo $result["show_status"]; ?></span>
                        <?php elseif($result["show_status"] === 'Unverified'): ?>
                        <span class="badge rounded-pill bg-danger"><?php echo $result["show_status"]; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="btn btn-info rounded-pill d-grid py-1 my-1" data-bs-toggle="offcanvas"
                            href="#Detail<?php echo $result['id'];?>" role="button"
                            aria-controls="#Detail<?php echo $result['id'];?>">
                            Detail
                        </a>
                    </td>
                </tr>

                <?php 
                    $number++;
                    include './instruction_detail.php';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id=paginate>
        <div class="d-flex justify-content-end my-3">
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
        </div>
        <!-- pagination -->
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <?php if (ceil($total_records / $total_records_per_page) > 0): ?>
                <ul class="pagination">
                    <?php if ($page_no > 1): ?>
                    <li class="prev page-item"><a
                            href="?page_no=<?php echo $page_no-1 ?>&search=<?php echo $search_key;?>"
                            class="page-link">Prev</a></li>
                    <?php endif; ?>

                    <?php if ($page_no > 3): ?>
                    <li class="start page-item"><a href="?page_no=1&search=<?php echo $search_key;?>"
                            class="page-link">1</a></li>
                    <li class="dots page-item"><a class="page-link" href="#">...</a></li>
                    <?php endif; ?>

                    <?php if ($page_no-2 > 0): ?><li class="page page-item"><a class="page-link"
                            href="?page_no=<?php echo $page_no-2 ?>&search=<?php echo $search_key;?>"><?php echo $page_no-2 ?></a>
                    </li><?php endif; ?>
                    <?php if ($page_no-1 > 0): ?><li class="page page-item"><a class="page-link"
                            href="?page_no=<?php echo $page_no-1 ?>&search=<?php echo $search_key;?>"><?php echo $page_no-1 ?></a>
                    </li><?php endif; ?>

                    <li class="currentpage page-item"><a class="page-link"
                            href="?page_no=<?php echo $page_no ?>"><?php echo $page_no ?></a></li>

                    <?php if ($page_no+1 < ceil($total_records / $total_records_per_page)+1): ?><li
                        class="page page-item">
                        <a class="page-link"
                            href="?page_no=<?php echo $page_no+1 ?>&search=<?php echo $search_key;?>"><?php echo $page_no+1 ?></a>
                    </li><?php endif; ?>
                    <?php if ($page_no+2 < ceil($total_records / $total_records_per_page)+1): ?><li
                        class="page page-item">
                        <a class="page-link"
                            href="?page_no=<?php echo $page_no+2 ?>&search=<?php echo $search_key;?>"><?php echo $page_no+2 ?></a>
                    </li><?php endif; ?>

                    <?php if ($page_no < ceil($total_records / $total_records_per_page)-2): ?>
                    <li class="dots page-item"><a class="page-link" href="#">...</a></li>
                    <li class="end page-item"><a class="page-link"
                            href="?page_no=<?php echo ceil($total_records / $total_records_per_page) ?>&search=<?php echo $search_key;?>"><?php echo ceil($total_records / $total_records_per_page) ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if ($page_no < ceil($total_records / $total_records_per_page)): ?>
                    <li class="next page-item"><a class="page-link"
                            href="?page_no=<?php echo $page_no+1 ?>&search=<?php echo $search_key;?>">Next</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </nav>
        </div>
    </div>

</div>

<?php require './include/footer.php';?>