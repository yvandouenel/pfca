<?php

define( 'SERVEUR' , 'localhost' ); // SERVEUR
define( 'LOGIN' , 'preprod-pfca34' );       // LOGIN
define( 'PASS' , 'QbPZ7sX3bVbEa4Ve' );		 // MOT DE PASSE
define( 'BDD' , 'preprod-pfca34' );		// NOM BASE DE DONNEES

if ( !mysql_connect( SERVEUR , LOGIN , PASS ) )
	exit ( "Connexion ? " . SERVEUR . " impossible \n" );

if ( !mysql_select_db( BDD ) )
	exit ( "S�lection de la base annuaire impossible \n" );

$retour=mysql_query("SELECT * FROM users LIMIT 200,350") or die ('Erreur : '.mysql_error());
$donnees = mysql_fetch_array($retour);


while($donnees = mysql_fetch_array($retour)){
	$name = $donnees["name"];
	$mail = $donnees["mail"];

	//$to = 's.larue@choosit.com';
	$to = $mail;
	$subject = 'Identifiants de connexion site PFCA34';
	
	$headers = "From: " . strip_tags("contact@pfca34.org") . "\r\n";
	$headers .= "Reply-To: ". strip_tags("contact@pfca34.org") . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	$message = '<html><body>';
	$message .= 'Chers membres et partenaires de la PFCA34,<br><br>	
	Comme vous le savez, la PFCA34 a entrepris la refonte de son site internet pour r�pondre au mieux � vos attentes et vos besoins en terme de communication et de diffusion d\'informations sur vos actions, vos activit�s, vos dispositifs et vous faire connaitre toute l\'actualit� juridique, sociale, �conomique et financi�re  autour de la cr�ation d\'activit�s dans le d�partement de l\'H�rault.<br><br>	
	Nous avons donc le grand plaisir de vous communiquer, par la pr�sente, vos identifiants et mots de passe pour vous connecter � votre espace privil�gi� sur le nouveau site internet de la PFCA34: <a href="http://www.pfca34.org">www.pfca34.org</a><br><br>';
	
	$message .= 'Identifiant: '.$name.'<br>' ;
	$message .= 'Mot de passe: pfca34portail<br><br>' ;
	
	$message .= 'Rendez-vous sur votre espace "adh�rent" pour profiter des actualit�s et �tre inform�s de tous les �v�nements et les manifestations du r�seau de la cr�ation d\'activit� de l\'H�rault.<br><br>	
	Dans l\'attente d\'une prochaine rencontre, n\'h�sitez pas � nous faire un retour, votre avis nous int�resse!<br><br>	
	En vous souhaitant une tr�s agr�able journ�e, je vous prie de croire en l\'assurance de nos sentiments les meilleurs.<br><br>	
	Yves CHAMPETIER<br>
	Pr�sident de la PFCA34';
	$message .= '</body></html>';

	/*
if (!mail($to, $subject, $message, $headers)) {
		echo $to;
	}else{

		// 1 : on ouvre le fichier
		$monfichier = fopen('mail.txt', 'a');
		
		// 2 : on fera ici nos op�rations sur le fichier...
		$mail = $mail."\n";
		fwrite($monfichier,$mail);
		
		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);
	} 
*/

} 

?>