<?php
//Check for 'submit'
if ($_POST["submit"]){
	//Create 'fail' variable
	$fail = 0;
	//Get 'name'
	$name=$_POST["name"];
	
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
			<head>
				<title>OnlineEdit</title>
			</head>
		
			<body>
				<p><a href="index.html">Back to main page</a></p>
			</body>
		</html>
		<?php
	}
	else
	{
		//If there's no fail open editor mode
		$file = fopen($filename, 'r');
		
		?>
		<html>
			<head>
				<title>OnlineEdit</title>
			</head>
			
			<body>
				<center>
					<h1>OnlineEdit</h1>
					<form action="save.php" method="post">
						<h3>Text name: </h3><input type="text" name="name" value="<?php echo $name; ?>" readonly>
						<hr />
						<textarea type="text" name="text" cols="128" rows="32"><?php echo (fgets($file)); ?></textarea> <br />
						<br />
						<input type="submit" name="submit" value="Save changes" />
					</form>
				</center>
			</body>
		</html>
		<?php
		
		fclose($file);
	}
}
?>