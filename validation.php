<?php include "includes/db.php";
    session_start();
if(isset($_POST['number'])){

    $sno = $_POST['number'];
   $sno =  mysqli_real_escape_string($connect,$sno);
    $query = "SELECT * FROM sno WHERE s_no = '$sno' ";
    $fullq = mysqli_query($connect,$query);
    $count = mysqli_num_rows($fullq);
    if($count > 0){
        $_SESSION['sno'] = $sno;
      echo 1;
    }else {
        echo 2;
    }
}
?>