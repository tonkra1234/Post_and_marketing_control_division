<?php require './include/header.php';?>
<?php require './Dashboard_controller.php';?>

<div class="container-fluid" style="min-height: 80vh;">
<?php require './include/sidebar.php';?>
   <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mb-3">
               <div class="card shadow justify-content-center rounded-3 text-white h-100" style="background-color:#1D437E ;">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                           <div class="align-self-center">
                              <i class="fa-solid fa-syringe" style="font-size: 5em;color: #E0E0E0;"></i>
                           </div>
                        </div>
                        <div class="col-8 text-center">
                           <div class="d-flex flex-column">
                              <h3>Total Vaccine</h3>
                              <h1><?php echo $results_vaccine['total_vaccine'];?></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mb-3">
               <div class="card shadow justify-content-between rounded-3 text-white h-100" style="background-color:#7B4413 ;">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                           <div class="align-self-center">
                              <i class="fa-solid fa-rotate-left" style="font-size: 5em;color: #E0E0E0;"></i>
                           </div>
                        </div>
                        <div class="col-8 text-center">
                           <div class="d-flex flex-column">
                              <h3>Recalled product</h3>
                              <h1><?php echo $results_recalled['total_recalled_products'];?></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-9 col-12 shadow mb-lg-0 mb-3">
               <h4 class="mt-2">Self inspection</h4>
               <hr>
               <canvas class="my-4 w-100 px-3" id="Self_inspection" height="300"></canvas>
            </div>

            <div class="col-lg-3 col-12 align-self-center">
               <div class="d-flex flex-column">
                  <div class="card shadow justify-content-between rounded-3 text-white mb-2"
                     style="background-color:#286D19;">
                     <div class="card-body pb-lg-0">
                        <div class="row">
                           <div class="col-lg-12 col-4 d-flex justify-content-center mb-lg-3 mb-0">
                              <div class="align-self-center">
                                 <i class="fa-solid fa-layer-group" style="font-size: 4em;color: #E0E0E0;"></i>
                              </div>
                           </div>
                           <div class="col-lg-12 col-8 text-center">
                              <div class="d-flex flex-column">
                                 <h4>Total Self-inspect</h4>
                                 <h1><?php echo $number_self_inspection['number_self_inspection'];?></h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card shadow justify-content-between rounded-3 text-white mb-2"
                     style="background-color:#B40E0E;">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-4 col-4 d-flex justify-content-center mb-lg-3 mb-0">
                              <div class="align-self-center">
                                 <i class="fa-solid fa-person-half-dress" style="font-size: 3.5em;color: #E0E0E0;"></i>
                              </div>
                           </div>
                           <div class="col-lg-8 col-8 text-center">
                              <div class="d-flex flex-column">
                                 <h5>Human Premises</h5>
                                 <h1><?php echo $number_self_inspection_human['number_self_inspection_human'];?></h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card shadow justify-content-between rounded-3 text-white"
                     style="background-color:#034F78;">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-4 col-4 d-flex justify-content-center mb-lg-3 mb-0">
                              <div class="align-self-center">
                                 <i class="fa-solid fa-shield-dog" style="font-size: 3.5em;color: #E0E0E0;"></i>
                              </div>
                           </div>
                           <div class="col-lg-8 col-8 text-center">
                              <div class="d-flex flex-column">
                                 <h5>Veterinary Premises</h5>
                                 <h1><?php echo $number_self_inspection_veterinary['number_self_inspection_veterinary'];?></h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-12 col-12 my-lg-3 my-3">
               <h4 class="">Good Manufacturing Practices inspection</h4>
               <hr>
               <div class="row">
                  <div class="col-lg-3 col-12 align-self-center">
                     <div class="d-flex flex-column">
                        <div class="card shadow justify-content-between rounded-3 text-white mb-2"
                           style="background-color:#56217B ;">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-12 col-4 d-flex justify-content-center mb-lg-2 mb-0">
                                    <div class="align-self-center">
                                       <i class="fa-solid fa-magnifying-glass-chart" style="font-size: 4em;color: #E0E0E0;"></i>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-8 text-center">
                                    <div class="d-flex flex-column">
                                       <h4>Total GMP-inspect</h4>
                                       <h1><?php echo $number_gmp_inspection['number_gmp_inspection'];?></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card shadow justify-content-between rounded-3 text-white mb-2"
                           style="background-color:#951439 ;">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-12 col-4 d-flex justify-content-center mb-lg-2 mb-0">
                                    <div class="align-self-center">
                                       <i class="fa-solid fa-people-group" style="font-size: 4em;color: #E0E0E0;"></i>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-8 text-center">
                                    <div class="d-flex flex-column">
                                       <h4>Total Inspector</h4>
                                       <h1><?php echo $number_inspectors['number_inspectors'];?></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-9 col-12 shadow">
                     <canvas class="my-4 w-100 px-3" id="GMP_inspection" height="350"></canvas>
                  </div>
               </div>
            </div>

            <div class="col-lg-12 col-12">
               <h4 class="mt-2">GOV & PRI inspection</h4>
               <hr>
               <!-- <canvas class="my-4 w-100 px-3" id="inspection_inspection"></canvas> -->
            </div>

            <h4>USERS</h4>
            <div class="table-responsive rounded-3">
               <table class="table shadow">
                  <thead class="text-white" style="background-color:#1C7C7B ;">
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
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
                           <div class="d-flex align-items-center"><img class="rounded-circle" src="./image/Officer_image/<?php echo $result['Avatar']?>" width="30"></div>
                        <?php else: ?>
                           <div class="d-flex align-items-center"><img class="rounded-circle" src="./image/Officer_image/question_mark.png" width="30"></div>
                        <?php endif; ?>
                        </td>
                        <td><?php echo $result['name'];?></td>
                        <td><?php echo $result['email'];?></td>
                        <td><?php echo $result['user_type'];?></td>
                     </tr>
                     <?php 
                     $number++;
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>


      </main>
   </div>
</div>

<?php include './js/dashboard.php';?>
<?php require './include/footer.php';?>