 <?php
include('./header.php');
include_once('./dbcon.php');
global $con;
//session_start();

error_reporting(0);
if(!$_SESSION['login'] == 0)
    {   
@header('location:login.php');
}


 if (isset($_SESSION['employee_id'])) {
  $employee_id = $_SESSION['employee_id']['employee_id'];
}
$query = "SELECT * FROM `timesheet` WHERE employee_id = '".$employee_id."'";


//echo $query; exit();
$run = mysqli_query($con,$query); 

if($run == TRUE) {
  ?>

   <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

 
          
  <div class="content-wrapper" align = "center">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="color:blue">
       <b>Devstree It Services Pvt,Ltd.</b>
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
     <section class="content">
      <div class="row">
        <div class="col-xs-15">
          <div class="box">
            <div class="box-header" align = "center">
              <h3 class="box-title"><b><u>Attendance Detail</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform" id = "" action="" method="post" enctype="multipart/form-data">

              <table id="example4" class="table table-bordered table-striped">
                <thead style = 'background: #395870'>

                  
    <tr style="color:white;">
      <th></th>
      <th>Employee Id</th>
      <th>Date</th>
      <th>Day</th>
      <th>Time In</th>
      <th>Time out</th>
      <th>Working Hour</th>
      <th>Status</th>
      <th>Edit</th>
      

<tbody>
  <?php
 while ($data = mysqli_fetch_assoc($run)){
  
  $minutes = 0;
   $from       = $data['time_in'];
$to         =  $data['time_out'];

$total      = strtotime($to) - strtotime($from);
$hours      = floor($total / 60 / 60);
$minutes    = round(($total - ($hours * 60 * 60)) / 60);

$timestamp = strtotime($data['date']);

$day = date('l', $timestamp);
  ?>  
<tr align="center">

  <td><input type = "hidden" value = "<?php echo $data['id']; ?>">
    
  <td><?php echo $data['employee_id']; ?></td>
  <td><?php echo $data['date']; ?></td>
  <td><?php echo $day;?></td>
  <td><?php echo $data['time_in']; ?></td>
  <td><?php echo $data['time_out']; ?></td>
  <td><?php echo $hours; ?></td>
  <td><?php echo $data['status']; ?></td>
  
  <td>
     <a href="?id=<?php echo $data['employee_id'];?>"><i class="fa fa-pencil"></i></a> 
    <!-- <input type = "submit" name = "submit" id = "myforms" class = "btn btn-success col-lg" value="Edit" /> --></td>
</tr>



<?php

  }

}
?>
  </tbody>
</table>
<?php
 include('./footer.php');


       ?>