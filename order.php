<?php include('layouts/header.php'); ?>

<?php

    if(!isset($_SESSION['admin_logged_in'])){
      ?>
      <script>
        window.location.href="login.php"
      </script>
      <?php
          exit();
    }
?>
<?php
          //1. determine page no
          if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
            //if user has already entered page then page number is the one that they selected
            $page_no = $_GET['page_no'];
          }else{
            //if user just entered the page then default page is 1
            $page_no = 1;
          }


          //2. return number of products
          $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM orders");
          $stmt1->execute();
          $stmt1->bind_result($total_records);
          $stmt1->store_result();
          $stmt1->fetch();

          //3. products per page
          $total_records_per_page = 5;
          $offset = ($page_no-1) * $total_records_per_page;
          $previous_page = $page_no - 1;
          $next_page = $page_no + 1;
          $adjacents = "2";
          $total_no_of_pages = ceil($total_records/$total_records_per_page);
         
          //4. get all products
          $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset,$total_records_per_page");
          $stmt2->execute();
          $orders = $stmt2->get_result();
?>

<div class="container-fluid">
  <div class="row" style="min-height: 100%">
    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
     <div class="row">
           <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h3 class="mb-sm-0  pt-5">Order</h3>

                   <div class="page-title-right">
                       <ol class="breadcrumb pt-5">
                           <li class="breadcrumb-item">Awesome Store</li>
                           <li class="breadcrumb-item active">Order List</li>
                       </ol>
                   </div>
               </div>

           </div>
       </div>

      <?php if(isset($_GET['order_created'])){?>
           <p class="text-center" style="color: green;"><?php echo $_GET['order_created'];?></p>
        <?php } ?>

      <?php if(isset($_GET['order_updated'])){?>
           <p class="text-center" style="color: green;"><?php echo $_GET['order_updated'];?></p>
        <?php } ?>

        <?php if(isset($_GET['order_failed'])){?>
           <p class="text-center" style="color: red;"><?php echo $_GET['order_failed'];?></p>
        <?php } ?>




      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order Id</th>
              <th scope="col">Shoppe Order Id</th>
              <th scope="col">Order Status</th>
              <th scope="col">Product Id</th>
              <th scope="col">Customer name</th>
              <th scope="col">Customer email</th>
              <th scope="col">Customer address</th>
              <th scope="col">Customer Phone Number</th>
              <th scope="col">Order Quantity</th>
              <th scope="col">Order Date</th>
              <th scope="col">Total Payment</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach($orders as $order){?>
            <tr>
              <td><?php echo $order['order_id'];?></td>
              <td><?php echo $order['shoppe_orderid'];?></td>
              <td><?php echo $order['order_status'];?></td>
              <td><?php echo $order['product_id'];?></td>
              <td><?php echo $order['customer_name'];?></td>
              <td><?php echo $order['customer_email'];?></td>
              <td><?php echo $order['customer_address'];?></td>
              <td><?php echo $order['customer_contactnumber'];?></td>
              <td><?php echo $order['order_quantity'];?></td>
              <td><?php echo $order['order_date'];?></td>
              <td><?php echo $order['total_payment'];?></td>


              <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id'];?>">Edit</a></td>
              <td><a class="btn btn-danger" href="delete.order.php?order_id=<?php echo $order['order_id'];?>">Delete</a></td>

            </tr>

            <?php }?>

          </tbody>
        </table>



        <nav aria-label="Page navigation example" class="mx-auto">
        <ul class="pagination mt-5 mx-auto">

          <li class="page-item <?php if($page_no<=1){echo 'disabled';}?> ">
               <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{ echo "?page_no=".($page_no-1);} ?>">Previous</a>
          </li>


          <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
          <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

          <?php if( $page_no >=3) {?>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a></li>
          <?php } ?>



          <li class="page-item <?php if($page_no >=  $total_no_of_pages){echo 'disabled';}?>">
                 <a class="page-link" href="<?php if($page_no >= $total_no_of_pages ){echo '#';} else{ echo "?page_no=".($page_no+1);}?>">Next</a></li>
         </ul>
      </nav>

      </div>
    </main>
  </div>




</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
