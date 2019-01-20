<?php
include "includes/header.php";
if(isset($_SESSION['sno'])){
   echo "Yes";
}
else {
    echo 'no';
}
?>