<?php
session_start();
include "conn.php";
 function get_ip()
{
    if(isset($_SERVER['HTTP_CLIENT_IP']))
    {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}
$ip=get_ip();
$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success'){
   $country=$query['country'];
   $city=$query['city'];
}
else
{
  $country="pakistan";
  $city="Lahore";
}


// Token Deactivation
$date=date("Y-m-d");
$sql3=mysqli_query($conn,"SELECT * FROM token WHERE status='active'");
foreach($sql3 as $token)
{
  $check=$token['validDate'];
  $id=$token['id'];
  if(strtotime($date) > strtotime($check))
{
   $sql4=mysqli_query($conn,"UPDATE token SET status='inactive' WHERE id='$id'");
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>queuemein</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="img//favicon.png">
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <style>
    .coming{
        border-style:double;
    }
      .footer {
   position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   margin-top:10%;
   background-color: #00acee;
   color: white;
   text-align: center;
}
      li a {
        font-size: 18px;
        line-height: 20px;
        color: #fcfcfc;
        margin-left: 36px;
        vertical-align: top;
        font-weight: 600;
      }
      .nav {
        overflow-x: hidden;
        z-index: 999;
        color: white;
      }

      .nav a {
        color: white;
        font-weight: 500;
        font-family: Concert One;
        font-size: 110%;
      }

      .header-categories{

      margin: 8px auto;
    line-height: 20px;
    
      }
      .header-categories .header-category{display:inline-block;height:28px;cursor:pointer;text-decoration:underline;font-weight:500;font-size:16px;letter-spacing:1px;color:#fff}
      .header-categories .devider{font-size:16px;color:#fff;padding:0 8px}
      @media screen and (max-width: 2000px){
      .hhh{

        margin-top: -23%;

    }
    .kk{margin-top: 25%;}
  }
    
    @media screen and (max-width: 991px) {
      .hhh{

        margin-top: -90%;

    }
    .kk{margin-top: 35%;}

  }
    .modal-content{
      border-radius: 10px;
    }
    </style>


  </head>
  <body
    style="overflow-x:hidden; 
    "
  >

  <!-- <div id="loader_bg" class="loader_bg">
		<div class="loader"></div>
	</div> -->
    <header>
      <div class="container-fluid nav-wapper" style="background-color:#00acee;">
        <nav class="navbar sticky-top navbar-expand-lg nav mx-3" >
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
            class="collapse navbar-collapse justify-content-end"
            id="navbarNav"
          >
            <ul class="navbar-nav">
             
              <li class="nav-item">
                <a class="nav-link btn btn-sm" href="#" data-toggle="modal" data-target="#exampleModal1"
                  ><span class=""> Log In</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-sm" href="#" data-toggle="modal" data-target="#exampleModal"
                  ><span class=""> Register Shop</span></a>
              </li>
            </ul>
          </div>
        </nav>

       
                  
         
         <h1 class="text-white text-center">Respect Social Distancing</h1>
         <div class="col-md-6 offset-md-3" >
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
    </header>

    <div class="col-12  ">
      <h4 class="text-center" style="color: #00acee;">Near By Shops</h4>
      <div class="container mt-5">
       
          <div class="row">
            <?php
            if(!isset($_GET['type']) && !isset($_POST['submit']))
            {
            $query=mysqli_query($conn,"SELECT * FROM shop WHERE country='$country' && city='$city'");
            }
            elseif(isset($_GET['type']))
            {
              $type=$_GET['type'];
              $query=mysqli_query($conn,"SELECT * FROM shop WHERE shopCategory='$type'");
            }
            elseif(isset($_POST['submit']))
            {
              $schoolname=$_POST['shopname'];
              $query=mysqli_query($conn,"SELECT * FROM shop WHERE shopName='$schoolname'");
            }
            $checker=mysqli_num_rows($query);
              if($checker > 0)
              {
            foreach ($query as $row) {  
?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
      <?php if($row['shopImage']) { ?>
        <img src="shops/<?php echo $row['shopImage']; ?>" class="" width="100" height="100" alt="Avatar">
      <?php } 
      else
      {
        ?>
           <img src="shops/dummy.jpg" class=""  width="100" height="100" alt="No img">
        <?php
      }
      ?>
        <center>
          <h5> <?php echo $row['shopName']; ?> </h5>
            <a href="shop.php?status=<?php echo $row['id']; ?>" class="btn  btn-sm" style="margin-top: 60px; background-color: #00acee; text-decoration: none; color: white;">See Shop</a>
          </center>
      </div>
      <div class="flip-card-back">
      </div>
    </div>
  </div>
</div>
            <?php   
    }
  } 
  else
  { ?>
  <div class="mx-auto">
  <h1 class="h1 text-center coming">COMING SOON</h1>
  <h5 class="text-center">in your city</h5>
  </div>
  <?php
  }   
    ?>
          </div>
       
      </div>
    </div>

    <script data-ad-client="ca-pub-8516631958588162" async
src="https://pagead2.googlesyndication.com/pagead/js/
adsbygoogle.js"></script>


    

   


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rergister Shop</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                  <label for="">Username <span style="color: red;">*</span></label>
                  <input type="text" name="user" class="form-control" id="Shop Name" placeholder="Your User Name" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="">Password <span style="color: red;">*</span></label>
                  <input type="password" name="pass" class="form-control" id="Shop Name" placeholder="Your Password" required>
                </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Name <span style="color: red;">*</span></label>
                <input type="text" name="shop" class="form-control" id="Shop Name" placeholder="Shop Name" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Category <span style="color: red;">*</span></label>
            <select class="form-control" name="category" required>
              <option class="disable" >Select Shop Category</option>
              <option value="mall">Mall</option>
              <option value="bank">Bank</option>
              <option value="clinic">Clinic</option>
              <option value="temple">Temple</option>
              <option value="kirana">Kirana</option>
              <option value="liqour">Liqour</option>
              <option value="other">Other</option>
              
            </select>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Opening Time <span style="color: red;">*</span></label>
                <input type="time" name="open" class="form-control" id="exampleFormControlInput1" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Closing Time <span style="color: red;">*</span></label>
                <input type="time" name="close" class="form-control" id="exampleFormControlInput1" required>
              </div>
              <div class="form-group col-md-12 col-sm-12">
                <label for="">Estimated Time Per Customer<span style="color: red;">*</span></label>
                <input type="number" name="estimate" class="form-control" id="exampleFormControlInput1" placeholder="Time Per Customer in Minute" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Country <span style="color: red;">*</span></label>
                <input type="text" name="country" class="form-control" id="Shop Name" placeholder="Your Country" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">City <span style="color: red;">*</span></label>
                <input type="text" name="city" class="form-control" id="Shop Name" placeholder="Your City" required>
              </div>
              <div class="form-group col-12">
                <label for="exampleFormControlTextarea1">Shop Address <span style="color: red;">*</span></label>
                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" placeholder="Your Shop Address " rows="3" required></textarea>
              </div>
              <div class="form-group ml-2">
                <label for="exampleFormControlFile1">Shop Image</label>
                <input type="file" accept="image/*" class="form-control-file" name="image" id="exampleFormControlFile1">
              </div>
            </div>
            

          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
            <input type="submit" name="register" value="Save" class="btn btn-primary"> 
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="POST">
              <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                  <label for="">User Name <span style="color: red;">*</span></label>
                  <input type="text" name="user" class="form-control" id="Shop Name" placeholder="Your User Name" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="">Password <span style="color: red;">*</span></label>
                  <input type="password" name="pass" class="form-control" id="Shop Name" placeholder="Your Password" required>
                </div>
            </div>
            

          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
            <input type="submit" name="login" value="Login" class="btn btn-primary"> 
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

<div class="footer">
  <section class="header-categories text-center">
      
    <a href="index.php?type=mall" class="header-category" >MALL</a><span class="devider">|</span>
    
    <a href="index.php?type=bank" class="header-category" >BANK</a><span class="devider">|</span>
    
    <a href="index.php?type=clinic" class="header-category" >CLINIC</a><span class="devider">|</span>
    
    <a href="index.php?type=temple" class="header-category" >TEMPLE</a><span class="devider">|</span>
    
    <a href="index.php?type=kirana" class="header-category" >KIRANA</a><span class="devider">|</span>
    
    <a href="index.php?type=liqour" class="header-category" >LIQOUR</a><span class="devider">|</span>
    
    <a href="index.php?type=other" class="header-category" >OTHER</a>
    
  </section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 my-5">
        <p class="text-white text-center">
        &copy; Copy Right reserved
        </p>
      </div>
    </div>
 </div>

</div> 
    </body>
</html>
<?php
if(isset($_POST['register']))
{
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $shop=$_POST['shop'];
  $type=$_POST['category'];
  $open=$_POST['open'];
  $close=$_POST['close'];
  $estimate=$_POST['estimate'];
  $country=$_POST['country'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $fold=$_FILES['image']['name'];
  $temp=explode('.',$fold);
  $ext=end($temp);
  $img=$user.'.'.$ext;
  $tmp=$_FILES['image']['tmp_name'];
  $des="shops/".$img;
  $upload=move_uploaded_file($tmp,$des); 
  $counter=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM shop WHERE userName='$user'"));
  if($counter > 0)
  {
    ?>
    <script>
      window.alert("<?php echo $user; ?> User Name Already Exist! \n Try Another!");
      window.location.href= 'index.php';
    </script>
      <?php
  }
  else
  {
  if($fold)
  {
$sql=mysqli_query($conn,"INSERT INTO shop(userName,password,shopName,shopCategory,shopOpen,shopClose,timePerCustomer,country,city,shopAddress,shopImage) 
VALUES('$user','$pass','$shop','$type','$open','$close','$estimate','$country','$city','$address','$img')");
if($sql)
{
  ?>
<script>
  window.alert("Shop Registered");
  window.location.href= 'index.php';
</script>
  <?php
}
  }
  else
  {
    $sql=mysqli_query($conn,"INSERT INTO shop(userName,password,shopName,shopCategory,shopOpen,shopClose,timePerCustomer,country,city,shopAddress) 
VALUES('$user','$pass','$shop','$type','$open','$close','$estimate','$country','$city','$address')");
if($sql)
{
  ?>
<script>
  window.alert("Shop Registered");
  window.location.href= 'index.php';
</script>
  <?php
  }
}
}
}
else if(isset($_POST['login']))
{
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $sql1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM shop WHERE userName='$user'"));
  $sql2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM shop WHERE password='$pass' && userName='$user'"));
  if($sql1 >= 1)
  {
    if($sql2 >= 1)
    {
      $_SESSION['user']=$user;
      ?>
      <script>
       window.location.href= 'form.php';
      </script>
        <?php
    }
    else
    {
      ?>
      <script>
        window.alert("Wrong Password!");
        window.location.href= 'index.php';
      </script>
        <?php
    }
    
  }
  else
  {
    ?>
    <script>
      window.alert("<?php echo $user; ?> User Not Exist!");
      window.location.href= 'index.php';
    </script>
      <?php
  }

}
?>