<?php include('layouts/header.php'); ?>

<?php 
   
    if(!isset($_SESSION['logged_in'])){
          header('location: login.php');
          exit();

    }

?>
          

<div class="container-fluid">
  <div class="row" style="min-height: 100%">
   

    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4 mt-5">
    <div class="row">
           <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h3 class="mb-sm-0 mt-5">Developer Detail</h3>
                   <div class="page-title-right menu">
                       <ol class="breadcrumb mt-5 ">
                           <li class="breadcrumb-item">Awesome Store</li>
                           <li class="breadcrumb-item active">Help</li>
                       </ol>
                   </div>
               </div>

           </div>
       </div>
       

      <div class="container mt-3">
        <p>Please contact puvaanraaj@email.com</p>
        <p>Please call 01156291404</p>
      </div>
      <br>
      <div>
          <span><a class="btn btn-success" href="contact.php">Contact Developer</a></span>
      </div>
   

      </div>
    </main>
  </div>




</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
