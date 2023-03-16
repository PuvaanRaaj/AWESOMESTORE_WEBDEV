<?php

include('../server/connection.php');


if(isset($_POST['create_staff'])){

 
    //create a new staff
    $stmt = $conn->prepare("INSERT INTO staffs (staff_name, staff_age, staff_email, staff_address,staff_salary, staff_password)
                                                  VALUES (?,?,?,?,?,?)");

  
     $stmt->bind_param('sissds',$staff_name, $staff_age, $staff_email, $staff_address, $staff_salary, $staff_password);

  

     $staff_name = $_POST['name'];
     $staff_age = $_POST['age'];
     $staff_email = $_POST['email'];
     $staff_address = $_POST['address'];
     $staff_salary = $_POST['salary'];
     $staff_password = $_POST['password'];

    
      if($stmt->execute()){

          header('location: staff.php');
      }else{
          header('location: staff.php');
      }
  
  }

 ?>




