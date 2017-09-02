<?php
if(isset($cookie_name))
{
	// Check if the cookie exists
if(isset($_COOKIE[$cookie_name]))
	{
	parse_str($_COOKIE[$cookie_name]);

	// Make a verification
	echo "ok";
	if($usr)
		{

		// Register the session
		$_SESSION['name'] = $usr;
		}
	}
}
?>