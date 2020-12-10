<?php
session_start();
include "../conn.php";
if(isset($_SESSION['username']))
{
    $id=$_GET['status'];
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM shop WHERE id='$id'"));
    $img=$sql['shopImage'];
    $sql1=mysqli_query($conn,"DELETE FROM shop WHERE id='$id'");
    if($sql1)
    {
        if($img)
    {
    $path="../shops/".$img;
    unlink($path);
    }
        ?>
        <script>
            window.alert('Shop Deleted');
          window.location.href= 'form.php';
        </script>
          <?php
    }
    else
    {
        ?>
        <script>
            window.alert('Shop Not Deleted! \n Try Again');
          window.location.href= 'form.php';
        </script>
          <?php
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