<?php 
session_start();

 include_once('./dbcon.php');
     date_default_timezone_set('Asia/Calcutta'); 
       $time_out = date("H:i:s", time());
       $a = "UPDATE timesheet SET time_out = '$time_out' WHERE id = ".$_SESSION['Timesheet_ID'];
       // echo $a; exit();
	   $data = mysqli_query($con,$a);
// 	if (isset($_POST['logout'])) {

	  
//        $_SESSION['id'] = $data;
//       $_SESSION['designation'] = $data['designation'];
//       $employee_id=$data['id'];
//       $date =date("Y/m/d");
// // $time_in =date("H:i:s", time());
//       date_default_timezone_set('Asia/Calcutta'); 
//        $time_in = date("H:i:s", time()); 

// 	   $a = "UPDATE timesheet SET time_out = '$time_out' WHERE id = '".$id."'";
// 	   $data = mysqli_query($con,$a);
// 	   //echo $a; exit();

// 	    $_SESSION['employee_id'] = $data1;
//             $_SESSION['designation'] = $data1['designation'];
//              $employee_id=$data1['employee_id'];
//               $date =date("Y/m/d");

//                date_default_timezone_set('Asia/Calcutta'); 
//        $time_in = date("H:i:s", time()); 
// 	   $b = "UPDATE timesheet SET time_out = '$time_out' WHERE id = '".$id."'";
// 	   $data1 = mysqli_query($con,$b);
// 	    echo $b; exit();

	   session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['employee_id']);
	unset($_SESSION['Timesheet_ID']);
	   header('Location: ./login.php');
	// }
	?>
