function validateFields() {
var frmEl = document.getElementById('cForm');
var posName = document.getElementById('posName');
var posEmail = document.getElementById('posEmail');
var posRegard = document.getElementById('posRegard');
var posText = document.getElementById('posText');
var strCC = document.getElementById('selfCC');
var whiteSpace = /^[\s]+$/;
	if ( posText.value == '' || whiteSpace.test(posText.value) ) {
		alert("Vous essayez d'envoyer un email vide, veuillez taper quelque chose");
	}
	else if ( posEmail.value == '' && strCC.checked == true ) {
		alert("Pourquoi essayez-vous de vous mettre en CC sans e-mail ?");
		alert("Juste pour ça...");
		alert("Je vide tous les champs");
		frmEl.reset();
		alert("Satisfait");
		alert("Maintenant, recommencez");
		posName.focus();
	}
	else {
		sendPosEmail();
	}
}
function sendPosEmail () {
	var success = document.getElementById('emailSuccess');
	var posName = document.getElementById('posName');
	var posEmail = document.getElementById('posEmail');
	var posRegard = document.getElementById('posRegard');
	var posText = document.getElementById('posText');
	var strCC = document.getElementById('selfCC').value;
	var page = "scripts/xmlHttpRequest.php?contact=true&xml=true";
	
	showContactTimer();
	success.style.display = 'none';
	
	var str1 = posName.value;
	str1 = str1.replace(/&/g,"**am**");
	str1 = str1.replace(/=/g,"**eq**");
	str1 = str1.replace(/\+/g,"**pl**");
	var str2 = posEmail.value;
	str2 = str2.replace(/&/g,"**am**");
	str2 = str2.replace(/=/g,"**eq**");
	str2 = str2.replace(/\+/g,"**pl**");
	var str3 = posRegard.value;
	str3 = str3.replace(/&/g,"**am**");
	str3 = str3.replace(/=/g,"**eq**");
	str3 = str3.replace(/\+/g,"**pl**");
	var str4 = posText.value;
	str4 = str4.replace(/&/g,"**am**");
	str4 = str4.replace(/=/g,"**eq**");
	str4 = str4.replace(/\+/g,"**pl**");
	
	var stuff = "selfCC="+strCC+"&posName="+str1+"&posEmail="+str2+"&posRegard="+str3+"&posText="+str4;
	loadXMLPosDoc(page,stuff)
}
function showContactTimer () {
	var loader = document.getElementById('loadBar');
	loader.style.display = 'block';
	sentTimer = setTimeout("hideContactTimer()",6000);
}

function hideContactTimer () {
	var loader = document.getElementById('loadBar');
	var success = document.getElementById('emailSuccess');
	var fieldArea = document.getElementById('contactFormArea');
	var inputs = fieldArea.getElementsByTagName('input');
	var inputsLen = inputs.length;
	var tAreas = fieldArea.getElementsByTagName('textarea');
	var tAreasLen = tAreas.length;

	loader.style.display = "none";
	success.style.display = "block";
	success.innerHTML = '<strong>'+grabPosXML("confirmation")+'</strong>';

	for ( i=0;i<inputsLen;i++ ) {
		if ( inputs[i].getAttribute('type') == 'text' ) {
			inputs[i].value = '';
		}
	}
	for ( j=0;j<tAreasLen;j++ ) {
		tAreas[j].value = '';
	}
}

function ajaxContact() {
var frmEl = document.getElementById('cForm');
addEvent(frmEl, 'submit', validateFields, false);
frmEl.onsubmit = function() { return false; }
}
addEvent(window, 'load',ajaxContact, false);