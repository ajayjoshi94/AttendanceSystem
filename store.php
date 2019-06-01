
 SELECT *,dayname(date) FROM `timesheet` WHERE 1

$last_id = mysqli_insert_id($con);

if(!isset($_SESSION['employee_id'])){
   @header('login.php?msg=please login to  see this page');
$totalminutes=0;
   $from       = '13:43:13';
$to         = '18:53:13';

$total      = strtotime($to) - strtotime($from);
$hours      = floor($total / 60 / 60);
$minutes    = round(($total - ($hours * 60 * 60)) / 60);
$totalminutes += $minutes
$totalminutes = $totalminutes+$minutes
echo $hours.'.'.$minutes;

DataTables server-side processing example