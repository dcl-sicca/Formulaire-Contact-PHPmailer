<?php
	session_start();
	$_SESSION['use_session'] = 'yes';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Nous contacter</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="mootools-1.2.2-core-yc.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<style>
	.clearer{clear:both;}
	.italic{font-style:italic;}
	legend{font-size:1.3em;}
	fieldset{float:left;width:40%;}
	a{color:#0000FF;}
	label{float:left;width:120px;}
	input{width:200px;}
	#result_contact{font-family: courier;}
	#bloc_droite{float:left;width:40%;}
	#capa{height:40;font-size:2em;}
	</style>
</head>
<body>


	<form id="form_contact" action="contact.php" method="post">
		<fieldset>
		
			<legend>Contactez-nous</legend>
			
			<label>Nom</label>
			<input type="text" name="nom" value=""/>
			<div class="clearer"></div>
			
			<label>Prénom</label>
			<input type="text" name="prenom" value=""/>
			<div class="clearer"></div>
			
			<label>@mail</label>
			<input type="text" name="mail" value=""/>
			<div class="clearer"></div>
			
			<label>Sujet</label>
			<input type="text" name="sujet" value=""/>
			<div class="clearer"></div>
			
			<label>Message</label>
			<textarea name="message" cols="45" rows="6"></textarea>
			<div class="clearer"></div>
			
			<label>Anti robot</label>
			<div style="float:left;">
			<span class="italic">Recopiez les lettres dans la case à côté.</span>
			<br/>
			<img src="img-captcha.php?time=<?php echo time(); ?>" style="vertical-align:bottom;"/>
			<input type="text" name="capa" id="capa"/>
			</div>
			<div class="clearer"></div>
			
			<label>&nbsp;</label>
			<input type="submit" value="envoyer"/>
			<div class="clearer"></div>
			
			<div id="result_contact"></div>
			
		</fieldset>
	</form>
	
	<fieldset id="bloc_droite">
	
		<legend>Indications</legend>
	
		<p class="italic">Les champs n'acceptent que les lettres ou les caractères suivants . _ -</p>
		<p class="italic">Le champs @mail doit respecter la syntaxe correcte d'une adresse électronique.</p>
		<p class="italic">N'essayez pas de blinder de messages, la fonction d'envoie de mail a été mise en commentaire pour cet exemple.</p>
		
	</fieldset>
	
	
</body>
</html>