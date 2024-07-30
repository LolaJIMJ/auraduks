
    <?php

session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";
require_once "classes/Category.php";
require_once 'classes/Db.php';
require_once 'classes/Product.php';


$admin = new Admin;

//to get the numbers of each category
$countcategory=$admin->get_all_category();
$count_cat=count($countcategory);
//
$countproduct=$admin->get_all_product();
$count_product=count($countproduct);


// Fetch number of products per category
$products_per_category = $admin->get_product_count_per_category();

//to get all category inserted
$category = new Category;
$result = $category->getAllCategories();

//to get the number of users registered
$user=$admin->get_all_users();


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                          <th>ID</th>
                          <th>FirstName</th>
                          <th>LastName</th>
                          <th>Email</th>
                          </tr>
                  </thead>
                   
                  <tbody>

                  <?php
                if(isset($user)){
                  $n=1;
                  foreach($user as $u){
                    // print_r($fetchAdmin);                
                   ?>
                      
                       <tr>
                        <td><?php echo $u['user_id']?></td>
                         <td> <?php echo $u['user_fname'] ?></td>
                          <td> <?php echo $u['user_lname'] ?></td>
                          <td><?php echo $u['user_email'] ?></t>
                          </tr>
                        <?php
                       }
                     }
                    ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Categories List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                          <th>ID</th>
                        <th>Category Name</th>
                        <th>Count</th>
                        <th>Action</th>
                    </tr>
              </thead>
                   
                <tbody>
                  <?php
                  foreach ($products_per_category as $row) {
                  ?>
              <tr>
                  <td><?php echo $row['category_id'] ?></td>
                  <td><?php echo $row['category_name'] ?></td>
                  <td><?php echo $row['product_count'] ?></td>
                  <td><button style="background-color:blueviolet;color:danger"><a onclick="return confirm('Are you sure you want to delete?')" href="delete_category.php?deleteid=<?php echo $row['category_id']?>">Delete</a></button></td>
                  <td></td>
              </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </div>
      </div>
    </div>
    </div>
     </div>
      </div>
      <?php
include "footer.php";
?>