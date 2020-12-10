<?php
session_start();
include "conn.php";
if(isset($_SESSION['user']))
{
    $token=$_GET['status'];
    $sql=mysqli_query($conn,"DELETE FROM token WHERE tokenNumber='$token'");
    if($sql)
    { ?>
    <script>
        window.alert("Customer Deleted");
        window.location.href= 'form.php';
        </script>
    <?php
    }
    else
    {
        ?>
        <script>
            window.alert("Customer Not Deleted");
            window.location.href= 'form.php';
            </script>
        <?php
    }


}
else{
  ?>
<script>
    window.location.href= 'index.php';
</script>
  <?php
}
?>