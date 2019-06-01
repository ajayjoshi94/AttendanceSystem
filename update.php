<?php

//include('./header.php');
include_once('./dbcon.php');
$id = '';
$employee_id = "";
$department = "";
$email_id = "";
$password = "";
$address = "";
$phone_no = "";
$designation = "";
$salary = "";
$status = "";
$date = "";
$time_in = "";
$time_out = "";
$working_hour = "";


  if(isset($_POST['submit']))
  {
    //print_r($_POST);exit();
if(isset($_POST["id"])){
 $id = $_POST["id"];
}
if(isset($_POST["employee_id"])){
 $id = $_POST["employee_id"];
}
if(isset($_POST["employee_id"])){
 $employee_id = $_POST["employee_id"];
}
  if(isset($_POST['department']))
  {
     $department = $_POST['department'];
 }
   
  if(isset($_POST['email_id']))
  {
      $email_id = $_POST['email_id'];
 }

  if(isset($_POST['password']))
  {
      $password = $_POST['password'];
 }

  if(isset($_POST['address']))
  {
      $address = $_POST['address'];
 }
  
   if(isset($_POST['phone_no']))
  {
      $phone_no = $_POST['phone_no'];
 }

  if(isset($_POST['designation']))
  {
      $designation = $_POST['designation'];
 }

  if(isset($_POST['salary']))
  {
      $salary = $_POST['salary'];
 }

  if(isset($_POST['status']))
  {
      $status = $_POST['status'];
 }

            
            $query = "UPDATE admin SET email_id ='$email_id',password = '$password',designation = '$designation',status = '$status' WHERE id = '".$id."'";
                $data = mysqli_query($con,$query);
               //echo $query; exit();
             
                $qry = "UPDATE employee SET department = '$department',email_id = '$email_id',password = '$password',address = '$address',phone_no = '$phone_no',designation = '$designation',salary = '$salary',status = '$status' WHERE employee_id = '".$employee_id."'";
                $data1 = mysqli_query($con,$qry);
                  //echo $qry; exit();

       /*if ($data && $data1) {
              echo "update successfully";
       
    } else {
    echo "update unsuccessfully";
    } */
   //include('./footer.php');
  }



if(isset($_GET["employee_id"]))
{ 

   $employee_id = $_GET["employee_id"];
  
}
if(isset($_POST["employee_id"])){
 $id = $_POST["employee_id"];
}

$a = "SELECT * FROM `employee` WHERE employee_id = ".$employee_id;
//echo $a; exit();
$run = mysqli_query($con,$a);
$row = @mysqli_num_rows($run);
 
$data2 = @mysqli_fetch_assoc($run);

if(isset($_POST['update'])){
  $employee_id = $_POST['employee_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $department = $_POST['department'];
  $email_id = $_POST['email_id'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $phone_no = $_POST['phone_no'];
  $hire_date = $_POST['hire_date'];
  $designation = $_POST['designation'];
  $gender = $_POST['gender'];
  $birth_date = $_POST['birth_date'];
  $salary = $_POST['salary'];
  $status = $_POST['status'];
   
  
    
    $b = "UPDATE admin SET firstname = '$firstname',lastname = '$lastname',email_id ='$email_id',password = '$password',designation = '$designation',status = '$status' WHERE id = '".$id."'";
                $data3 = mysqli_query($con,$b);
               //echo $query; exit();
             
                $c = "UPDATE employee SET firstname = '$firstname',lastname = '$lastname',department = '$department',email_id = '$email_id',password = '$password',address = '$address',phone_no = '$phone_no',hire_date = '$hire_date',designation = '$designation',gender = '$gender',birth_date = '$birth_date',salary = '$salary',status = '$status' WHERE employee_id = '".$employee_id."'";
                $data4 = mysqli_query($con,$c);

  } 
 
?>
<?php 
include('./header.php'); ?> 
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
  
  
<form action="" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="employee_id" value = "<?php echo $data2['employee_id']; ?>" />
                    

                    
                     <lable class="col-sm-2 control-label">First Name</lable>
                     <div class="col-sm-10">
                     <input type="text" name="firstname" class="form-control" value = "<?php echo $data2['firstname']; ?>"></div>
                     <br><br>

                   
                   
                      <lable class="col-sm-2 control-label">Last Name</lable>
                      <div class="col-sm-10">
                      <input type="text" name="lastname" class="form-control" value = "<?php echo $data2['lastname']; ?>">
                    </div>
                    <br><br>

                      
                      <lable class="col-sm-2 control-label">Department</lable>
                      <div class="col-sm-10">
                      <input type="text" name="department" class="form-control" value = "<?php echo $data2['department']; ?>">
                    </div>
                    <br><br>

                      
                      <lable class="col-sm-2 control-label">Email Id</lable>
                      <div class="col-sm-10">
                      <input type="text" name="email_id" class="form-control" value = "<?php echo $data2['email_id']; ?>">
                    </div>
                    <br><br>

                   
                      <lable class="col-sm-2 control-label">Password</lable>
                      <div class="col-sm-10">
                      <input type="text" name="password" class="form-control" value = "<?php echo $data2['password']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Address</lable>
                      <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" value = "<?php echo $data2['address']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Phone Number</lable>
                      <div class="col-sm-10">
                      <input type="text" name="phone_no" class="form-control" value = "<?php echo $data2['phone_no']; ?>">
                    </div>
                    <br><br>

                   
                      <lable class="col-sm-2 control-label">Hire Date</lable>
                      <div class="col-sm-10">
                      <input type="date" name="hire_date" class="form-control" value = "<?php echo $data2['hire_date']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Designation</lable>
                      <div class="col-sm-10">
                      <input type="text" name="designation" class="form-control" value = "<?php echo $data2['designation']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Gender</lable>
                      <div class="col-sm-10">
                      <input type="text" name="gender" class="form-control" value = "<?php echo $data2['gender']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Birth Date</lable>
                      <div class="col-sm-10">
                      <input type="date" name="birth_date" class="form-control" value = "<?php echo $data2['birth_date']; ?>">
                    </div>
                    <br><br>

                    
                      <lable class="col-sm-2 control-label">Salary</lable>
                      <div class="col-sm-10">
                      <input type="text" name="salary" class="form-control" value = "<?php echo $data2['salary']; ?>">
                    </div>
                    <br><br>

                    
                       <lable class="col-sm-2 control-label">Status</lable>
                       <div class="col-sm-10">
                       <input type="text" name="status" class="form-control" value = "<?php echo $data2['status']; ?>">
                      </div>
                      <br><br>

                      <div class="row-sm-12">
                      <div class="col-sm-4">
                       <input type="submit" name="update" class = "btn btn-success col-lg" value="update">
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
   <?php include('./footer.php'); ?>
