<?php 
	

	// add-employee.php
	// edit-employee.php
	// login.php
	// save-employee.php

	//function 


	function addTwoNumbers($a,$b){
		return (" <br> ".$a." + ".$b." ==  ".($a+$b));
	}

	echo addTwoNumbers(11,12);
	echo addTwoNumbers(15,10);


	function getDataLists($table,$query){
		$sql = " select * from ".$table." where 1 and  ";
		$ex = mysql_close();
		return $data;
	}

	$employeeData = getDataLists("admin");

?>



