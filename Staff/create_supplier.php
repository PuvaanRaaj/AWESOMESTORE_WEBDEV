<?php

include('../server/connection.php');


if(isset($_POST['create_supplier'])){


  //create a new supplier
  $stmt = $conn->prepare("INSERT INTO suppliers (supplier_name, supplier_age, supplier_email, supplier_address, 
                            supplier_number, supplier_shop) VALUES (?,?,?,?,?,?)");



   $stmt->bind_param('sissis',$supplier_name, $supplier_age, $supplier_email, $supplier_address, $supplier_number, $supplier_shop);

   $supplier_name = $_POST['name'];
   $supplier_age = $_POST['age'];
   $supplier_email= $_POST['email'];
   $supplier_address = $_POST['address'];
   $supplier_number = $_POST['number'];
   $supplier_shop= $_POST['shop'];

    if($stmt->execute()){
        header('location: supplier.php');
    }else{
        header('location: supplier.php');
    }


}


 ?>


