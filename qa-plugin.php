<?php


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	// Register the fact that we're replacing core functions in this plugin module
	qa_register_plugin_overrides('fullname.php');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
