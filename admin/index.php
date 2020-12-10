<?php
session_start();
include "../conn.php";
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
                <a class="nav-link btn btn-sm  " href="#" data-toggle="modal" data-target="#exampleModal1"
                  ><span class=""> Admin Log In</span></a>
              </li>
             
            </ul>
          </div>
        </nav>
      </div>
      <div class="col-12">
        <div class="row">
          <div
            id="demo"
            class="carousel slide my-carousol"
            data-ride="carousel"
          >
            <!-- <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul> -->
            <div class="carousel-inner">
              <div class="carousel-item ">
                <img
                  src="img/strip.png"
                  alt="Los Angeles"
                  width="100%"
                  height="500"
                />
                <div class="carousel-caption"></div>
              </div>
              <div class="carousel-item active">
                <img
                  src="img/strip.png"
                  alt="Chicago"
                  width="100%"
                  height="500"
                />
                <div class="carousel-caption "></div>
              </div>
              <div class="carousel-item">
                <img
                  src="img/strip.png"
                  alt="New York"
                  width="100%"
                  height="500"
                />
                <div class="carousel-caption">
                  
                </div>
              </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a> -->
          </div>
        </div>
      </div>

      <div class="col-md-6 offset-md-3 hhh" >
    <div class="col-12 " >
   <center>
   <h1 style="color:white;">Respect Social Distancing</h1>
   </center>
    <form> 
    <div class="input-group mb-3">
       
  
    <div class="input-group-prepend">
    <span class="input-group-text" id=""><span class="fa fa-map-marker"></span></span>
  </div>
  <input type="text" class="form-control col-3" placeholder="Nearby shops ">
  <input type="text" class="form-control" placeholder="Search For Shops">


      </div>
      <section class="header-categories text-center">
				
				<a href="#" class="header-category" >MALL</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >BANK</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >CLINIC</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >TEMPLE</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >KIRANA</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >LIQOUR</a><span class="devider">|</span>
				
				<a href="#" class="header-category" >OTHER</a>
				
			</section>
    </form>
    </div>
</div>







    </header>

   

    <script data-ad-client="ca-pub-8516631958588162" async
src=“https://pagead2.googlesyndication.com/pagead/js/
adsbygoogle.js"></script>


    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="Shop Name" placeholder="Shop Name" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Category <span style="color: red;">*</span></label>
            <select class="form-control" required>
              <option class="disable" >Select Shop Category</option>
              <option value="">Mall</option>
              <option value="">Bank</option>
              <option value="">Clinic</option>
              <option value="">Temple</option>
              <option value="">Kirana</option>
              <option value="">Liqour</option>
              <option value="">Other</option>
              
            </select>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Shop Timmings <span style="color: red;">*</span></label>
                <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
              </div>
              <div class="form-group col-md-6 col-sm-12">
                <label for="">Estimated Time Per Customer<span style="color: red;">*</span></label>
                <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
              </div>
              <div class="form-group col-12">
                <label for="exampleFormControlTextarea1">Shop Address <span style="color: red;">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Shop Address " rows="3" required></textarea>
              </div>
              <div class="form-group ml-2">
                <label for="exampleFormControlFile1">Shop Image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>
            

          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
            <input type="submit" value="Save" class="btn btn-primary"> 
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
  </body>
</html>
<?php
if(isset($_POST['login']))
{
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $sql1=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin WHERE username='$user'"));
  $sql2=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin WHERE password='$pass' && username='$user'"));
  if($sql1 >= 1)
  {
    if($sql2 >= 1)
    {
      $_SESSION['username']=$user;
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
      window.alert("<?php echo $user; ?> Admin Not Exist!");
      window.location.href= 'index.php';
    </script>
      <?php
  }

}
?>