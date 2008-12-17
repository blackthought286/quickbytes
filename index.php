
	
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<p>
		<h3>Please type number</h3>
		<input name="number" type="text" size="3" maxlength="5" tabindex="1" /><br />
		<input name="byte_type" type="radio" value="kb" tabindex="2" />Kilobytes<br />
		<input name="byte_type" type="radio" value="mb" tabindex="3" />Megabytes<br />
		<input name="byte_type" type="radio" value="gb" tabindex="4" />Gigabytes<br />
		<input name="submit" type="submit" value="Get Answer" tabindex="5" />
		</p>
		
	</form>



<?php
	
	require_once('ByteCount.php');
	
	$storage_number = $_POST['number'];
	$byte = $_POST['byte_type'];
	
	if(!isset($storage_number) || !isset($byte))
	{
		echo("We need a number");
	}else{
		$bc = new ByteCount( $storage_number, $byte );
	}
	
	unset($storage_number);
	unset($byte);
	

?>