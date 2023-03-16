<?php

include('server/connection.php');


if(isset($_POST['create_product'])){

 $product_name = $_POST['name'];
 $stock_quantity = $_POST['quantity'];
 $stock_limit = $_POST['limit'];
 $unit_price = $_POST['price'];
 $supplier_id = $_POST['supplier_id'];


 //this is the file itself (image)
 $product_image_name =$_FILES['image1']['name'];
 $product_image =$_FILES['image1']['tmp_name'];


 $image_name1 = $product_name."1".$product_image_name;

 //upload images
 move_uploaded_file($product_image,"assets/product-images/".$image_name1);
 


  //create a new user
  $stmt = $conn->prepare("INSERT INTO products (product_name,stock_quantity,stock_limit,unit_price,supplier_id,product_image)
                                                VALUES (?,?,?,?,?,?)");

   $stmt->bind_param('siiiis',$product_name,$stock_quantity,$stock_limit,$unit_price,$supplier_id,$image_name1);

    if($stmt->execute()){
        header('location: products.php?product_created=Product has been created successfully');
    }else{
        header('location: products.php?product_failed=Error occured, try again');
    }

}

 ?>
