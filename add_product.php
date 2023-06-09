<?php include('layouts/header.php'); ?>

<div class="container-fluid">
  <div class="row"  style="min-height: 100%">
 
  <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
      <div class="row">
           <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h3 class="mb-sm-0  pt-5">Create Products</h3>
                   <div class="page-title-right menu">
                       <ol class="breadcrumb pt-5">
                           <li class="breadcrumb-item">Awesome Store</li>
                           <li class="breadcrumb-item active">Products</li>
                       </ol>
                   </div>
               </div>

           </div>
       </div>
      <div class="table-responsive">

          <div class="mx-auto container">
              <form id="create-form"  enctype="multipart/form-data" method="POST" action="create_product.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Please enter the product name" required/>
                </div>
                  <div class="form-group mt-2">
                      <label>Stock Quantity</label>
                      <input type="number" class="form-control" name="quantity" placeholder="Please enter the total quantity of product" required/>
                  </div>
                  <div class="form-group mt-2">
                    <label>Stock Limit</label>
                    <input type="number" class="form-control"  name="limit" placeholder="Please enter the limit of the product" required/>
                </div>
                 <div class="form-group mt-2">
                    <label>Unit Price</label>
                    <input type="number" class="form-control"  name="price" placeholder="Please enter the price per unit of the product" required/>
                </div>
                 
                <div class="form-group mt-2">
                    <label>Supplier ID</label>
                    <?php
					$stmt2 = $conn->prepare("SELECT * FROM suppliers");
                    $stmt2->execute();
                    $suppliers = $stmt2->get_result();
					?>
					<select class="form-control" name="supplier_id">
					<option value="" disabled selected hidden>--- Choose Supplier ---</option>
                        <?php foreach($suppliers as $supplier){?>  
								<option value='<?= $supplier['supplier_id']; ?>'><?= $supplier['supplier_name']; ?></option>
                        <?php }?>
					</select>
                </div>

                <div class="form-group mt-2">
                    <label>Image 1</label>
                    <input type="file" class="form-control" id="image1" name="image1" placeholder="Please Upload the image of the product" required/>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="create_product" value="Create"/>
                </div>
              </form>
          </div>
      </div>
    </main>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  
    </body>
</html>
