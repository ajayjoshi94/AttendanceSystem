<?php
session_start();
error_reporting(0);
include('./header.php');
include_once('./dbcon.php');
global $con;

if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}

if(isset($_GET["id"]))
{
 $id = $_GET["id"];
}

$a = "SELECT * FROM `communication` WHERE is_approved = 'Rejected'";
//echo $query1; exit();
$run = mysqli_query($con,$a);
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
     <section class="content">
      <div class="row">
        <div class="col-xs-15">
          <div class="box">
            <div class="box-header" align = "center">
              <h3 class="box-title"><b><u>Leaves Detail</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform1" id = "myform1" class = "myforms" action="" method="post" enctype="multipart/form-data">

              <table id="example6" class="table table-bordered table-striped">
                <thead style = 'background: #395870'>

                  
    <tr style="color:white;">
      <th></th>
      <th>Employee Id</th>
      <th>Type</th>
      <th>From Date</th>
      <th>To Date</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Department</th>
      <th>Massage</th>
      <th>Created Date</th>
      <th>Status</th>
      <th>Updated Date</th>
    </tr>
    </thead>
<tbody>
    <?php

    
while($data = mysqli_fetch_assoc($run)) {
  //print_r($data2);
?>      




<tr align="center">

  <td><input type = "hidden" name="id" value = "<?php echo $data['id']; ?>"></td>
  <td><?php echo $data['employee_id']; ?></td>
  <td><?php echo $data['type']; ?></td>
  <td><?php echo $data['from_date']; ?></td>
  <td><?php echo $data['to_date']; ?></td>
  <td><?php echo $data['firstname']; ?></td>
  <td><?php echo $data['lastname']; ?></td>
  <td><?php echo $data['department']; ?></td>
  <td><?php echo $data['massage']; ?></td>
  <td><?php echo $data['created_date']; ?></td>
  <td><?php echo $data['is_approved']; ?></td>
  <td><?php echo $data['updated_date']; ?></td>
<?php } ?>
                                        </tbody>
                                    </table>
                                 </form>
                            </div>
                         </div>
                     </div>
                </div>
            </section>
        </div>
    </body>
</html>
<?php } include('./footer.php'); ?>