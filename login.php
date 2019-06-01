<?php
 session_start();
$run = '';

$olddate = date("Y/m/d",strtotime("-1 days"));
include_once('./dbcon.php');
  // date("Y/m/d",strtotime("-1 days"));

$c = "SELECT * FROM employee Where employee_id Not IN (select employee_id from timesheet WHERE date = '$olddate')";
$run = mysqli_query($con,$c);
// print_r($c);
//exit();

while($data1 = mysqli_fetch_assoc($run)) {
  // print_r($data1) ;
  $tempid=$data1['employee_id'];
  // echo $tempid;
   $d = "INSERT INTO timesheet (`employee_id`,`date`,`time_in`,`time_out`,`status`) VALUES ('$tempid','$olddate','00:00:00','00:00:00','absent')";
       //echo $d; exit();
       $tempinsert = mysqli_query($con,$d);
       // $last_id = mysqli_insert_id($run);

     //  $_SESSION['Timesheet_ID'] = $last_id;
     }
// exit();
$employee_id = "";
$date = "";
$time_in = "";

		if(isset ($_POST['Login'])) {
		$email_id = $_POST['email_id'];
		$password = md5($_POST['password']);
    
		if(isset($_POST["Registration"]))
	 {
		  header('Location: ./registration.php');
}
    //print_r($_POST);exit();
    if(isset($_POST['check_me_out'])) {
      
        $qry = "SELECT * FROM admin WHERE email_id = '$email_id' AND password = '$password'";
   
        $run = mysqli_query($con,$qry);
        $row = mysqli_num_rows($run);

    
          $data=mysqli_fetch_assoc($run);

    if ($data['designation'] == 'admin') {
         
        $_SESSION['id'] = $data;
        $_SESSION['designation'] = $data['designation'];
        $_SESSION['UserName'] = $data['firstname'].' '.$data['lastname'];

        $employee_id=$data['id'];
        $date =date("Y/m/d");
// $time_in =date("H:i:s", time());
      date_default_timezone_set('Asia/Calcutta'); 
       $time_in = date("H:i:s", time()); 
      

        $a = "INSERT INTO timesheet (`employee_id`,`date`,`time_in`,`status`) VALUES ('$employee_id','$date','$time_in','present')";
      //echo $a; exit();
      $run = mysqli_query($con,$a);
      $last_id = mysqli_insert_id($con);
      $_SESSION['Timesheet_ID']=$last_id;
      unset($_SESSION['employee_id']);
      //echo 'id'; exit();
          //print_r($_SESSION);
         // exit();
          header('Location: ./home.php');
          } else { ?>
        <script>
          window. alert("wrong email_id or password");
        </script>
        <?php
      }
   
      } else {




           $qry1="SELECT * FROM employee WHERE email_id = '$email_id' AND password = '$password'";

    $run1=mysqli_query($con,$qry1);
  //  $row1 = mysqli_num_rows($run1);
    $data1=mysqli_fetch_assoc($run1);
if ( $data1 != "") {
          $_SESSION['employee_id'] = $data1;
            $_SESSION['designation'] = $data1['designation'];
             $_SESSION['UserName'] = $data1['firstname'].' '.$data1['lastname'];
             $employee_id=$data1['employee_id'];
              $date =date("Y/m/d");

               date_default_timezone_set('Asia/Calcutta'); 
       $time_in = date("H:i:s", time()); 
      

      $b = "INSERT INTO timesheet (`employee_id`,`date`,`time_in`,`status`) VALUES ('$employee_id','$date','$time_in','present')";
     // echo $b; exit();
      $run = mysqli_query($con,$b);
      $last_id = mysqli_insert_id($con);
      $_SESSION['Timesheet_ID'] = $last_id;

           unset($_SESSION['id']);
          //echo 'employee_id'; exit();
           //print_r($_SESSION);
           //exit();
          header('Location: ./home.php');

       }    
      else { ?>
        <script>
          window. alert("wrong email_id or password");
        </script>
        <?php
      }
    }
  }  
// 	elseif ($_SESSION['id']  != "login" & $_SESSION['employee_id'] != "login") {
//    $a = "INSERT INTO timesheet (`employee_id`,`date`,`time_in`,`status`) VALUES ('$employee_id','$date','$time_in','absent')";
      
//       $run = mysqli_query($con,$a);
//       $last_id = mysqli_insert_id($con);
//       $_SESSION['Timesheet_ID']=$last_id;
// }


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
  <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Davstree IT Services Private Limited</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="">Home</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
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
              <h3 class="box-title"> Log In </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="myform" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail"> Email Id </label>
                  <input type="email" name="email_id" class="form-control" id="exampleInputEmail" placeholder="Enter email" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword"> Password </label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required="required">
                </div>
                <div class="checkbox">
                  <label>
                    <input type = "checkbox" name = "check_me_out" class = "checkbox" id = "exampleInputCheck_me_out" value = "Check me out"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" align="right">
                <input type="submit" name="Login" class="btn btn-primary" value="Login">
             
              
              <p align = "left">
                  Forgot Password? <a href="forgot-password.php">Change</a>
              </p>
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