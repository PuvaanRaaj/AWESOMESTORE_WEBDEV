
<?php

include('server/connection.php');



if(isset($_POST['create_order'])){

$shoppe_orderid = $_POST['shoppe_orderid'];
$order_status = $_POST['status'];
$customer_name = $_POST['name'];
$customer_email = $_POST['email'];
$customer_address = $_POST['address'];
$customer_contactnumber = $_POST['number'];
$order_quantity = $_POST['quantity'];
$product_id = $_POST['product_id'];
$subTotal = $_POST['cost'];
$total_payment = $_POST['payment'];

 

  //create a new order
  $stmt = $conn->prepare("INSERT INTO orders (shoppe_orderid, order_status, customer_name, customer_email, customer_address, 
                        customer_contactnumber, order_quantity, product_id, subTotal, total_payment)
                                                VALUES (?,?,?,?,?,?,?,?,?,?)");



   $stmt->bind_param('ssssssiidd',$shoppe_orderid, $order_status, $customer_name, $customer_email, $customer_address, $customer_contactnumber, $order_quantity, $product_id, $subTotal, $total_payment);

    if($stmt->execute()){
        header('location: order.php?product_created=Product has been created successfully');
    }else{
        header('location: order.php?product_failed=Error occured, try again');
    }

}

 ?>
