<?php 
include "includes/header.php";
?>

<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="#">Enter the Passcode</label>
                        <input type="password" class="form-control" id='input' name = 'pass'>
                        <p class='paras mt-1'></p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block  btn-dark" name='login'>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
function wrongpass(){
    let input = document.querySelector('#input');
    let text = document.querySelector('.paras');
    input.style.borderColor = 'red';
    text.textContent = 'Wrong Password';
    text.style.color = 'red';
    text.style.fontWeight = 'bolder';
    text.style.fontSize = '13px';
    setTimeout(clearAlerts,1000)
}
function clearAlerts(){
    let input = document.querySelector('#input');
    let text = document.querySelector('.paras');
    input.style.borderColor = '#ced4da';
    text.textContent = '';
}
</script>


<?php
if(isset($_POST['login'])){
    $password = $_POST['pass'];
    $realpass = 'hello12345';
    $code = 'hello';
    if($password == $realpass){
        $_SESSION['admining'] = $code  ;
        header("Location: snadding.php");
    }else {
        echo "<script>wrongpass()</script>";
    }
}
?>

<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>