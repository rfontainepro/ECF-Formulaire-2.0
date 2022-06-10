<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Formulaire de Contact (AJAX)</title>
		<link rel="stylesheet" href="./assets/css/main.css" />

		<!-- FAVICON --------------------------------------------------------------------------------------------------------------------->
		<link rel="icon" type="image/png" href="./img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="./img/favicon-16x16.png" sizes="16x16" />
		<!-------------------------------------------------------------------------------------------------------------------------------->

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<script type="text/javascript" src="js/functionAddEvent.js"></script>
		<script type="text/javascript" src="js/contact.js"></script>
		<script type="text/javascript" src="js/xmlHttp.js"></script>

	</head>

	<body>

		<h2>Formulaire de Contact</h2>

		<div id="info">

			<p id="loadBar">
				<strong>Envoi de l'email en cours...</strong>
				<img src="img/loading.gif" alt="Loading" title="Sending Email" />
			</p>

			<p id="emailSuccess">
				<strong>Votre message a bien été envoyé</strong>
			</p>

		</div>

		<div id="contactFormArea">

			<form action="scripts/contact.php" method="post" id="cForm">

				<fieldset>

					<input required class="feedback-input" type="text" size="25" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" title="Tu sais lire ? Ton NOM ! -_-" maxlength=10 placeholder="Nom" name="name" class="feedback-input" id="posName" value="" />

					<input required class="feedback-input" type="text" size="25" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})" title="Tu sais lire ? Ton EMAIL ! -_-" maxlength=40 placeholder="Email" name="email" required class="feedback-input" id="posEmail" value="" />
					

					<input class="feedback-input" type="text" size="25" required id="posRegard" pattern="^[\s\S]{5,}" title="MIN 5 MAX 20 caractères -_-" maxlength=20 placeholder="Votre sujet" name="sujet" class="feedback-input" />
					

					<textarea cols="50" rows="5" type="text" required id="posText" pattern="^[\s\S]{10,}" title="MIN 10 MAX 200 caractères -_-" maxlength=200 placeholder="Votre message" name="text" class="feedback-input"></textarea>
					
					<label id="CC" for="selfCC">
						<input type="checkbox" name="selfCC" id="selfCC" value="send" />Envoyer une copie
					</label>

					<label>
						<input class="submit" type="submit" name="sendContactEmail" id="sendContactEmail" value=" Envoyer " />
					</label>

				</fieldset>

			</form>

			<p id="love">Made in AJAX with &hearts;</p>

		</div>

	</body>

</html>