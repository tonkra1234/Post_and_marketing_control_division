<?php
require_once '../db.php';
$db = new DataBase();
$dzongkhag = $_POST['get_option'];
$type = $_POST['type'];


if($type === 'private_premise_human'){
    if(isset($_POST['get_option']))
    {
    $result = $db->fetch_datalist($dzongkhag,$type);
     foreach($result as $row)
     {
      echo "<option value='".$row['Facility_name']. "'>";
     }
     exit;
    }
}elseif($type === 'government'){
    if(isset($_POST['get_option']))
    {
    
    $result_human = $db->fetch_datalist($dzongkhag,'government_premise_human');
    foreach($result_human as $row)
    {
        echo "<option value='".$row['Facility_name']. "'>Human</option>";
    }
    
    $result_vet = $db->fetch_datalist($dzongkhag,'government_premise_verterinary');
     foreach($result_vet as $row)
     {
        echo "<option value='".$row['Facility_name']. "'>Veterinary</option>";
     }
     exit;
    }
}

?>