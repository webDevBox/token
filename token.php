<?php
include "conn.php"; 
error_reporting(0);
if(isset($_POST['submit']))
{
  $message='';

  $customer=$_POST['name'];
  $phone=$_POST['phone'];
  $shopId=$_POST['id'];
  $token=rand();
  $date=date('Y-m-d');
  $slot=$_POST['slot'];


  $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE id='$shopId'"));
  $timeCustomer=$sql['timePerCustomer'];
  $endTime = strtotime("+$timeCustomer minutes", strtotime($slot));
  $shopName=$sql['shopName'];
  $address=$sql['shopAddress'];

  $query1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM token WHERE shop='$shopId' && status='active'"));
  $tokenNumber=$query1['tokenNumber'];
  if($token == $tokenNumber)
  {
    $token=rand();
  }
$insert=mysqli_query($conn,"INSERT INTO token(shop,tokenNumber,phoneCustomer,nameCustomer,validDate,time,status)
VALUE('$shopId','$token','$phone','$customer','$date','$slot','active')");
if($insert)
{
  $message="Your Given Token Has Been Generated";
}
else
{
  $message="Your Given Token Has Not Been Generated";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>queuemein</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="img//favicon.png">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>.contact-form1{
    -webkit-box-shadow: 0px 0px 15px 0px rgba(22, 133, 244, 0.3);
    box-shadow: 0px 0px 15px 0px rgba(22, 133, 244, 0.3);
    border-radius: 10px;
    padding: 52px 30px 60px;
    background-color: white;
}

footer{
    margin-top: 12%;
    color:white;

}
body{
    background: rgb(128,216,217);
  background: linear-gradient(0deg, rgba(128,216,217,0.8155637254901961) 0%, rgba(0,172,238,1) 100%);
}
.header-categories{

margin: 8px auto;
line-height: 20px;

}
.modal-content{
      border-radius: 10px;
    }
.header-categories .header-category{display:inline-block;height:28px;cursor:pointer;text-decoration:underline;font-weight:500;font-size:16px;letter-spacing:1px;color:#fff}
.header-categories .devider{font-size:16px;color:#fff;padding:0 8px}

</style>


</head>
<body >
    <div class="container-fluid nav-wapper">
        <nav class="navbar  navbar-expand-lg nav mx-3">
          <a class="navbar-brand" href="index.php">
             <img src="img/logo.png" alt="" class="img-fluid" height="80px" width="150px" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="fa fa-bars"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarNav"
          >
            
          </div>
        </nav>
      </div>
      <div class="col-md-6 offset-md-3 my-5">
        <div class="col-12 " >
        <form action="index.php" method="post"> 
        <div class="input-group mb-3">
      <input type="text" class="form-control" name="shopname" placeholder="Search For Shops">
      <input type="submit" class="nav-link btn btn-sm" name="submit" value="Search">
      </form>
        </div>
        <section class="header-categories text-center">
            
            <a href="index.php?type=mall" class="header-category" >MALL</a><span class="devider">|</span>
            
            <a href="index.php?type=bank" class="header-category" >BANK</a><span class="devider">|</span>
            
            <a href="index.php?type=clinic" class="header-category" >CLINIC</a><span class="devider">|</span>
            
            <a href="index.php?type=temple" class="header-category" >TEMPLE</a><span class="devider">|</span>
            
            <a href="index.php?type=kirana" class="header-category" >KIRANA</a><span class="devider">|</span>
            
            <a href="index.php?type=liqour" class="header-category" >LIQOUR</a><span class="devider">|</span>
            
            <a href="index.php?type=other" class="header-category" >OTHER</a>
            
          </section>
       
        </div>
</div>


<div class="col-12">
<div class="container" >
<h3 class="text-center mb-4" style="color: white;">YOUR TOKEN</h3>
<div class="row">

<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3  " style="background-color:black; border-radius:10px;">
<div class="col-12">
<h5 class="text-center text-warning mt-2"> <?php echo $message; ?></h5>
<h5 style="color:white" class="ml-3 mt-2">Token# <?php echo $token; ?></h5>  

<center><img src="img/logo.png" alt="" class="img-fluid" height="50px" width="125px" /></center>
<center><h3 style="color:white;">Respect Social Distancing</h3></center>
</div>
<div class="col-12 contact-form1 my-3">
<div class="row">
<div class="col-6">
    <h5
    >Shop Name</h5>
    <p class="ml-3"><?php echo $shopName; ?><hr></p>
    
</div>
<div class="col-6"><h5
    >Phone Number</h5>
    <p class="ml-3"><?php echo $phone; ?> <hr></p></div>


</div>

<div class="col-12">
    <h5
    >Shop Address</h5>
    <p> <?php echo $address; ?> <hr></p>
</div>
<div class="col-12">
    <div class="row">
    
        <div class="col-md-12 col-sm-12 mt-4">
            <div class="col-12">
                <h5>Valid Only On</h5>
                <p><?php echo $date; ?><hr></p>
            </div>
            <div class="col-12"><h5>Time</h5>
                <p><?php echo $slot; ?> - <?php echo  date('h:i', $endTime); ?> <hr></p></div>
        </>
    </div>
</div>
<!-- <div data-toggle="modal">
<a class="btn btn-primary text-center mt-2 " href="#" data-toggle="modal" data-target="#exampleModal1"
                  ><span class=""> Get Token</span></a>
</div> -->

</div>









</div>








</div>
</div>

</div>



<footer><center>&copy; Copy Right reserved</center></footer>




<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Get Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
          <div class="form-group col-12">
            <label for="">Name</label>
            <input type="text" class="form-control" id="User Name" placeholder="Your Name">
          </div>
          <div class="form-group col-12">
            <label for="">Number </label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Your Contact Number">
          </div>
          
        </div>
        </form>
      </div>
      <div class="modal-footer">
      
        <a href="#" class="btn btn-primary">Get Token</a>
      </div>
    </div>
  </div>
</div>











<script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('main').className += 'loaded';
      });
  
  
      document.onreadystatechange = function () {
        setTimeout(function () {
          document.getElementById('loader_bg').style.visibility = "hidden";
        }, 2000);
  
      }
</script>  
</body>
</html>