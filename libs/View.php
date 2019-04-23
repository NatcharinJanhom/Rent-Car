<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name, $noInclude = false)
	{
			echo'<!DOCTYPE html>
			<html lang="en">';
			require 'views/inc/head.php';
			echo '<body style="font-family: Sukhumvit">';
			require 'views/header/navbar.php';
			require 'views/' . $name . '.php';
			require 'views/header/footer.php';	
			echo'</body>';
			require 'views/inc/script_js.php';
			echo'</html>';
	}

}