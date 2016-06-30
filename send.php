<?php

define( 'SERVEUR' , 'localhost' ); // SERVEUR
define( 'LOGIN' , 'preprod-pfca34' );       // LOGIN
define( 'PASS' , 'QbPZ7sX3bVbEa4Ve' );		 // MOT DE PASSE
define( 'BDD' , 'preprod-pfca34' );		// NOM BASE DE DONNEES

if ( !mysql_connect( SERVEUR , LOGIN , PASS ) )
	exit ( "Connexion ? " . SERVEUR . " impossible \n" );

if ( !mysql_select_db( BDD ) )
	exit ( "Sélection de la base annuaire impossible \n" );

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
	Comme vous le savez, la PFCA34 a entrepris la refonte de son site internet pour répondre au mieux à vos attentes et vos besoins en terme de communication et de diffusion d\'informations sur vos actions, vos activités, vos dispositifs et vous faire connaitre toute l\'actualité juridique, sociale, économique et financière  autour de la création d\'activités dans le département de l\'Hérault.<br><br>	
	Nous avons donc le grand plaisir de vous communiquer, par la présente, vos identifiants et mots de passe pour vous connecter à votre espace privilégié sur le nouveau site internet de la PFCA34: <a href="http://www.pfca34.org">www.pfca34.org</a><br><br>';
	
	$message .= 'Identifiant: '.$name.'<br>' ;
	$message .= 'Mot de passe: pfca34portail<br><br>' ;
	
	$message .= 'Rendez-vous sur votre espace "adhérent" pour profiter des actualités et être informés de tous les évènements et les manifestations du réseau de la création d\'activité de l\'Hérault.<br><br>	
	Dans l\'attente d\'une prochaine rencontre, n\'hésitez pas à nous faire un retour, votre avis nous intéresse!<br><br>	
	En vous souhaitant une très agréable journée, je vous prie de croire en l\'assurance de nos sentiments les meilleurs.<br><br>	
	Yves CHAMPETIER<br>
	Président de la PFCA34';
	$message .= '</body></html>';

	/*
if (!mail($to, $subject, $message, $headers)) {
		echo $to;
	}else{

		// 1 : on ouvre le fichier
		$monfichier = fopen('mail.txt', 'a');
		
		// 2 : on fera ici nos opérations sur le fichier...
		$mail = $mail."\n";
		fwrite($monfichier,$mail);
		
		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);
	} 
*/

} 

?>