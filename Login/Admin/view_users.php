<?php require './include/header.php';?>
<?php

require './database/db_users.php';

$db_users = new DataBase();
$results_users = $db_users->fetch_users();

?>

<div class="container-fluid" style="min-height: 80vh;">
   <?php require './include/sidebar.php';?>
   <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
         </div>
         <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
               <div>
                  <h4 class="">User list</h4>
               </div>
            </div>
         </div>
         <div class="table-responsive rounded-3">
            <table class="table shadow">
               <thead class="text-white" style="background-color:#1C7C7B ;">
                  <tr>
                     <th scope="col">No</th>
                     <th scope="col">Avatar</th>
                     <th scope="col">Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Passowrd change</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $number = 1;
                     foreach ($results_users as $result) {
                     
                     ?>
                  <tr>
                     <th scope="row"><?php echo $number;?></th>
                     <td>
                        <?php if(is_file('./image/Officer_image/'.$result['Avatar'])): ?>
                        <div class="d-flex align-items-center"><img class="rounded-circle"
                              src="./image/Officer_image/<?php echo $result['Avatar']?>" width="30"></div>
                        <?php else: ?>
                        <div class="d-flex align-items-center"><img class="rounded-circle"
                              src="./image/Officer_image/question_mark.png" width="30"></div>
                        <?php endif; ?>
                     </td>
                     <td><?php echo $result['name'];?></td>
                     <td><?php echo $result['email'];?></td>
                     <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                           data-bs-target="#changeModal<?php echo $result['id'];?>">
                           Change
                        </button></td>
                     <td><?php echo $result['user_type'];?></td>
                  </tr>
                  <?php 
                     include './Modal/change_password.php';
                     $number++;
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </main>
   </div>
</div>

<?php require './include/footer.php';?>