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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add a new brand</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" placeholder="Enter a brand name..." class="form-control">
                        </div>

                        <div class="m-3">
                          <p class="m-0 pt-3 pb-0">Select Category</p>
                            <?php
                            // $all_cats = all_categories();
                            //   print_r($all_cats);
                            $category_sql = "SELECT * FROM mart_category WHERE is_parent = '0'";
                            $category_res = mysqli_query($db,$category_sql);

                            while($row = mysqli_fetch_assoc($category_res)){
                              $cat_id = $row['ID'];
                              $cat_name = $row['c_name'];
                              $cat_image = $row['c_image'];
                              $cat_parent = $row['is_parent'];
                              $cat_status = $row['c_status'];

                              ?>
                              <input type="checkbox" value="<?php echo $cat_id; ?>">
                              <label for=""><?php echo $cat_name ?></label>

                              <?php
                            }
                                      
                            
                            
                           

                            ?>
                        </div>
                        <div class="form-group">
                            <div class="image-input c-img">
                            
                            <p class="mb-1"> Choose Brand Logo</p>
                                    <input type="file" id="choose-file" name="choose-file"/>
                                    <label for="choose-file">Select file</label>
                                    <div id="img-preview"></div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-lg-7">
            <!-- Show all form -->


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'inc/footer.php'; ?>