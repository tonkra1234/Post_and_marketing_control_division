<?php 

require './include/header.php';

include './db.php';

$db = new DataBase;

?>
<div class="d-flex mt-4">
    <a href="../main.php" class="link-secondary">
        Main menu
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        List working instruction for vaccine
    </p>
</div>

<div class="my-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mt-auto mb-1">Work instruction list</h4>
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
                    <th scope="col">Batch/lot number</th>
                    <th scope="col">Type of vaccine</th>
                    <th scope="col">Mfg. date</th>
                    <th scope="col">Exp. date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $number = 1 ;
                $results =$db->fetch_instruction();
                foreach($results as $result){
                ?>
                <tr id="refresh-delete<?php echo $result['id'];?>">
                    <th scope="row" class="text-center"><?php echo $number;?></th>
                    <td><?php echo $result['Manufacturer'];?></td>
                    <td><?php echo $result['Batch_no'];?></td>
                    <td><?php echo $result['Type_vaccine'];?></td>
                    <td><?php echo $result['Date_Manufacture'];?></td>
                    <td><?php echo $result['Date_Expiry'];?></td>
                    <td>
                        <div class="d-grid">
                            <a href="./edit_instruction.php?id=<?php echo $result['id'];?>" role="button" class="btn btn-warning btn-sm rounded-pill d-grid py-1 my-1">
                                Edit
                            </a>
                            <a class="btn btn-info rounded-pill d-grid py-1 my-1" data-bs-toggle="offcanvas"
                                href="#Detail<?php echo $result['id'];?>" role="button"
                                aria-controls="#Detail<?php echo $result['id'];?>">
                                Detail
                            </a>
                            <a href="./working_instruction_report.php?id=<?php echo $result['id'];?>" role="button" class="btn btn-secondary btn-sm rounded-pill d-grid py-1 my-1">
                                Report
                            </a>
                        </div>
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
    <?php
        // include './paginator.php';
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

<?php require './include/footer.php';?>