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

$total_records = $db->count_plan_form();
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
        List plan form for vaccine
    </p>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mt-auto mb-1">Plan form list</h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive shadow">
        <table class="table table-light table-bordered">
            <thead class="table-success">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Name of Vaccine</th>
                    <th scope="col">Type of vaccine</th>
                    <th scope="col">Name of premises</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $number = ($total_records_per_page*$page_no)-($total_records_per_page-1);
                $results =$db->fetch_plan($offset,$total_records_per_page);
                foreach($results as $result){
                ?>
                <tr id="refresh-delete<?php echo $result['id'];?>">
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Manufacturer'];?></td>
                    <td><?php echo $result['Name_Vaccine'];?></td>
                    <td><?php echo $result['Type_vaccine'];?></td>
                    <td><?php echo $result['Premises_name'];?></td>
                    <td>
                        <div class="d-grid">
                            <a href="./edit_plan.php?id=<?php echo $result['id'];?>" role="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1">
                                Edit
                            </a>
                            <a class="btn btn-info rounded-pill d-grid py-1 my-1" data-bs-toggle="offcanvas"
                                href="#Detail<?php echo $result['id'];?>" role="button"
                                aria-controls="#Detail<?php echo $result['id'];?>">
                                Detail
                            </a>
                            <a href="./plan_report.php?id=<?php echo $result['id'];?>" role="button" class="btn btn-secondary btn-sm rounded-pill d-grid py-1 my-1">
                                Plan form
                            </a>
                        </div>
                    </td>
                </tr>

                <?php 
                    $number++;
                    include './plan_detail.php';
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
                    <li class="start page-item"><a
                            href="?page_no=1&search=<?php echo $search_key;?>"
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

<?php require './include/footer.php';?>