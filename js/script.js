document.addEvent('domready', function(){
	$('form_contact').addEvent('submit', function(e){
		
		e.stop();
		
		var button = this.getElement('input[type=submit]');
		this.set('send', {
			onRequest: function(){
				button.morph({opacity:0});
				$('result_contact').set('html','');
			},
			onComplete: function(){
				button.morph({opacity:1});
			},
			onSuccess: function(responseText, responseXML){
				var type = $(responseXML).getElement('root error').get('text');
				switch(type){
					case 'field':
						$('result_contact').set('html','Les champs ci-dessous sont mal remplis.');
						$(responseXML).getElements('root fields field').each(function(el){
							$('result_contact').adopt(new Element('div', {html:el.get('text')}));
						});
						break;
						
					case 'envoi':
						$('result_contact').set('html','Problème lors de l\'envoi avec PHPMailer.<br/>');
						$('result_contact').adopt(new Element('div', {html:$(responseXML).getElements('root exception').get('text')}));
						break;
						
					case 'time':
						var secondes = $(responseXML).getElements('root seconds').get('text');
						$('result_contact').set('html','Vous devez attendre '+secondes+' secondes avant d\'enoyer un nouveau message.');
						break;
						
					case 'session':
						$('result_contact').set('html','Votre navigateur n\'est pas compatible avec les sessions.');
						break;
						
					case 'captcha':
						$('result_contact').set('html','Vous avez mal recopié les lettres.');
						break;
					
					case 'no':
						$('result_contact').set('html','Message envoyé. Vous pourrez envoyer un nouveau message dans 5 minutes.');
						button.dispose();
						$('form_contact').getElements('input,textarea').each(function(input){
							input.set('disabled','disabled');
						});
						break;
						
					default:
						$('result_contact').set('html','Erreur de type inconnu.');
						break;
				}
			},
			onFailure: function(xhr){
				button.morph({opacity:1});
				$('result_contact').set('html','Erreur lors de la communication avec le serveur.');
			}
		});
		
		this.send();
		
	});
});