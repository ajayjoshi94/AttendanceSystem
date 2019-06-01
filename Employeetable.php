 <?php

 include('./header.php');
include_once('./dbcon.php');
  global $con;

if(isset($_GET["employee_id"]))
{
echo $employee_id = $_GET["employee_id"];
}

$query1 = "SELECT * FROM `employee`";
//echo $query1; exit();
$run2 = mysqli_query($con,$query1);
if($run2 == TRUE) {
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
              <h3 class="box-title"><b><u>Employees Detail</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform1" id = "myform1" class = "myforms" action="" method="post" enctype="multipart/form-data">

              <table id="example3" class="table table-bordered table-striped">
                <thead>

                  
    <tr>
      <th></th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Department</th>
      <th>Email Id</th>
      <th>Password</th>
      <th>Address</th>
      <th>Phone No</th>
      <th>Hire Date</th>
      <th>Designation</th>
      <th>Gender</th>
      <th>Birth Date</th>
      <th>Salary</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
<tbody id="mytable">
    <?php

    
while($data2 = mysqli_fetch_assoc($run2)) {
  //print_r($data2);
?>



<tr align="center">

  <td><input type = "hidden" value = "<?php echo $data2['employee_id']; ?>">
    <input type="checkbox" name="checkbox" value="checkbox"></td>
  <td><?php echo $data2['firstname']; ?></td>
  <td><?php echo $data2['lastname']; ?></td>
  <td><?php echo $data2['department']; ?></td>
  <td><?php echo $data2['email_id']; ?></td>
  <td><?php echo $data2 ['password']; ?></td>
  <td><?php echo $data2['address']; ?></td>
  <td><?php echo $data2['phone_no']; ?></td>
  <td><?php echo $data2['hire_date']; ?></td>
  <td><?php echo $data2['designation']; ?></td>
  <td><?php echo $data2['gender']; ?></td>
  <td><?php echo $data2['birth_date']; ?></td>
  <td><?php echo $data2['salary']; ?></td>
  <td><?php echo $data2['status']; ?></td>
  <td>
     <a href="update.php?employee_id=<?php echo $data2['employee_id'];?>"><i class="fa fa-pencil"></i></a> 
    <!-- <input type = "submit" name = "submit" id = "myforms" class = "btn btn-success col-lg" value="Edit" /> --></td>
    <td>
      <a href="delete.php?employee_id=<?php echo $data2['employee_id'];?>"><i class="fa fa-trash"></i></a> 
    </td>
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

</div>
</div>
</div>
</div>
</section>
</div>
</body>
</html>