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
$question2022_g = $db->Question2022_g();
$question2022_p = $db->Question2022_p();
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
        Table 2022 Government
    </p>
    <?php elseif($type === 'private'):?>
    <p class="text-dark fw-bold">
        Table 2022 Private
    </p>
    <?php endif?>
</div>
<?php if($type === 'government'):?>
<?php
 
$fetch_table_2021_g = $db->fetch_table2022_g($initial_page,$limit);
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
                    <th scope="col">Dzongkhag</th>
                    <th scope="col">More detail</th>
                    <th scope="col">Report</th>
                </tr>
            </thead>
            <tbody id="myTable">

                <?php
        foreach ($fetch_table_2021_g as $row){
        ?>

                <tr>
                    <th scope="row"><?php echo $row["id"]; ?></th>
                    <td><?php echo $row["inspection_id"]; ?></td>
                    <td><?php echo $row["name_of_premise"]; ?></td>
                    <td><?php echo $row["competent_name"]; ?></td>
                    <td><?php echo $row["date_of_inspection"]; ?></td>
                    <td><?php echo $row["dzongkhag"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#twentyTwo<?php echo $row["id"]; ?>">
                            Detail
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-secondary"
                            href="./Report/instant_report_gov2022.php?inspection_id=<?php echo $row["inspection_id"]; ?>&id=<?php echo $row["id"]; ?>">
                            Report
                        </a>
                    </td>
                </tr>

                <?php
        require './Modal/TwentyTwo_g.php';
    };
    ?>

            </tbody>
        </table>
    </div>
</div>
<?php $type_required ='premise_report_detail_grovern';?>
<?php elseif($type === 'private'):?>
<?php
$fetch_table_2021_p = $db->fetch_table2022_p($initial_page,$limit);

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
                    <th scope="col">Dzongkhag</th>
                    <th scope="col">More detail</th>
                    <th scope="col">Report</th>
                </tr>
            </thead>
            <tbody id="myTable">

                <?php
        foreach ($fetch_table_2021_p as $row){
        ?>

                <tr>
                    <th scope="row"><?php echo $row["id"]; ?></th>
                    <td><?php echo $row["inspection_id"]; ?></td>
                    <td><?php echo $row["name_of_premise"]; ?></td>
                    <td><?php echo $row["competent_name"]; ?></td>
                    <td><?php echo $row["date_of_inspection"]; ?></td>
                    <td><?php echo $row["dzongkhag"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#twentyTwo<?php echo $row["id"]; ?>">
                            Detail
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-secondary"
                            href="./Report/instant_report_pri2022.php?inspection_id=<?php echo $row["inspection_id"]; ?>&id=<?php echo $row["id"]; ?>">
                            Report
                        </a>
                    </td>
                </tr>

                <?php
        require './Modal/TwentyTwo_p.php';
    };
    ?>

            </tbody>
        </table>
    </div>
</div>
<?php $type_required ='premise_report_detail_private';?>

<?php endif?>

<!-- pagination -->
<div class="Items">

    <?php  
  $result = $db->count_inspection_2022($type_required); 

  // get total roll number    
  $total_rows = $result[0]['sum'];              

  echo "</br>";            

  // get the required number of pages
  $total_pages = ceil($total_rows / $limit);     

  $pageURL = "";     
?>

    <ul class="pagination d-flex align-items-center justify-content-end mb-lg-5">
        <?php
  // go previous page 
  if($page_number>=2){   
      echo "<li class='page-item'><a class='page-link' href='./Table2022.php?page=".($page_number-1)."&type=".($type)."'>  Prev </a></li>";   
  }                          

  // number of pages
  for ($i=1; $i<=$total_pages; $i++) {   
    if ($i == $page_number) {   
        $pageURL .= "<li class='page-item'><a class = 'active page-link' href='./Table2022.php?page=" .$i."&type=".($type)."'>".$i." </a></li>";   
    }               
    else  {   
        $pageURL .= "<li class='page-item'><a class ='page-link' href='./Table2022.php?page=".$i."&type=".($type)."'> ".$i." </a></li>";     
    }   
  };     

  echo $pageURL;    

  // go to next page
  if($page_number<$total_pages){   
      echo "<a class='page-link' href='./Table2022.php?page=".($page_number+1)."&type=".($type)."'>  Next </a></li>";   
  }     
?>
    </ul>

</div>

</div>
<?php require './include/footer.php';?>