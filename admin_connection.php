
<?php

        $conn = mysqli_connect('localhost','root', '' ,'yummy');
    //   $result=mysqli_select_db($conn,'yummy_dishes');
           if($conn){
                // die(mysqli_error($conn));

        }
           else{
                echo "There is Error";
           }
?>