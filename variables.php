<?php
//To start and run a php program go to =>  http://localhost/phpSandbox/variables.php
/*
local host / file path on local server http://localhost/theNameOfFolder/fileName.php
1. start XAAMP LOCAL SERVER
2. navigate to OS. > XAAMP > htdocs then make any kind of php folder/file you wish
3. right click and open up VS Code and start to program

*/
	// Single line comment
	# Single line comment
	/*
		Multiline
		comment
	*/

	#VARIABLES
	/*
		- Prefix $
		- Start with a letter or an underscore
		- Only letters, numbers and underscores
		- Case sensitive
	*/

	#DATA TYPES
	/*
		String
		Integers
		floats
		Booleans
		Arrays
		Objects
		NULL
		Resource
	*/

	$output = 'Hello World!';

	$num1 = 4;
	$num2 = 10;
	$sum = $num1 + $num2;

	$string1 = 'Hello';
	$string2 = 'World';
	$greeting = $string1 .' '. $string2.'!';
	$greeting2 = "$string1 $string2";

	$string3 = "They\"re Here";

	$float1 = 4.4;
	$bool1 = true;

	define('GREETING', 'Hello Everyone', true);

	echo greeting;
?>