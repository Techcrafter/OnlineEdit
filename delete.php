<?php
//Check for 'submit'
if ($_POST["submit"]){
	//Create 'fail' variable
	$fail = 0;
	//Get 'name'
	$name=$_POST["name"];
	//Get 'nameConfirm'
	$nameConfirm=$_POST["nameConfirm"];
	
	echo "Deleting '" . $name . "'... ";
	
	//Check if 'name' isn't empty
	if(empty($name))
	{
		echo "Text name can't be empty! ";
		$fail = 1;
	}
	
	//Check if 'nameConfirm' isn't empty
	if(empty($nameConfirm))
	{
		echo "Text name confirmation can't be empty! ";
		$fail = 1;
	}
	
	$filename = 'texts/' . $name . '.txt';
	
	//Check if a text with this id does exist
	if(!file_exists($filename))
	{
		echo "A text with this name doesn't exist! ";
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
				<p><a href="delete.html">Back to deletion page</a></p>
			</body>
		</html>
		<?php
	}
	else
	{
		//If there's no fail delete the text
		unlink($filename);
		
		//After creating
		echo "DONE!";
		?>
		<html>
			<head>
				<title>OnlineEdit</title>
			</head>
			
			<body>
				<p><a href="index.html">Back to main page</a></p>
			</body>
		</html>
		<?php
	}
}
?>