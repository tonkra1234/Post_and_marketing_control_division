<?php require './include/header.php';?>
<?php require './Dashboard_controller.php';?>

<div class="container-fluid">
<?php require './include/sidebar.php';?>
   <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group me-2">
                     <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                     <span data-feather="calendar"></span>
                     This week
                  </button>
               </div> -->
         </div>
         <div class="row">
            <div class="col-lg-6 col-12 mb-3">
               <div class="card shadow justify-content-center rounded-3 text-white" style="background-color:#1D437E ;">
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
            <div class="col-lg-6 col-12 mb-3">
               <div class="card shadow justify-content-between rounded-3 text-white" style="background-color:#7B4413 ;">
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
               <canvas class="my-4 w-100 px-3" id="Self_inspection" width="900" height="380"></canvas>
            </div>

            <div class="col-lg-3 col-12 align-self-center">
               <div class="d-flex flex-column">
                  <div class="card shadow justify-content-between rounded-3 text-white py-lg-3"
                     style="background-color:#286D19;">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-12 col-4 d-flex justify-content-center mb-lg-3 mb-0">
                              <div class="align-self-center">
                                 <i class="fa-solid fa-layer-group" style="font-size: 5em;color: #E0E0E0;"></i>
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
                     <canvas class="my-4 w-100 px-3" id="GMP_inspection"></canvas>
                  </div>
               </div>
            </div>

            <div class="col-lg-12 col-12">
               <h4 class="mt-2">GOV & PRI inspection</h4>
               <canvas class="my-4 w-100 px-3" id="inspection_inspection"></canvas>
            </div>

            <h4>USERS</h4>
            <div class="table-responsive rounded-3">
               <table class="table shadow">
                  <thead class="text-white" style="background-color:#286D19;">
                     <tr>
                        <th scope="col">No</th>
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