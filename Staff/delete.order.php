<?php 

session_start();
 
  include('../server/connection.php');

?>


<?php 
   
   if(!isset($_SESSION['logged_in'])){
         header('location: login.php');
         exit();

   }


   if(isset($_GET['order_id'])){
       $product_id = $_GET['order_id'];
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_id=?");
        $stmt->bind_param('i',$order_id);

        if($stmt->execute()){

          header('location: order.php?deleted_successfully=Product has been deleted successfully');

        }else{
            header('location: order.php?deleted_failure=Could not delete product');
        }
   
   }

?>
