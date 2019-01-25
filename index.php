<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unlock" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Formulaire Contact PHP Mailer v2</title>
</head>
<body>


<!-- Contact -------------------------------------------------------------------------------------------------------------------------------------->
<div id="sectionContact">
    <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
        <div class="contact">
            <div id="titreContact"><h1>CONTACT <br></h1></div>
                <fieldset><legend>Vos coordonnées</legend>
                    <input type='text' name='nom' id='nom' maxlength='50' placeholder="NOM *" required>
                    <input type='text' name='prenom' id='prenom' maxlength='50' placeholder="PRÉNOM *" required> 
                    <input type='email' name='email' id='email' maxlength='50' placeholder="EMAIL *" required>
                    <input type='telephone' name='telephone' id='telephone' maxlength='10' placeholder="TELEPHONE *" required>
                    <input type='postal' name='postal' id='postal' maxlength='5' placeholder="CODE POSTAL *" required>
                    <input type='town' name='ville' id='ville' maxlength='50' placeholder="VILLE *" required>
                </fieldset>
                <div id="erreurMail">
                <span id='missing'></span>
                <span id='validation'></span>

                </div>

                <input type='objet' name='objet' id='objet' maxlength='50' placeholder="OBJET *" required>
                <textarea name='message' id='message' placeholder="Message *" required></textarea>
                <img src="img-captcha.php"/><input type="text" name="capa" placeholder="Captcha *"/>
                <input type="submit" value="Envoyer" id="boutonEnvoi"><input type="reset">
            <div class="clearer"></div>
            <div id="result_contact"></div>
        </div>
    </form>

    <?php
        require('PHPMailer/class.phpmailer.php'); 
        include_once 'captcha.class.php';

        // S'il y des données de postées
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            // (1) Code PHP pour traiter l'envoi de l'email

            // Récupération des variables et sécurisation des données
            $nom     = $_POST['nom']; 
            $prenom   = $_POST['prenom'];
            $email   = htmlentities($_POST['email']);// htmlentities() convertit des caractères "spéciaux" en équivalent HTML
            $telephone   = htmlentities($_POST['telephone']);
            $postal   = htmlentities($_POST['postal']);
            $ville   = $_POST['ville'];
            $objet   = $_POST['objet'];
            $message = htmlentities($_POST['message']);

            // Variables concernant l'email

            $mail = new PHPMailer();
            $mail->Host = 'smtp.laposte.net';
            $mail->SMTPAuth   = true;
            $mail->Port = 25; // Par défaut

            // Authentification
            $mail->Username = "sicca";
            $mail->Password = "Am35sicc@25$$";

            // Expéditeur
            $mail->SetFrom('sicca@laposte.net', $prenom.' '. $nom);
            // Destinataire
            $mail->AddAddress('laurent.juy@gmail.com', 'JUY Laurent');
            // Objet
            $mail->Subject = $objet;

            // Votre message

            $bodyMessage='<p>Bonjour, vous avez reçu un message à partir de votre site web Sicca-area.</p>';
            $bodyMessage .='<p>Nom : '.$prenom.' '.$nom.'</p></br>';
            $bodyMessage .='<p>'.$postal.' '.$ville.'</p></br>';
            $bodyMessage .='<p>Telephone : '.$telephone.'</p></br>';
            $bodyMessage .='<p>Email : '.$email.'</p></br>';
            $bodyMessage .='<p>'.$message.'</p>';

            $mail->MsgHTML($bodyMessage);

            // Modifier l'encodage du mail
            $mail->CharSet = "utf-8";

            // Modifier l'adresse de réponse
            $mail->AddReplyTo($email, $prenom.' '. $nom);

            if( PhpCaptcha::Validate($_POST['capa'], true) ){
                //true
               
                // Envoi du mail avec gestion des erreurs
                if(!$mail->Send()) {
                    echo 'Erreur : ' . $mail->ErrorInfo;
                } 
                else {
                    echo 'Message envoyé !';
                }
            }
            else {
                echo 'Erreur Captcha !';
            }       
        }
    ?>
</div>
<script src="js/script-form_v1.js"></script>  
<script src="js/script-phpmail2.js"></script>    
</body>
</html>