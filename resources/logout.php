<?php 
	session_unset('userid');
	// destroy the session
	session_destroy();
	header('Location:../login');
        die;
?>