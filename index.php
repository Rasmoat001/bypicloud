<?php 
include "includes/header.php";
?>



<section class="main-section"> 
<div class="container">
<div class="row">
    <div class="col-md-7">
        <div class="flexbox-area">
            <h3>Are you having issues Bypassing iCloud  on your phone ? </h3>
            <p class="">Then Here is a solution to embrace back you apple device. Feel free to contact Rasmoat for instruction for just USD 20 $ and get the chance to use your phone normally. Make this happen by just making payment and submiting you <strong>Device udid</strong> and see the excellent being done to make your device usable.  </p>
        </div>
    </div>
    <div class="col-md-5">
        <img src="img/illustration.jpg" alt="" class="img-fluid">
    </div>
</div>
</div>
</section>


<section class="mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="flexbox-area">
                    <h3>How it happens ?</h3>
                    <p>Cloud Bypass for iOS 10.0, 10.0.1, 10.0.2, 10.0.3, 10.1, 10.1.1, 10.2, 10.2.1 - Devices Supported all (iPad, iPhone or iPod) on supported iOS version. For iOS(10.0, 10.0.1, 10.0.2, 10.0.3, 10.1 and 10.1.1) the bypass is Tethered(Activation Lock Back when you reboot the device) to avoid that you need to jailbreak your device after bypass and delete Setup.app on iOS(10.2 and 10.2.1) the bypass is Untethered you can reboot the device without problem. This is just iCloud Bypass not fully activation wifi devices 100% working, GSM devices NO NETWORK you can't do Calls or Send SMS also you need to have a sim with pin code to keep the iPhone activated</p>
                </div>
            </div>
            <div class="col-md-6">
<img src="img/5940fda9ab8b05ceb22b4a003b6bf84b.jpg" alt="" class="img-fluid front-img" >
            </div>
        </div>
    </div>
</section>

<script>




</script>


<section class="mt-2">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="img/hero_2x.jpg" alt="" class="img-fluid front-img">
        </div>
        <div class="col-md-6">
            <h3>BOOM! Already made the payment ?</h3>
            <p>The procedure is almost over you may now submit your <strong>IMEI or UDID </strong> and let the team do its job.</p>
       
                <div class="form-group">
                    <input type="text" placeholder="Enter IMEI or Udid." id='snoArea' name='number' class="form-control">
                    <p class="texting mt-1"></p>
                </div>
                <div class="form-group text-center  ">
                    <button class="btn buttoning btn-lg btn-dark" name='submiting'>Submit</button>
                </div>



        </div>
    </div>
</div>
</section>




<section class="mt-2 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>Thank you for Working with Us !</h3>
                <p>We really appreciate your corporation would like to hear a feedback from you</p>
                <p>You may kindly find me on:</p>
            <i class="fab fa-twitter-square fa-2x"></i> <span class="ml-2 para"><strong>@Rasmoat97</strong> </span><br>
            <i class="fab fa-google-plus-square fa-2x"></i> <span class="ml-2 para"> <strong>Rasmoatyaya1997@gmail.com</strong></span><br>
            <i class="fab fa-telegram fa-2x "></i> <span class="ml-2 para"> <strong>@Rasmoat</strong></span>
            </div>
            <div class="col-md-5">
                <img src="img/girl_2x.jpg" alt="" class="img-fluid front-img">
            </div>
        </div>
    </div>
</section>

<footer class="text-center">
    <p><strong>&copy; 2019 Rasmoat Icloud Server</strong></p>
</footer>

<script src="js/jquerymin.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $('.buttoning').click(function(){
        var number = $('#snoArea').val();
        if (number != ' '){
            $.ajax({
                url:'validation.php',
                method:'POST',
                data:{number:number},
                success:function(data){                    
                    if(data == 1){
                        redirecting();             
             }else {
                        notFound();
                    }
                }
            })
        }else {
            notFound();
        }
    })
})
function notFound(){
    let inputs = document.querySelector('#snoArea');
 let texting = document.querySelector('.texting');
        inputs.style.borderColor = 'red';
    texting.innerHTML = 'IMEI/Serial No not found !';
    texting.style.color = 'red';
    texting.style.fontWeight = 'bolder';
    texting.style.fontSize = '13px';
    setTimeout(clearAlerts,2000);
}
function clearAlerts(){
    let inputs = document.querySelector('#snoArea');
 let texting = document.querySelector('.texting');  
     inputs.style.borderColor = '#ced4da';
    texting.innerHTML = '';
}
function redirecting(){
let inputs = document.querySelector('#snoArea');
 let texting = document.querySelector('.texting');  
 let btn = document.querySelector('.buttoning');
 inputs.value= '';
 btn.textContent = 'Authorizing...';
 setTimeout(redirect,2000);
}
function redirect(){
    location.href = 'rasmoat.php';
}
</script>
</body>
</html>