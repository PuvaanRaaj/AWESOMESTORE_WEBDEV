<?php include('layouts/header.php'); ?>


<?php

   if(isset($_GET['staff_id'])){
    $staff_id = $_GET['staff_id'];
    $stmt = $conn->prepare("SELECT * FROM staffs WHERE staff_id=?");
    $stmt->bind_param('i',$staff_id);
    $stmt->execute();

    $staffs = $stmt->get_result(); 

  }else if(isset($_POST['edit'])){

       $staff_id = $_POST['staff_id'];
       $staff_name= $_POST['name'];
       $staff_age = $_POST['age'];
       $staff_email = $_POST['email'];
       $staff_address= $_POST['address'];
       $staff_salary = $_POST['salary'];
       $staff_password = $_POST['password'];

       
        $stmt = $conn->prepare("UPDATE staffs SET staff_name=?, staff_age=?, staff_email=?, staff_address=?, staff_salary=?,staff_password=?
                                  WHERE staff_id=?");
        $stmt->bind_param('sissdsi',$staff_name,$staff_age,$staff_email,$staff_address,$staff_salary,$staff_password,$staff_id);

        if($stmt->execute()){
          ?>
          <script>
            window.location.href="staff.php?edit_success_message=Staff details has been updated successfully"
          </script>
          <?php
        }else{
          ?>
          <script>
            window.location.href="staff.php?edit_failure_message=Error occured, try again"
          </script>
          <?php
         }
  }else{
     header('Location: staff.php');
     exit;
   }


?>

<div class="container-fluid">
  <div class="row" style="min-height: 100%">



    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="row">
           <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h3 class="mb-sm-0">Staff</h3>
                   <div class="page-title-right menu">
                       <ol class="breadcrumb ">
                           <li class="breadcrumb-item">Awesome Store</li>
                           <li class="breadcrumb-item active">Edit Staff Lists</li>
                       </ol>
                   </div>
               </div>

           </div>
       </div>
      <div class="table-responsive">



          <div class="mx-auto container">
              <form id="edit-form"  method="POST" action="edit_staff.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">

                 <?php foreach($staffs as $staff){ ?>

                   <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id'];?>" />

                    <label>Staff Name</label>
                    <input type="text" class="form-control" id="staff-name" value="<?php echo $staff['staff_name']?>" name="name" placeholder="name" required/>
                </div>
                <div class="form-group mt-2">
                    <label>Staff Age</label>
                    <input type="text" class="form-control" id="staff-age" value="<?php echo $staff['staff_age']?>"  name="age" placeholder="age" required/>
                </div>
                <div class="form-group mt-2">
                    <label>Staff Email</label>
                    <input type="text" class="form-control" id="staff-age" value="<?php echo $staff['staff_email']?>"  name="email" placeholder="email" required/>
                </div>
                  <div class="form-group mt-2">
                      <label>Staff Address</label>
                      <input type="text" class="form-control" id="staff-addrs" value="<?php echo $staff['staff_address']?>"  name="address" placeholder="address" required/>
                  </div>
                  <div class="form-group mt-2">
                    <label>Staff Salary</label>
                    <input type="text" class="form-control" id="staff-salary"  value="<?php echo $staff['staff_salary']?>"  name="salary" placeholder="salary" required/>
                </div>
                <div class="form-group mt-2">
                    <label>Staff Password</label>
                    <input type="text" class="form-control" id="staff-password"  value="<?php echo $staff['staff_password']?>"  name="password" placeholder="Passowrd" required/>
                </div>



                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="edit" value="Edit"/>
                </div>

                <?php } ?>

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
