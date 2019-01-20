<?php 
include "includes/header.php";
?>

<?php
if(!isset($_SESSION['admining'])){
    header("Location: admining.php");
} 
?>

<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="#">Enter the Serial No / IMEI No</label>
                        <input type="text" name='serial' class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block  btn-dark" name='btn'>Add Device</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['btn'])){
            $sno = $_POST['serial'];
            if(!empty($sno)){
            $query = "INSERT INTO sno (s_no) VALUES ('$sno')";
            $fullq = mysqli_query($connect,$query);
            if($fullq){
                header("Location: snadding.php");
            }
        }}

        ?>
    </div>
</section>
<section class="mt-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Added Devices are : </h3>
                <table class="table table-hoverable">
                    <thead class="bg-dark text-white">
                        <th>#</th>
                        <th>Serial No</th>
                        <th>Delete Device</th>
                    </thead>
                    <tbody>
                        <?php
                        $fetching = "SELECT * FROM sno";
                        $fulf = mysqli_query($connect,$fetching);
                        $count = mysqli_num_rows($fulf);
                        $i = 1;
                        while ($i <= $count){

                            while ($row = mysqli_fetch_assoc($fulf)){
                               $sno = $row['s_no']; 
                               $id = $row['s_id'];
                               ?>
                      
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $sno ?></td>
                            <td><a href="snadding.php?s=<?php echo $id?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr> 
                       
                        <?php
                            }
                        }
                        ?>
                                    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
if(isset($_GET['s'])){
    $s_id = $_GET['s'];
    $deleting = "DELETE FROM sno WHERE s_id = $s_id";
    $fulld = mysqli_query($connect,$deleting);
    if($fulld){
        header("Location: snadding.php");
    }
}


?>


<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>