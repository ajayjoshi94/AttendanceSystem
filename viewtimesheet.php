 <?php

include('./header.php');
include_once('./dbcon.php');
  global $con;

if(isset($_GET["id"]))
{
echo $employee_id = $_GET["id"];
}

$aColumns = array( 'employee_id', 'date', 'day', 'time_in', 'time_out','working_hour','status' );
$sIndexColumn = "id";
$sTable = "ajax";
     $sLimit = "";
   if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
   {
     $sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
       mysql_real_escape_string( $_GET['iDisplayLength'] );
   }

  // if ( isset( $_GET['iSortCol_0'] ) )
  // {
  //   $sOrder = "ORDER BY  ";
  //   for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
  //   {
  //     if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
  //     {
  //       $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
  //         ".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
  //     }
  //   }
    
  //   $sOrder = substr_replace( $sOrder, "", -2 );
  //   if ( $sOrder == "ORDER BY" )
  //   {
  //     $sOrder = "";
  //   }
  // }

  // $sWhere = "";
  // if ( $_GET['sSearch'] != "" )
  // {
  //   $sWhere = "WHERE (";
  //   for ( $i=0 ; $i<count($aColumns) ; $i++ )
  //   {
  //     $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
  //   }
  //   $sWhere = substr_replace( $sWhere, "", -3 );
  //   $sWhere .= ')';
  // }

  // for ( $i=0 ; $i<count($aColumns) ; $i++ )
  // {
  //   if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
  //   {
  //     if ( $sWhere == "" )
  //     {
  //       $sWhere = "WHERE ";
  //     }
  //     else
  //     {
  //       $sWhere .= " AND ";
  //     }
  //     $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
  //   }
  // }

  // $sQuery = "
  //   SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
  //   FROM   timesheet
  //   $sWhere
  //   $sOrder
  //   $sLimit
  // ";
  // $rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());

  // $sQuery = "
  //   SELECT COUNT(".$sIndexColumn.")
  //   FROM   timesheet
  // ";
  // $rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
  // $aResultTotal = mysql_fetch_array($rResultTotal);
  // $iTotal = $aResultTotal[0];
$todaysdate =  date("Y-m-d");
//echo $todaysdate; exit();
$query = "SELECT * FROM `timesheet` WHERE date = '".$todaysdate."'";
// echo $query; exit();
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
              <h3 class="box-title"><b><u>Timesheet Detail</u></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="myform" id = "" action="" method="post" enctype="multipart/form-data">

              <table id="example5" class="table table-bordered table-striped">
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
      <th>Action</th>
      

<tbody>
    <?php

    
while($data = mysqli_fetch_assoc($run)) {

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
     <a href="update.php?id=<?php echo $data['id'];?>"><i class="fa fa-pencil"></i></a> 
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