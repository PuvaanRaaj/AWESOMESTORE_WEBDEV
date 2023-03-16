
<?php include('layouts/header.php'); ?>



<?php


include('server/connection.php');


if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}


?>


      <!--Account-->
      <section class="my-5 py-5">
         <div class="row mx-auto">

         
          
             <div class="text-center mt-3 pt-5 col-lg-12 col-md-12 col-sm-12">
             
                 <h3 class="font-weight-bold">Account info</h3>
                 <hr class="mx-auto">
                 <div class="account-info">
                     <p>Name :<span> <?php if(isset($_SESSION['staff_name'])){ echo $_SESSION['staff_name'];} ?></span></p>
                     <p>Email :<span> <?php if(isset($_SESSION['staff_email'])){ echo $_SESSION['staff_email'];} ?></span></p>
                 </div>
             </div>

            
         </div>
      </section>
</body>
</html>
