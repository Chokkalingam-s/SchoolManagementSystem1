<?php
	$db=new mysqli("localhost","root","","school");
	if(!$db)
	{
		echo "database connectivity failed";
	}
	
?>