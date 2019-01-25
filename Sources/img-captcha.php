<?php
	ini_set('display_errors','0');
	include_once 'captcha.class.php';
	$fonts = array('arial.ttf');
	$captcha = new PhpCaptcha($fonts, 180, 40);
	$captcha->Create();
?>