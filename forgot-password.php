<?php
//include('./header.php');
include_once('./dbcon.php');
// Code for change password 
if(isset($_POST['change']))
    {
      
      $email_id =$_POST['email_id'];
      $password = md5($_POST['password']);


$a="UPDATE admin SET Password = '$password' WHERE email_id = '$email_id'";
$data = mysqli_query($con,$a);
//echo $a; exit();

$b="UPDATE employee SET Password = '$password' WHERE email_id = '$email_id'";
$data = mysqli_query($con,$b);

$msg="Your Password succesfully changed";

}


?>

<!DOCTYPE html>
<html leng = "en_US">
<head>
    <meta charset="UTF-8">
    <title>login.php</title>
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <style type="text/css">
    .content{
    background-color: #3c8dbc;
    height: 100%;
}
  </style>
</head>
<body>


    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="myform" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputPassword">Email id</label>
                  <input type="text" name="email_id" class="form-control" id="email_id" placeholder="Enter Email Id" required="required">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail">New Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required="required">
                </div>
                

              <div class="box-footer" align="right">
                <input type="submit" name="change" class="btn btn-primary" value="change">
              
        </div>
            </form>
          </div>
          <!-- /.box -->
          
        </div>
        <div class="col-md-4"></div>
        <!--/.col (left) -->
        <!-- right column -->
        
      </div>
      <!-- /.row -->
    </section></body>
</html>