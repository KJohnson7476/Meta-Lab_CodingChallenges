<?php

$index = key($_GET);

if (!is_int($index) || empty($_GET) || $index < 0) {

	echo "Please enter a valid index.";

}
else {

	$fib_numbers = fib($index);

	$result = [
		"status" => 200,
		"success" => "true",
		"verison" => "JSON-Array-0.1",
		"Fibonacci" => "$index",
		"numbers" => $fib_numbers];

	header('Content-type: application/json');

	echo json_encode($result, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);

}


function fib($index) {
	
	$fib_array = [];
	
	$back_1 = 1;
	$back_2 = 0;


	if ($index == 0) {
		$fib_array[] = 0;
	} 
	else if ($index == 1) {
		$fib_array[] = 0;
		$fib_array[] = 1;
	} 
	else {

		$fib_array[] = 0;
		$fib_array[] = 1;

		for ($i = 2; $i <= $index; $i++) {

			$fib_number = $back_1 + $back_2;

			$fib_array[] = $fib_number;

			//adjust variables
			$back_2 = $back_1;
			$back_1 = $fib_number;
		}

	}
	return $fib_array;
}

?>