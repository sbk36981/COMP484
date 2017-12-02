<?php
	
	$add = false;
	$employees_arr = [];

	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	
	if (isset($_SESSION['employees'])) 
	{
        $employees_arr = $_SESSION['employees'];
    }
	else 
	{
		$add = true;
		$employees_arr = array();
	}
	
	$json_emp = file_get_contents('php://input');
	
	$obj = json_decode($json_emp); // parse JSON to object
	
	$first = $obj->{'first'};
	
	$last = $obj->{'last'};
	
	$dept = $obj->{'dept'};
	
	
	if( $add == false )
	{
		foreach ($employees_arr as $value) 
		{
			$add = false;
			if( array_key_exists(1, $value) && $first === $value[1] && array_key_exists(2, $value) &&  $last === $value[2] ) 
			{
				$add = false;
				break;
			}
			else
			{
				$add = true;
				continue;
			}
		}
	}
	
	if( $add == false )
	{
		echo '<h3>Employee with this details alerady exists; please enter different values for first name, last name or department</h3>';
	}
	else
	{
		$emp_id = rand(10000000, 99999999);
		if( !empty($_SESSION['employees']) ) 
		{
			while( checkIDUnique($emp_id) )
			{
				$emp_id = rand(10000000, 99999999);
			}
		}
		
		array_push( $employees_arr, array( $emp_id, $first, $last, $dept) );
		$_SESSION['employees'] = $employees_arr;
			
		echo '<h2>Employee Added</h2>';
		echo '<span>Name: '.$last.', '.$first.'</span></br>';
		echo '<span>Department: '.$dept.'</span></br>';
		echo '<span>Employee ID: '.$emp_id.'</span></br>';
		echo '<span>Hire Date: '.date("D M j Y").'</span></br>';
		echo '<span>Total Employees: '.count($_SESSION['employees']).'</span></br>';
	}
	
	function checkIDUnique( $id )
	{
		if (isset($_SESSION['employees'])) 
		{
			$employees_arr = $_SESSION['employees'];
		}
		else 
		{
			return true;
		}
		foreach( $employees_arr as $value )
		{
			if( array_key_exists(0, $value) && $id === $value[0] )
			{
				return true;
			}
		}
		return false;
	}
?>