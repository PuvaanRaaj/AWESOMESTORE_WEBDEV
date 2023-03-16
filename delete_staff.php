<?php

session_start();

  include('server/connection.php');

?>

<?php

   if(!isset($_SESSION['admin_logged_in'])){
         header('location: login.php');
         exit();

   }

   if(isset($_GET['staff_id'])){
       $staff_id = $_GET['staff_id'];
        $stmt = $conn->prepare("DELETE FROM staffs WHERE staff_id=?");
        $stmt->bind_param('i',$staff_id);

        if($stmt->execute()){

          header('location: staff.php?deleted_successfully=Staff details has been deleted successfully');

        }else{
            header('location: staff.php?deleted_failure=Could not delete staff detail');
        }

   }
?>
