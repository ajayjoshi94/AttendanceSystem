<?php

include_once('./dbcon.php');


		if(isset($_POST['submit'])) {

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$department = $_POST['department'];
		$email_id = $_POST['email_id'];
		$password = md5($_POST['password']);
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$hire_date = $_POST['hire_date'];
		$designation = $_POST['designation'];
		$gender = $_POST['gender'];
		$birth_date = $_POST['birth_date'];
		$salary = $_POST['salary'];
		$status = $_POST['status'];

      $query="SELECT * FROM `employee` WHERE email_id ='$email_id' ";
   $data1 = mysqli_query($con,$query);
   $row1 = mysqli_num_rows($data1);
   if($row1 > 0) {

      echo "email exists"; exit();

   } else {
      $qry="SELECT * FROM `admin` WHERE email_id ='$email_id' ";
   $data2 = mysqli_query($con,$qry);
   $row2 = mysqli_num_rows($data2);
  if($row2 > 0) {

      echo "email exists"; exit();

   } else {

		
		 $query = "INSERT INTO employee (firstname, lastname, department, email_id, password, address, phone_no, hire_date, designation, gender, birth_date, salary, status) VALUES ('$firstname','$lastname','$department','$email_id','$password','$address','$phone_no','$hire_date','$designation','$gender','$birth_date','$salary','$status')";
       
      $run = mysqli_query($con,$query);

            if($run == TRUE){

      $query1 = "INSERT INTO admin (firstname, lastname, email_id, password, designation, status) VALUES ('$firstname','$lastname','$email_id','$password','$designation','$status')";
      
       $run1 = mysqli_query($con,$query1);
   } else {
      echo "error";
    }
	}
}
}
?>
<!DOCTYPE html>
<html leng = "en_US">
   <head>
      <meta charset="UTF-8">
      <title></title>
      <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <style type="text/css">
         .content{
         background-color: #3c8dbc;
         
         }
      </style>
   </head>
   <body>
      <section class="content">
         <div class="row">
         
         <div class="col-md-4"></div>
         <div class="col-md-4">
           
            <div class="box box-primary">
               <div class="box-header with-border" align="center">
                  <h3 class="box-title"><b><u>Registration</u></b></h3>
               </div>
             
               <form role="form" name="myform" id = "myform" action="registration.php" method="post" enctype="multipart/form-data">
                 <div class="box-body">
                     
                     <div class="form-group">
                        <label for="exampleInputfirstname">firstname</label>
                        <input type="text" name="firstname" class="form-control" id="exampleInputfirstname" placeholder="First Name" required="required">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputlastname">lastname</label>
                        <input type="text" name="lastname" class="form-control" id="exampleInputlastname" placeholder="Last Name" required="required">
                     </div>
                      <div class="form-group">
                        <label for="exampleInputdepartment">department</label>
                        <input type="text" name="department" class="form-control" id="exampleInputdepartment" placeholder="Department" required="required">
                     </div>
                      <div class="form-group">
                        <label for="exampleInputemail_id">email_id</label>
                        <input type="email" name="email_id" class="form-control" id="exampleInputemail_id" placeholder="Email Id" required="required">
                     </div>
                      <div class="form-group">
                        <label for="exampleInputpassword">password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputpassword" placeholder="Password" required="required">
                     </div>
                      <div class="form-group">
                        <label for="exampleInputaddress">address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputaddress" placeholder="Address" required="required">
                     </div>
                      <div class="form-group">
                        <label for="exampleInputphone_no">phone_no</label>
                        <input type="text" name="phone_no" class="form-control" id="exampleInputphone_no" placeholder="Phone No" required="required">
                     </div>
                  	 <div class="form-group">
                     <label for="exampleInputhire_date">hire_date</label>
                     <input type="date" name="hire_date" class="form-control" id="exampleInputhire_date" placeholder="Hire Date" required="required">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputdesignation">designation</label>
                     <input type="text" name="designation" class="form-control" id="exampleInputdesignation" placeholder="Designation" required="required">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputgender">gender</label>
                     <label for="male">male</label>
                     <input type="radio" name="gender" id="male" value="male" checked>
                     <label for="female">female</label>
                     <input type="radio" name="gender" id="female" value="female">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputbirth_date">birth_date</label>
                        <input type="date" name="birth_date" class="form-control" id="exampleInputbirth_date" placeholder="Birth Date" required="required">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputsalary">salary</label>
                        <input type="text" name="salary" class="form-control" id="exampleInputsalary" placeholder="Salary" required="required">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputstatus">status</label>
                        <input type="text" name="status" class="form-control" id="exampleInputstatus" placeholder="Status" required="required">
                     </div>
                 
                     
                     <div class="box-footer" align="center">
                        <input type="submit" name="submit" class="btn btn-primary" onclick="myFunction()" value="submit">     
                     </div>

                     <p>
                         Already a Registered ? <a href="login.php">Sign in</a>
                    </p>
                     </div>
                    
               </form>
               </div>
              
            </div>
            <div class="col-md-4"></div>
          
         </div>

         <!--script>
function myFunction() {
  document.getElementById("myform").reset();
}
</script-->

        
      </section>
   </body>
</html>