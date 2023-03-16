<?php include('layouts/Login_header.php'); ?>


<?php

include('../server/connection.php');

if(isset($_SESSION['logged_in'])){
    header('location: index.php');
    exit;
}

if(isset($_POST['login_btn'])){


  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT staff_id,staff_name, staff_email, staff_password FROM staffs WHERE staff_email = ? AND staff_password = ? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()){
      $stmt->bind_result($staff_id,$staff_name,$staff_email,$staff_password);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
         $stmt->fetch();

        $_SESSION['staff_id'] = $staff_id;
        $_SESSION['staff_name'] = $staff_name;
        $_SESSION['staff_email'] = $staff_email;
        $_SESSION['logged_in'] = true;

        header('location: index.php?login_success=logged in successfully');

      }else{
        header('location: login.php?error=could not verify your account');
      }

  }else{
    //error
    header('location: login.php?error=something went wrong');

  }


}

?>
      <!--Login-->
      <section id="myDiv" class="animate-bottom" style="">
    <div class="image_container>">
        <img src="../images/backgroundimage.jpg" alt="">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="login.php" method="POST">
                    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                    <div class="forms">
                        <div class="login_image">
                            <img src="../images/avatar.png" alt="">
                        </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"  placeholder="Enter Your Password" id="myInput">
                                <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                            </div>

                            <!-- Forget Password -->

                            <div class="submit_button">
                                <button type="submit" class="btn btn-success mt-3" name="login_btn">Login</button>
                                <!-- <a href="#"><p>Forgot Password?</p></a> -->
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


      <script type="text/javascript">
          var myVar;

          function myFunction() {
          myVar = setTimeout(showPage, 200);
          }

          function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
          }
    </script>



      <?php include('layouts/footer.php'); ?>