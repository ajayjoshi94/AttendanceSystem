<?php
 //session_start();

  $id = 0;
  $run2 = '';
  include('./header.php');
  include_once('./dbcon.php');
  global $con;
$employee_id = 0;
 if (isset($_SESSION['id'])) {
  $id = $_SESSION['id']['id'];
  unset($_SESSION['employee_id']);

 // print_r($_SESSION);
 //  exit();
}
$query = "SELECT * FROM `admin` WHERE id = ".$id;
//$query = implode($id, '.');
//echo $query; exit();
    $run = mysqli_query($con,$query);

    $data = @mysqli_fetch_assoc($run);
//print_r($data);
//exit();
   if (!empty($data)) {
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<div class="content-wrapper" align = "center" align = "center">
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
      <div class="col-xs-20">
        <div class="box">
          <div class="box-header" align = "center">
            <h3 class="box-title"><b><u>Admin Detail</u></b></h3>
          </div>
            <!-- /.box-header -->
<div class="box-body">
  <form role="form" name="form" id = "form" class="myforms" action="update.php" method="post" enctype="multipart/form-data">
<div class="box-body">
  <div class="form-group">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tbody> 
     

<?php
/*$data2=@mysqli_fetch_assoc($run2);
  $employee_id=$employee_id['employee_id'];*/
               
                  
?>
                 

                  <p align = "right">
                    
                          <a href = "Employeetable.php?employee_id=<?php echo $employee_id;?> "class = "btn btn-primary" >EmployeeDetail</a>
                    </p>

  
                        
                        <input type="hidden" name="id" value = "<?php echo $data['id']; ?>" />

                      <lable class="col-sm-2 control-label">First Name</lable>
                      <div class="col-sm-10">
                      <input type="text" name="firstname" class="form-control" value = "<?php echo $data['firstname']; ?>">
                    </div>
                    <br><br>

                        <lable class="col-sm-2 control-label">Last Name</lable>
                        <div class="col-sm-10">
                        <input type="text" name="lastname" class="form-control" value = "<?php echo $data['lastname']; ?>">
                      </div>
                      <br><br>

                        <lable class="col-sm-2 control-label">Email Id</lable>
                        <div class="col-sm-10">
                        <input type="text" name="email_id" class="form-control" value = "<?php echo $data['email_id']; ?>">
                      </div>
                      <br><br>

                        <lable class="col-sm-2 control-label">Password</lable>
                        <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" value = "<?php echo $data['password']; ?>">
                      </div>
                      <br><br>

                      <lable class="col-sm-2 control-label">Designation</lable>
                      <div class="col-sm-10">
                      <input type="text" name="designation" class="form-control" value = "<?php echo $data['designation']; ?>">
                    </div>
                    <br><br>

                      <lable class="col-sm-2 control-label">Status</lable>
                      <div class="col-sm-10">
                      <input type="text" name="status" class="form-control" value = "<?php echo $data['status']; ?>">
                    </div>
                    <br><br>

                    <div class="row-sm-12">
                      <div class="col-sm-4">
                     <input type = "submit" name = "submit" id = "myforms" class = "btn btn-success col-lg" value="Edit" />
                      </div>

                      <div class="col-sm-4">
                      <a href = "viewtimesheet.php?id=<?php echo $id;?> "class = "btn btn-success col-lg" >View Attendance</a>
                      </div>
                    </div>
                    
                    </tbody>
                  </thead>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</body>
</html>



<?php

   } else {

     if (isset($_SESSION['employee_id'])) {
      
  $employee_id = $_SESSION['employee_id']['employee_id'];
  unset($_SESSION['id']);

}
    $qry = "SELECT * FROM `employee` WHERE employee_id = ".$employee_id; 
     
    $run1 = mysqli_query($con,$qry);
  $data1 = @mysqli_fetch_assoc($run1);
 
  if (!empty($data1)) {

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
    <div class="col-xs-20">
      <div class="box">
        <div class="box-header" align = "center">
          <h3 class="box-title"><b><u>Employee Detail</u></b></h3>
      </div>
            <!-- /.box-header -->

  <form role="form" name="myform" id = "myform" class="myforms" action="update.php" method="post" enctype="multipart/form-data">
<div class="box-body">
  <div class="form-group">
    <table id="example2" class="table table-bordered table-striped">
      <thead>
        <tbody> 
                        
                      
                     <input type="hidden" name="employee_id" value = "<?php echo $data1['employee_id']; ?>" />
                    

                    
                     <lable class="col-sm-2 control-label">First Name</lable>
                     <div class="col-sm-10">
                     <input type="text" name="firstname" class="form-control" value = "<?php echo $data1['firstname']; ?>"></div>
                     <br><br>

                   
                   
                      <lable class="col-sm-2 control-label">Last Name</lable>
                      <div class="col-sm-10">
                      <input type="text" name="lastname" class="form-control" value = "<?php echo $data1['lastname']; ?>">
                    </div>
                    <br><br>

                      
                      <lable class="col-sm-2 control-label">Department</lable>
                      <div class="col-sm-10">
                      <input type="text" name="department" class="form-control" value = "<?php echo $data1['department']; ?>">
                    </div>
                    <br><br>

                      
                      <lable class="col-sm-2 control-label">Email Id</lable>
                      <div class="col-sm-10">
                      <input type="text" name="email_id" class="form-control" value = "<?php echo $data1['email_id']; ?>">
                    </div>
                    <br><br>

                   
                      <lable class="col-sm-2 control-label">Password</lable>
                      <div class="col-sm-10">
                      <input type="text" name="password" class="form-control" value = "<?php echo $data1['password']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Address</lable>
                      <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" value = "<?php echo $data1['address']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Phone Number</lable>
                      <div class="col-sm-10">
                      <input type="text" name="phone_no" class="form-control" value = "<?php echo $data1['phone_no']; ?>">
                    </div>
                    <br><br>

                   
                      <lable class="col-sm-2 control-label">Hire Date</lable>
                      <div class="col-sm-10">
                      <input type="date" name="hire_date" class="form-control" value = "<?php echo $data1['hire_date']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Designation</lable>
                      <div class="col-sm-10">
                      <input type="text" name="designation" class="form-control" value = "<?php echo $data1['designation']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Gender</lable>
                      <div class="col-sm-10">
                      <input type="text" name="gender" class="form-control" value = "<?php echo $data1['gender']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Birth Date</lable>
                      <div class="col-sm-10">
                      <input type="date" name="birth_date" class="form-control" value = "<?php echo $data1['birth_date']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Salary</lable>
                      <div class="col-sm-10">
                      <input type="text" name="salary" class="form-control" value = "<?php echo $data1['salary']; ?>">
                    </div>
                    <br><br>

                    
                       <lable class="col-sm-2 control-label">Status</lable>
                       <div class="col-sm-10">
                       <input type="text" name="status" class="form-control" value = "<?php echo $data1['status']; ?>">
                      </div>
                      <br><br>

                       <div class="row-sm-12">
                      <div class="col-sm-4">
                      <input type = "submit" name = "submit" id = "myforms" class = "btn btn-success col-lg" value="Edit" />
                    </div>
                     
                    </div>
                    <br><br>

                    
                    
                    
                    
        
          

         
<?php
      }
    }


include('./footer.php');
?>
                    </tbody>
                  </thead>
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
 
</section>

  
  