<?php 
include "admin_connection.php";
// echo "php is Running..........";
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `yummy_dishes` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo"Deleted Successfully";
        header("location:admin_display_menu.php");
    }else{
        die(mysqli_error($conn));
    }
    
}

?>