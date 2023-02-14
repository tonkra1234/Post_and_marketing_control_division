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
        Self inspection
</div>
<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="">All the self inspection in repository</h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive shadow">
        <table class="table table-striped table-bordered table-hover rounded-3">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name of Premise</th>
                    <th scope="col">Date_self_inspection</th>
                    <th scope="col">BMHC_No</th>
                    <th scope="col">Dzongkhag</th>
                    <th scope="col">More detail</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Report</th>
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
            $questions= $db->read_question();
            foreach($results as $result){
            ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Name_of_Premise']?></td>
                    <td><?php echo $result['Date_self_inspection']?></td>
                    <td><?php echo $result['BMHC_No']?></td>
                    <td><?php echo $result['Dzongkhag']?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#detailModal<?php echo $number;?>">
                            Detail
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="./edit.php?id=<?php echo $result['id']?>&page_no=<?php echo $page_no;?>" role="button">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="./self_report.php?id=<?php echo $result['id']?>" role="button" target="_blank">Report</a>
                    </td>
                </tr>
                <?php 
                include './detail.php';
                $number++;
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