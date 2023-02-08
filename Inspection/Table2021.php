<?php require './include/header.php';?>
<?php

require './db.php';
require './util.php';
$db = new DataBase();
$util = new Util();

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
        Table 2021 Government
    </p>
    <?php elseif($type === 'private'):?>
    <p class="text-dark fw-bold">
        Table 2021 Private
    </p>
    <?php endif?>
</div>
<?php if($type === 'government'):?>
<?php
 
$fetch_table_2021_g = $db->fetch_table2021_g($initial_page,$limit);
?>

<div class="container my-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Inspection ID</th>
                <th scope="col">Name of premise</th>
                <th scope="col">Name of inspector</th>
                <th scope="col">Date of inspection</th>
                <th scope="col">Dzongkhag</th>
                <th scope="col">More detail</th>
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#twentyOne<?php echo $row["id"]; ?>">
                        Detail
                    </button>
                </td>
            </tr>

            <?php
        require './Modal/TwentyOne_g.php';
    };
    ?>

        </tbody>
    </table>
</div>
<?php $type_required ='premise_report_detail_grovern';?>
<?php elseif($type === 'private'):?>
<?php
$fetch_table_2021_p = $db->fetch_table2021_p($initial_page,$limit);

?>

<div class="container">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Inspection ID</th>
                <th scope="col">Name of premise</th>
                <th scope="col">Name of inspector</th>
                <th scope="col">Date of inspection</th>
                <th scope="col">Dzongkhag</th>
                <th scope="col">More detail</th>
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#twentyOne<?php echo $row["id"]; ?>">
                        Detail
                    </button>
                </td>
            </tr>

            <?php
            require './Modal/TwentyOne_p.php';

    };
    ?>

        </tbody>
    </table>
</div>
<?php $type_required ='premise_report_detail_private';?>

<?php endif?>

<!-- pagination -->
<div class="Items">

    <?php  
  $result = $db->count_inspection_2021($type_required); 

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
      echo "<li class='page-item'><a class='page-link' href='./Table2021.php?page=".($page_number-1)."&type=".($type)."'>  Prev </a></li>";   
  }                          

  // number of pages
  for ($i=1; $i<=$total_pages; $i++) {   
    if ($i == $page_number) {   
        $pageURL .= "<li class='page-item'><a class = 'active page-link' href='./Table2021.php?page=" .$i."&type=".($type)."'>".$i." </a></li>";   
    }               
    else  {   
        $pageURL .= "<li class='page-item'><a class ='page-link' href='./Table2021.php?page=".$i."&type=".($type)."'> ".$i." </a></li>";     
    }   
  };     

  echo $pageURL;    

  // go to next page
  if($page_number<$total_pages){   
      echo "<a class='page-link' href='./Table2021.php?page=".($page_number+1)."&type=".($type)."'>  Next </a></li>";   
  }     
?>
    </ul>

</div>

</div>

<?php require './include/footer.php';?>