<?php 
require './include/header.php';
require './Dashboard/dashboard_db.php';

$type = (isset($_GET['type']))?$_GET['type']:'';
$db = new Dashboard();
$Dzongkhag = array('Bumthang','Chukha','Dagana','Gasa','Haa','Lhuentse',
        'Mongar','Paro','Pemagatshel','Punakha','S/Jongkhar','Samtse','Sarpang','Thimphu',
        'Trashigang','Trashiyangtse','Trongsa','Tsirang','Wangduephodrang','Zhemgang');
?>
<div class="d-flex my-5">
    <a href="./dashboard.php" class="link-secondary">
        Dashboard
    </a>
    <div class="mx-1">
        /
    </div>
    <p class="text-dark fw-bold">
        Details
    </p>
</div>
<?php
            for ($index=0; $index < count($Dzongkhag) ; $index++) { 
                $result_type = $db->result_dzongkhag($type,$index,$Dzongkhag);
                $number = 1;
        ?>

<h3 class="rounded-3 text-center p-3 my-3 text-white" style="background-color: #2980B9;">
    <?php echo $Dzongkhag[$index]; ?></h3>
<table class="table table-bordered my-3">
    <thead class="table-success">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Dzongkhag</th>
        </tr>
    </thead>
    <tbody>
        <?php
                    foreach($result_type as $row){
                ?>
        <tr>
            <th scope="row"><?php echo $number;?></th>
            <td><?php echo $row['Facility_name'];?></td>
            <td><?php echo $Dzongkhag[$index];?></td>
        </tr>
        <?php
                    $number++;
                    }
                ?>
    </tbody>
</table>
<?php
        }
        ?>

<?php require './include/footer.php';?>