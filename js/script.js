
function toggleForms(butt){

	if (getComputedStyle(document.getElementById("registerform")).display=="block" && butt=="Login"){
		document.getElementById("loginform").style.display="block"
		document.getElementById("registerform").style.display="none"	
		document.getElementById("regfrommodal").className="registerformdisabled"
		document.getElementById("loginfrommodal").className="registerformactive"
	}
	if (getComputedStyle(document.getElementById("registerform")).display!="block" && butt=="Register"){
		document.getElementById("loginform").style.display="none"
		document.getElementById("registerform").style.display="block"
		document.getElementById("regfrommodal").className="registerformactive"
		document.getElementById("loginfrommodal").className="registerformdisabled"

	
		
	}
}