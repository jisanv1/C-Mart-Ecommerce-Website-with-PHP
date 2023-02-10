<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="brand.php">Brand</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <!-- your main code here -->
      <div class="row">
        <div class="col-lg-5">
            <!-- Add form for a new brand -->

            <!-- Ajax code starts from class 5 part 2 -->

            <div class="card">
                <div class="card-body">
                  <?php
                  if(isset($_GET['editid'])){
                    $editid = $_GET['editid'];

                    $edit_brand_sql = "SELECT * FROM mart_brand where ID='$editid'";
                    $edit_brand_sql_result = mysqli_query($db,$edit_brand_sql);
            
                    while($row = mysqli_fetch_assoc($edit_brand_sql_result)){
                      $ebrand_id = $row['ID'];
                      $ebrand_name = $row['b_name'];
                      $ebrand_logo = $row['b_logo'];
                      $ebrand_status = $row['b_status'];
                    
                    }
                    ?>
                    <h5 class="card-title">Update Brand Information</h5>
                    <form method="POST" enctype="multipart/form-data" action="core/update.php">
                        <div class="form-group mb-4">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand_name" placeholder="Enter a brand name..." value="<?php echo $ebrand_name; ?>" class="form-control" required />
                        </div>

                        <div class="form-group mb-4">
                          <label for="" class="mb-2">Change Brand status</label>
                          <select class="form-control" name="b_status">
                            <option class="" value="1" <?php if($ebrand_status == 1) echo 'selected'  ?>>Active</option>
                            <option class="" value="0" <?php if($ebrand_status == 0) echo 'selected'  ?>>Inactive</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <div class="image-input c-img">
                            <?php
                            if(empty($ebrand_logo)){
                              echo '<p class="alert alert-danger">No image found!</P>';
                            }else{
                              ?>
                              <img src="assets/img/products/brand/<?php echo $ebrand_logo; ?>"  width="100px">
                              <?php
                            }
                            ?>
                            
                            <p class="mb-1"> Choose Brand Logo</p>
                                    <input type="file" id="choose-file" name="choose-file"/>
                                    <label for="choose-file">Select file</label>
                                    <div id="img-preview"></div>
                                </div>
                            </div>
                            <div>
                              <input type="hidden" name="edit_id" value="<?php echo $editid; ?>">
                              <input type="submit" name="update_brand" value="Update brand" class="btn  btn-info mt-3">
                            </div>
                    </form>
                    <?php

                  }else{
                    ?>
                    <h5 class="card-title">Add a new brand</h5>
                    <form method="POST" enctype="multipart/form-data" action="core/insert.php">
                        <div class="form-group mb-4">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand_name" placeholder="Enter a brand name..." class="form-control" required />
                        </div>

                        <div class="form-group">
                            <div class="image-input c-img">
                            
                            <p class="mb-1"> Choose Brand Logo</p>
                                    <input type="file" id="choose-file" name="choose-file"/>
                                    <label for="choose-file">Select file</label>
                                    <div id="img-preview"></div>
                                </div>
                            </div>
                            <div>
                              <input type="submit" name="add_brand" value="Add brand" class="btn  btn-info mt-3">
                            </div>
                    </form>
                    <?php
                  }
                  ?>
                    
                </div>
            </div>


        </div>
        <div class="col-lg-7">
            <!-- Show all form -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table with hoverable rows</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
               
                  <?php
                    $all_brand_sql = "SELECT * FROM mart_brand";
                    $all_brand_sql_result = mysqli_query($db,$all_brand_sql);
            
                    $serial = 0;
                    while($row = mysqli_fetch_assoc($all_brand_sql_result)){
                      $brand_id = $row['ID'];
                      $brand_name = $row['b_name'];
                      $brand_logo = $row['b_logo'];
                      $brand_status = $row['b_status'];
                      $serial++;

                      ?>
                  <tr>
                    <th scope="row"><?php echo $serial; ?></th>
                    <td>
                      <?php
                      if(empty($brand_logo)){
                        ?>
                         <img src="assets/img/products/brand/letter-b.png" width="40px">
                        <?php

                      }
                      else{
                        ?> 
                        <img src="assets/img/products/brand/<?php echo $brand_logo; ?>" width="40px">
                        <?php
                      }
                      ?>
                    </td>
                    <td><?php echo $brand_name; ?></td>
                    <td>

                    <?php if($brand_status == 0) echo '<span class="badge bg-danger">Inactive</span>'; else echo '<span class="badge bg-success">Active</span>'; ?>
                    </td>
                    <td>
                    <a href="brand.php?editid=<?php echo $brand_id;?> "> <i class="bi bi-pencil-square text-dark"></i></a>
                      <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $brand_id;?>"> <i class="bi bi-trash text-danger"></i></a>

                      <!-- Modal -->
                      <div class="modal fade" id="deleteid<?php echo $brand_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center py-5">
                              <h2 class="mb-3">Are you sure?</h2>
                              <a href="brand.php?deleteid=<?php echo $brand_id; ?>" class="btn btn-mf btn-danger">Confirm</a>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

              <?php
                
                if(isset($_GET['deleteid'])){
                  $delid = $_GET['deleteid'];

                  //delete category image
                  delete_file('b_logo','mart_brand' , 'ID', $delid, 'assets/img/products/brand/');
          
                  delete('mart_brand', 'ID', $delid, 'brand.php');
                }
              ?>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'inc/footer.php'; ?>