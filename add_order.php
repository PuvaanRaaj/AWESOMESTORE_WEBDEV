<?php include('layouts/header.php'); ?>

<div class="container-fluid">
  <div class="row"  style="min-height: 100%">
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-sm-0 pt-5">Create Order</h3>

                    <div class="page-title-right menu">
                        <ol class="breadcrumb pt-5">
                            <li class="breadcrumb-item">Awesome Store</li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>

    
        <div class="table-responsive">
          <div class="mx-auto container">
              <form id="create-form"  enctype="multipart/form-data" method="POST" action="create_order.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                
                <div class="form-group mt-2">
                    <label>Shoppe Order ID</label>
                    <input type="text" class="form-control"  name="shoppe_orderid" placeholder="Please enter the order id from shoppe" required/>
                </div>
                <div class="form-group my-3">
                    <label>Order Status</label>
                    <select  class="form-select" required name="status">
                        <?php foreach($orders as $r){?>  
                        <option value="paid" <?php if($r['order_status']=='paid'){ echo "selected";}?> >Paid</option>
                        <option value="packed" <?php if($r['order_status']=='packed'){ echo "selected";}?> >Packed</option>
                        <option value="canceled" <?php if($r['order_status']=='canceled'){ echo "selected";}?>>Canceled</option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label>Product ID</label>
                    <?php
					$stmt2 = $conn->prepare("SELECT * FROM products");
                    $stmt2->execute();
                    $products = $stmt2->get_result();
					?>
					<select class="form-control" name="product_id">
					<option value="" disabled selected hidden>--- Choose Product ---</option>
                        <?php foreach($products as $product){?>  
								<option value='<?= $product['product_id']; ?>'><?= $product['product_name']; ?></option>
                        <?php }?>
					</select>
                </div>
                  <div class="form-group mt-2">
                      <label>Customer Name</label>
                      <input type="text" class="form-control"  name="name" placeholder="Please enter the customer name" required/>
                  </div>
                  <div class="form-group mt-2">
                    <label>Customer Email</label>
                    <input type="text" class="form-control"  name="email" placeholder="Please enter the customer email address" required/>
                </div>
                 <div class="form-group mt-2">
                    <label>Customer Address</label>
                    <input type="text" class="form-control"  name="address" placeholder="Please enter the customer address" required/>
                </div>
                <div class="form-group mt-2">
                    <label>Customer Number</label>
                    <input type="text" class="form-control"  name="number" placeholder="Please enter the customer number" required/>
                </div>
                <div class="form-group mt-2">
                      <label>Order Quantity</label>
                      <input type="text" class="form-control" id="product-color" name="quantity" placeholder="Please enter the total quantity of the order" required/>
                  </div>
                <div class="form-group mt-2">
                      <label>Sub Total</label>
                      <input type="text" class="form-control" id="product-color" name="cost" placeholder="Please enter the total cost of the order" required/>
                  </div>
                  <div class="form-group mt-2">
                        <label>Total Payment</label>
                        <input type="text" class="form-control" id="product-color" name="payment" placeholder="Please enter the total amount paid by the customer" required/>
                    </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="create_order" value="Create"/>
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
