<?php
	$arr = array();
	if (!strcmp($_POST['status'], "delete")) {
		session_start();
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		// ini_set('session.gc_max_lifetime', 0);
		// ini_set('session.gc_probability', 1);
		// ini_set('session.gc_divisor', 1);
		session_destroy();
		$arr['status'] = "Deleted";
		echo json_encode($arr);		
	} else {
		$arr['status'] = "No";
		echo json_encode($arr);	
	}
?>