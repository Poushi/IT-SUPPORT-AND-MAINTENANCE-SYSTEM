<?php
define('TITLE','Password');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
$rEmail = $_SESSION['rEmail'];
}

else{

echo "<script> location.href='RequesterLogin.php'</script>";

}
$rEmail = $_SESSION['rEmail'];

if(isset($_REQUEST['passupdate'])){

if($_REQUEST['rPassword']==""){


$passmsg='<div class="alert alert-warning col-sm-6  ml-5 mt-2">Fill up the Change password field</div>';

}

else{
  $rPass=$_REQUEST['rPassword'];

  $sql = "update requesterlogin_tb set r_password='$rPass'where r_email='$rEmail'";
  
  if($conn->query($sql)==TRUE){
  
    $passmsg='<div class="alert alert-warning col-sm-6  ml-5 mt-2">Password Updated Succesfully</div>';
  
  
  
  }
  else{
  
    $passmsg='<div class="alert alert-warning col-sm-6  ml-5 mt-2">Unable to  the Change password field</div>';
  
  }

}



}





?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
 <?php  echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
 <!-- Top Navbar -->
 <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">ISMS</a>
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 " style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link" href="RequesterProfile.php">
        <i class="fas fa-user"></i>
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="SubmitRequest.php">
        <i class="fab fa-accessible-icon"></i>
        Submit Request
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="CheckStatus.php">
        <i class="fas fa-align-center"></i>
        Service Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  " href="Requesterchangepass.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>



<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5" method="POST">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" value="<?php  echo $rEmail ;?> " readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-primary mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        
      </form>

      <?php if(isset($passmsg)){echo $passmsg;}?>

    </div>

  </div>
</div>
</div>
</div>

<!-- Boostrap JavaScript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>

</html>