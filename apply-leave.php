<?php
//session_start();

include('./header.php');
include_once('./dbcon.php');
global $con;



if (isset($_SESSION['employee_id'])) {
  $employee_id = $_SESSION['employee_id']['employee_id'];
}
$query = "SELECT * FROM `employee` WHERE employee_id = '".$employee_id."'";


//echo $query; exit();
$run = mysqli_query($con,$query); 
$data = mysqli_fetch_assoc($run);

if(isset($_POST['apply']))
{
 //print_r($_POST['apply']);

$type = $_POST['type'];
$from_date = $_POST['from_date'];  
$to_date = $_POST['to_date'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department = $_POST['department'];
$massage = $_POST['massage'];

if($from_date > $to_date){
                 $error = " ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO communication (employee_id,type,from_date,to_date,firstname,lastname,department,massage) VALUES('$employee_id','$type','$from_date','$to_date','$firstname','$lastname','$department','$massage')";

$run = mysqli_query($con,$sql);
//echo $sql; exit();
}
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
              <h3 class="box-title"><b><u>Apply: Leave/Query</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform" id = "" action="" method="post" enctype="multipart/form-data">

              <table id="example3" class="table table-bordered table-striped">
                
                 <lable class="col-sm-2 control-label">Employee Id</lable>
                      <div class="col-sm-10">
                      <input type="text" name="employee_id" class="form-control" value = "<?php echo $data['employee_id']; ?>">
                    </div>
                    <br><br>

                        <lable class="col-sm-2 control-label">Type</lable>
                        <div class="col-sm-10">
                        <select  name="type" class="form-control" required="required">
                        <option value="">Select type...</option>
                        <option value="leave">Leave</option>
                        <option value="query">Query</option>
                    </select>
                      </div>
                      <br><br>
                      
                        <lable class="col-sm-2 control-label">From Date</lable>
                        <div class="col-sm-10">
                        <input type="date" name="from_date" class="form-control" required="required">
                      </div>
                      <br><br>

                        <lable class="col-sm-2 co+sntrol-label">To Date</lable>
                        <div class="col-sm-10">
                        <input type="date" name="to_date" class="form-control" required="required">
                      </div>
                      <br><br>
                    
                      <lable class="col-sm-2 control-label">First Name</lable>
                      <div class="col-sm-10">
                      <input type="text" name="firstname" class="form-control" required="required">
                    </div>
                    <br><br>

                      <lable class="col-sm-2 control-label">Last Name</lable>
                      <div class="col-sm-10">
                      <input type="text" name="lastname" class="form-control" required="required">
                    </div>
                    <br><br>

                    <lable class="col-sm-2 control-label">Department</lable>
                      <div class="col-sm-10">
                      <input type="text" name="department" class="form-control" required="required">
                    </div>
                    <br><br>

                    <lable class="col-sm-2 control-label">Massage</lable>
                      <div class="col-sm-10">
                      <textarea id="" name="massage" class="form-control" length="500" required></textarea>
                    </div>
                    <br><br>

                    <div class="row-sm-12">
                      <div class="col-sm-4">
                     <input type="submit" name="apply" id="apply" class="btn btn-primary" value = "Apply">
                 </div>
             </div>
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
<?php include('./footer.php'); ?>