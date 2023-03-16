
<?php include('layouts/header.php'); ?>


<?php

include('server/connection.php');


if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}


if(isset($_GET['logout'])){
  if(isset($_SESSION['admin_logged_in'])){
    unset($_SESSION['admin_logged_in']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_name']);
    header('location: login.php');
    exit;
   
  }
} 

if(isset($_POST['change_password'])){

          $password = $_POST['password'];
          $confirmPassword = $_POST['confirmPassword'];
          $admin_email = $_SESSION['admin_email'];

          //if passwords dont match
          if($password !== $confirmPassword){
            header('location: profile.php?error=passwords dont match');
          

          //if passwod is less than 6 char
          }else if(strlen($password) < 6){
            header('location: profile.php?error=password must be at least 6 charachters');

            //no errors
          }else{
             
            $stmt = $conn->prepare("UPDATE admins SET  admin_password=? WHERE admin_email=?");
            $stmt->bind_param('ss',$password,$admin_email);

            if($stmt->execute()){
              header('location: profile.php?message=password has been updated successfully');
            }else{
              header('location: profile.php?error=could not update password');
            }
            
          }

  
}


?>
      

<div class="container-fluid">
  <div class="row" style="min-height: 100%">
    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
        <div class="row">
           <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h3 class="mb-sm-0 pt-5">Reset Password</h3>
                   <div class="page-title-right menu">
                       <ol class="breadcrumb  pt-5">
                           <li class="breadcrumb-item">Awesome Store</li>
                           <li class="breadcrumb-item active">Profile</li>
                       </ol>
                   </div>
               </div>
           </div>
         </div>    
    
        <!--Account-->
      <section class="my-5 py-5">
         <div class="row container mx-auto">
             <div class="col-lg-6 col-md-12 col-sm-12 ">
                 <form id="account-form" method="POST" action="resetpassword.php">
                   <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                   <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
                     <h3>Change Password</h3>
                     <hr class="mx-auto">
                     <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
                     </div>
                     <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Password" required/>
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" value="Change Password" name="change_password" class="btn btn-success" id="change-pass-btn">
                    </div>
                 </form>
             </div>
         </div>
      </section>
        </main>
  </div>
</div>