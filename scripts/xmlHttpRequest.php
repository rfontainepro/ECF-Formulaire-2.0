<?php
$yourName = 'Romain';
$yourEmail = 'oxbe74@gmail.com'; // Mail du destinataire qui recevra l'email
$referringPage = 'https://romainf991.promo-105.codeur.online/ECF/2.0/';

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

echo '<resultset>';

function cleanPosUrl ($str) {
$nStr = $str;
$nStr = str_replace("**am**","&",$nStr);
$nStr = str_replace("**pl**","+",$nStr);
$nStr = str_replace("**eq**","=",$nStr);
return stripslashes($nStr);
}
	if ( $_GET['contact'] == true && $_GET['xml'] == true && isset($_POST['posText']) ) {
	$to = $yourName;
	$subject = 'Nouvel Email : '.cleanPosUrl($_POST['posRegard']);
	$message = cleanPosUrl($_POST['posText']);
	$headers = "From: ".cleanPosUrl($_POST['posName'])." <".cleanPosUrl($_POST['posEmail']).">\r\n";
	$headers .= 'To: '.$yourName.' <'.$yourEmail.'>'."\r\n";
	$mailit = mail($to,$subject,$message,$headers);
		
		if ( @$mailit ) {
			$posStatus = 'OK'; $posConfirmation = 'Votre message a bien été envoyé'; }

		else {
			$posStatus = 'NOTOK'; $posConfirmation = 'Votre email a pas été envoyé...'; }
		
		if ( $_POST['selfCC'] == 'send' ) {
		$ccEmail = cleanPosUrl($_POST['posEmail']);
		@mail($ccEmail,$subject,$message,"From: Yourself <".$ccEmail.">\r\nTo: Yourself");
		}
	
	echo '
		<status>'.$posStatus.'</status>
		<confirmation>'.$posConfirmation.'</confirmation>
		<regarding>'.cleanPosUrl($_POST['posRegard']).'</regarding>
		';
	}

echo'	</resultset>';

?>