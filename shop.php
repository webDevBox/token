<?php
include "conn.php"; 
if(isset($_GET['status']))
{
  $id=$_GET['status'];
  $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE id='$id'"));
  $open=$sql['shopOpen'];
  $close=$sql['shopClose'];
  $start = strtotime($open);
  $end   = strtotime($close);
  
  $timeCustomer=$sql['timePerCustomer'];
  $timer=$timeCustomer*60;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>queuemein</title>
    <link rel="stylesheet" href="jquery.timeselect.css">
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
            <img src="img/logo.png" alt="" height="80px" class="img-fluid" height="80px" width="150px"/>
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
            <!-- <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href=>
                  <span>Grocery</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"
                  ><span>Temple</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mall</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-fancyscroll="data-fancyscroll"
                  href="#"
                  >Bank </a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-fancyscroll="data-fancyscroll"
                  href="#"
                  >Other</a
                >
              </li>
              
            </ul> -->
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
<?php
$query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE id='$id'"));
?>
<div class="col-12">
<div class="container" >
<h3 class="text-center mb-4" style="color: white;">SHOP DETAILS</h3>
<div class="row">

<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 contact-form1">

<div class="col-12">
<div class="row">
<div class="col-12">
    <h3>Shop Name</h3>
    <h5 class="my-3 text-center"><?php echo $query['shopName']; ?></h5>
</div>
<div class="col-12"><h5>Shop Image</h5>
   <center class="my-5" >
   <?php if($query['shopImage'])
   { ?>
   <img src="shops/<?php echo $query['shopImage']; ?>" class="" width="200" height="200" alt="Avatar">
   <?php
   }
   else
   {
     ?>
           <img src="shops/dummy.jpg" class="rounded-circle" width="200" height="200" alt="Avatar">

     <?php
   }
   ?>
   </center>

</div>

<div class="col-12">
    <h5
    >Shop Address</h5>
    <p class="text-center"><?php echo $query['shopAddress']; ?></p>
</div>
<center>
<div data-toggle="modal" class="mt-5 justify-content-center">

<a class="btn btn-primary  mt-2 " href="" data-toggle="modal" data-target="#exampleModal1"
                  ><span class=""> Get Token</span></a>
</div>
</center>
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
      <form action="token.php" method="POST">
      <div class="modal-body">
      
       
            <div class="form-group col-md-12 col-sm-12">
              <label for="">Name <span style="color: red;">*</span></label>
              <input type="text" name="name" class="form-control" id="Shop Name" placeholder="Your Name" required>
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label for="">Phone Number <span style="color: red;">*</span></label>
              <input type="tel" name="phone" class="form-control" id="Shop Name" placeholder="Your Phone Number" required>
            </div>
            <div class="form-group d-none">
              <input type="text" name="id" class="form-control" id="Shop Name" value="<?php echo $id; ?>" required>
            </div>
      
        <div class="form-group col-md-12 col-sm-12">
          <label for="">Select slot<span style="color: red;">*</span></label>
        <select class="form-control" name="slot" id="select1">
        <option disabled selected>Select slot</option>;
            <?php for($i = $start;$i<=$end;$i+=$timer){
              $aloted= date('G:i', $i);
               $checker=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM token WHERE shop='$id' && time='$aloted' && status='active'"));
               if($checker == 0)
               {
              ?>  
                <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
            <?php } }?>
        </select>
        </div>
          
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary"> 
        </form>
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous">
</script>
<script src="jquery.timeselect.js"></script>
<script>
  $(document).ready(function(){
  $("#example").timeselect({
    format: "24h"
  });
})
</script>

</body>
</html>