<?php

include "sidenav.php";
include "topheader.php";
?>
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="process/process_category.php" method="post">
          
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Category</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category" class="form-control">
                      </div>
                    </div>
                    

                    

                    <div class="card-footer">
                  <button type="submit" id="btn_save"  value="Save" name="send" required class="btn btn-fill btn-primary">Update Category</button>
              </div>
                    
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
         
         </form>
          
        </div>
      </div>

      <?php
include "footer.php";
?>