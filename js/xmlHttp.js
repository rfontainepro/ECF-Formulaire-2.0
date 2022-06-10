var pos;
function loadXMLPosDoc(url,posData) {

    if (window.XMLHttpRequest) {
        pos = new XMLHttpRequest();
        pos.onreadystatechange = processPosChange;
        pos.open("POST", url, false);
		pos.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        pos.send(posData);

    } else if (window.ActiveXObject) {
        pos = new ActiveXObject("Microsoft.XMLHTTP");
        if (pos) {
            pos.onreadystatechange = processPosChange;
            pos.open("POST", url, false);
			pos.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            pos.send(posData);
        }
    }
}

function grabPosXML (tagName) {
return pos.responseXML.documentElement.getElementsByTagName(tagName)[0].childNodes[0].nodeValue;
}

function processPosChange() {

    if (pos.readyState == 4) {

        if (pos.status == 200) {
			if ( grabPosXML("posStatus") == 'NOTOK' ) { 
				alert('Il y a eu des problèmes, veuillez réessayer dans quelques minutes');
			}
		}
	}
}