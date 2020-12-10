<?php
session_start();
include "../conn.php";
if(isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>queuemein</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="img//favicon.png">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>.contact-form1{
    -webkit-box-shadow: 0px 0px 15px 0px rgba(22, 133, 244, 0.3);
    box-shadow: 0px 0px 15px 0px rgba(22, 133, 244, 0.3);
    border-radius: 10px;
    padding: 52px 30px 60px;
    background-color: white;
    height: 500px;
    overflow-y:scroll;
    
}

footer{
     margin-top: 1%; 
    color:white;

}
body{
    background: rgb(128,216,217);
  background: linear-gradient(0deg, rgba(128,216,217,0.8155637254901961) 0%, rgba(0,172,238,1) 100%);
}

</style>


</head>
<body >
    <div class="container-fluid nav-wapper">
        <nav class="navbar  navbar-expand-lg nav mx-3">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo1.png" alt="" height="80px" />
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
           
               <h2 class="text-white text-center">Welcome to Admin Panel</h2>
             
             
               <a href="logout.php" class="btn btn-danger ml-auto">Logout</a>
             
            
          </div>
        </nav>
      </div>

</div>


<div class="container">
  <div class="row my-3">
    <div class="col-md-10 col-sm-10 col-xs-10">
      <h3 class="text-center text-white mb-4">Shops List</h3>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal"
      ><span class="text-white"> Register Shop</span></a>
    </div>
    
  </div>
</div>
<div class="container">
<div class="row">
  <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
<table id="tableid" class="table table-striped table-bordered table-hover table-light">
  <thead>
<tr>
   <th class="text-center">Sr. No.</th>
   <th class="text-center">Shop Name</th>
   <th class="text-center">Delete</th>

</tr>
</thead>
<tbody>
  <?php
  $counter=0;
  $sql=mysqli_query($conn,"SELECT * FROM shop");
  foreach($sql as $row)
{
  $id=$row['id'];
  $counter++;
  ?>
<tr>
    <td class="text-center"><?php echo $counter; ?></td>
    <td class="text-center"><?php echo $row['shopName']; ?></td>
  
    <td class="text-center"><a href="delshop.php?status=<?php echo $id; ?>" class="btn btn-sm btn-danger "><span class="fa fa-trash"></span></a></td>
</tr>
<?php
}
?>


</tbody>
</table>
</div>
</div>
</div>















<footer><center>&copy; Copy Right reserved</center>
</footer>
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
              <label for="">User Name <span style="color: red;">*</span></label>
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
   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>

      $(document).ready(function() {
          $('#tableid').DataTable();
      } );
      
      </script>
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
  $des="../shops/".$img;
  $upload=move_uploaded_file($tmp,$des); 
  $counter=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM shop WHERE userName='$user'"));
  if($counter > 0)
  {
    ?>
    <script>
      window.alert("<?php echo $user; ?> User Name Already Exist! \n Try Another!");
      window.location.href= 'form.php';
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
  window.location.href= 'form.php';
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
  window.location.href= 'form.php';
</script>
  <?php
  }
}
}
}


}
else
{
  ?>
      <script>
        window.location.href= 'index.php';
      </script>
        <?php
}
?>