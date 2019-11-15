<?php
//Check for 'submit'
if ($_POST["submit"]){
	//Create 'fail' variable
	$fail = 0;
	//Get 'name'
	$name=$_POST["name"];
	
	echo "Creating '" . $name . "'... ";
	
	//Check if 'name' isn't empty
	if(empty($name))
	{
		echo "Text name can't be empty! ";
		$fail = 1;
	}
	
	$filename = 'texts/' . $name . '.txt';
	
	//Check if a text with this id doesn't already exists
	if(file_exists($filename))
	{
		echo "A text with this name already exists! ";
		$fail = 1;
	}
	
	//Check for fail
	if ($fail == 1)
	{
		?>
		<html>
			<head>
				<title>OnlineEdit</title>
			</head>
			
			<body>
				<p><a href="create.html">Back to creation page</a></p>
			</body>
		</html>
		<?php
	}
	else
	{
		//If there's no fail create new text
		$file = fopen($filename, 'x');
		fclose($file);
		
		//After creating
		echo "DONE!";
		?>
		<html>
			<head>
				<title>OnlineEdit</title>
			</head>
			
			<body>
				<h4>Please make sure that you noted the name of the text!</h4>
				<p><a href="index.html">Back to main page</a></p>
			</body>
		</html>
		<?php
	}
}
?>