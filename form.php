<?php
session_start();
include "conn.php";
if(isset($_SESSION['user']))
{
  $user=$_SESSION['user'];
  $query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE userName='$user'"));
  $id=$query['id'];
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
  background-attachment: fixed;
}

</style>


</head>
<body>
    <div class="container-fluid nav-wapper">
        <nav class="navbar  navbar-expand-lg nav mx-3">
          <a class="navbar-brand" href="index.html">
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
          <h2 class="text-white text-center">Welcome to Shop Owner Panel</h2>
             
             
             <a href="logout.php" class="btn btn-danger ml-auto">Logout</a>
          </div>
        </nav>
      </div>


      <h3 class="text-center text-white my-3">Customers List</h3>
<div class="container">
<div class="row">

  <div class="table-responsive-xs table-responsive-sm table-responsive-md container">

  <table id="tableid" class="table table-striped table-bordered table-hover table-light">
    <thead>
<tr>
    <th class="text-center">Sr. No.</th>
    <th class="text-center">Customer Name</th>
    <th class="text-center">Customer Phone No.</th>
    <th class="text-center">Customer Slot</th>
    <th class="text-center">Token No</th>
    <th class="text-center">Delete</th>
</tr>
</thead>
<tbody>
  <?php
  $date=date('Y-m-d');
  $sql=mysqli_query($conn,"SELECT * FROM token WHERE shop='$id' && validDate='$date'");
  $counter=0;
  foreach($sql as $row)
  {
    $counter++;
  ?>
<tr>
    <td class="text-center"><?php echo $counter; ?></td>
    <td class="text-center"><?php echo $row['nameCustomer']; ?></td>
    <td class="text-center"><?php echo $row['phoneCustomer']; ?></td>
    <?php
    $slot=$row['time'];
 $sql1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE id='$id'"));
 $timeCustomer=$sql1['timePerCustomer'];
 $endTime = strtotime("+$timeCustomer minutes", strtotime($slot));
    ?>
    <td class="text-center"><?php echo $slot; ?> - <?php echo  date('h:i', $endTime); ?></td>
    <td class="text-center"><?php echo $row['tokenNumber']; ?></td>
    <td class="text-center"><a href="delcustomer.php?status=<?php echo $row['tokenNumber']; ?>" class="btn btn-sm btn-danger "><span class="fa fa-trash"></span></a></td>
</tr>
  <?php } ?>



</tbody>
</table>






</div>



















</div>

</div>



<footer><center>&copy; Copy Right reserved</center></footer>
















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
}
else{
  ?>
<script>
    window.location.href= 'index.php';
</script>
  <?php
}
?>