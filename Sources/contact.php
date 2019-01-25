<?php
	include_once 'conf.php';
	include_once 'captcha.class.php';
	session_start();
	header('Content-Type:text/xml; Charset:UTF-8;');
	echo '<?xml version="1.0" encoding="UTF-8"?>';

	$type = 'no';
	
	if( $_SESSION['use_session'] != 'yes' ){
		
		$type = 'session';
		
	}elseif( $_SESSION['contact'] && (time()-$_SESSION['contact'] < TIME_LIMIT) ){
		
		$type = 'time';
		
	}else{

		if( !preg_match('#^[a-z._-]+$#i', $_POST['nom']) )
			{$fields[] = 'Nom'; $type='field';}
			
		if( !preg_match('#^[a-z._-]+$#i', $_POST['prenom']) )
			{$fields[] = 'Prénom'; $type='field';}
			
		if( !preg_match('#^[a-zA-Z0-9]+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$#', $_POST['mail']) )
			{$fields[] = '@mail'; $type='field';}
			
		if( !preg_match('#^[a-z._-]+$#i', $_POST['sujet']) )
			{$fields[] = 'Sujet'; $type='field';}
			
		if( !preg_match('#^[a-z._-]+$#i', $_POST['message']) )
			{$fields[] = 'Message'; $type='field';}
		
		if( $type == 'no' ){
			
			if( !PhpCaptcha::Validate($_POST['capa'], true) ){
			
				$type = 'captcha';
			
			}else{
			
				include_once 'phpmailer.class.php';
				
				$mailer = new PHPMailer(true);
				
				try{
					
					$mailer->AddAddress(YOUR_MAIL, YOU);
					$mailer->AddReplyTo($_POST['mail'], $_POST['prenom'].' '.$_POST['nom']);
					$mailer->SetFrom($_POST['mail'], $_POST['prenom'].' '.$_POST['nom']);
					$mailer->Subject = $_POST['sujet'];
					$mailer->AltBody = 'Votre client mail n\'est pas compatible HTML.';
					$mailer->MsgHTML($_POST['message']);
					
					$mailer->Send();
					$_SESSION['contact'] = time();
					
				}catch(phpmailerException $e){
					
					$type = 'envoi';
					
				}
				
			}
		}
	}
?>
<root>
	<error><?php echo $type; ?></error>
	<?php
		if( $type == 'field' ){
			
			echo '<fields>';
			foreach($fields as $field){
				echo '<field>'.$field.'</field>';
			}
			echo '</fields>';
			
		}elseif( $type == 'envoi' ){
			
			echo '<exception>'.$e.'</exception>';
			
		}elseif( $type == 'time' ){
			
			echo '<seconds>'.(TIME_LIMIT-time()+$_SESSION['contact']).'</seconds>';
			
		}
	?>
</root>