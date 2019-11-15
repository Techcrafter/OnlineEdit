<?php
//Check for 'submit'
if ($_POST["submit"]){
	//Create 'fail' variable
	$fail = 0;
	//Get 'name'
	$name=$_POST["name"];
	//Get 'text'
	$text=$_POST["text"];
	
	echo "Saving to '" . $name . "'... ";
	
	//Check if 'name' isn't empty
	if(empty($name))
	{
		echo "Text name can't be empty! ";
		$fail = 1;
	}
	
	$filename = 'texts/' . $name . '.txt';
	
	if(!file_exists($filename))
	{
		echo "A text with this name couldn't be found! ";
		$fail = 1;
	}
	
	//Check for fail
	if ($fail == 1)
	{
		?>
		<html>
			<body>
				<p><a href="index.html">Back to main page</a></p>
			</body>
		</html>
		<?php
	}
	else
	{
		//Save text to file if there's no fail
		$file = fopen($filename, "w");
		fwrite($file, $text);
		fclose($file);
		
		//After writing
		echo "DONE!";
		?>
		<html>
			<body>
				<p><a href="index.html">Back to main page</a></p>
			</body>
		</html>
		<?php
	}
}
?>