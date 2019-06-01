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

$a = "SELECT * FROM `communication`";
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
              <h3 class="box-title"><b><u>Querys Detail</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform1" id = "myform1" class = "myforms" class="request" action="" method="post" enctype="multipart/form-data">

              <table id="example6" class="table table-bordered table-striped">
                <thead style = 'background: #395870'>

                  
    <tr style="color:white;">
      <th></th>
      <th>Employee Id</th>
      <th>Type</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Department</th>
      <th class="text-center">Massage</th>
      <th>Created Date</th>
      <th colspan="2">Action</th>
    </tr>
    </thead>
<tbody id="querys-lists">
   <?php 
    

while($data = mysqli_fetch_assoc($run)) {
  if ($data['type'] == 'query') {
  if($data['is_resolved'] != "solved" & $data['is_resolved'] != "Resolved"){
  ?>
  <tr align="center">
  <td><input type = "hidden" name="id" value = "<?php echo $data['id']; ?>"></td>
  <td><?php echo $data['employee_id']; ?></td>
  <td><?php echo $data['type']; ?></td>
  <td><?php echo $data['firstname']; ?></td>
  <td><?php echo $data['lastname']; ?></td>
  <td><?php echo $data['department']; ?></td>
  <td><?php echo $data['massage']; ?></td>
  <td><?php echo $data['created_date']; ?></td>
<td>
     <a href="all-querys.php?id=<?php echo $data['id'];?>&action=solved" class="request"><i class = "btn btn-success col-lg" data-id="a1" data-request="Solved">Solved</i></a> 
 </td>
<td>
    <a href="all-querys.php?id=<?php echo $data['id'];?>&action=resolved" class="request"><i class="btn btn-danger" data-id="a1" data-request="Resolved">Resolved</i></a>
    </td> 
</tr>
  <?php
}
    } else {

  }
  //print_r($data2);
?>      





<?php


    }
}




    $action =$_GET['action'];

    $realoadLocation = false;
    if($action == 'solved'){
        $b = "UPDATE `communication` SET is_resolved = 'Solved' WHERE id = ".$id;
        $run = mysqli_query($con,$b);
        $realoadLocation = TRUE;
      }
    
    //echo $b; exit();

    if($action == 'resolved'){
        $c = "UPDATE `communication` SET is_resolved = 'Resolved' WHERE id = ".$id;
        $run1 = mysqli_query($con,$c); 
        $realoadLocation = TRUE;
   }

   if($realoadLocation){
      ?>
      <script type="text/javascript">
        window.location.href = "all-querys.php";
      </script>
      <?php
      //header("location:all-leaves.php");
   }


?>

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
<?php include('./footer.php'); ?>

