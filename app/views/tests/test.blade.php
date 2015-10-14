<<!DOCTYPE html>
<html>
<head>
	<title>EMBED SURVEY TEST</title>

	
</head>
<body>
<surveyarea id ="survey" class ="lol" surveyid="12">
<button onclick="runsurvey()">Try it</button>
</surveyarea>

</body>
<script type="text/javascript">
	var surveyid = document.getElementsByTagName('surveyarea')[0].getAttribute("surveyid");	
	theUrl="http://localhost/survaider/public/api/v1/survey/" +surveyid;
	function httpGetAsync(theUrl, callback)
{
    var xmlHttp = new XMLHttpRequest();
    
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        	if (typeof(callback) === 'function') {
   callback(xmlHttp.responseText);
}
            
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
    return xmlHttp.responseText;
}
	
	
	function runsurvey(){
		data=httpGetAsync(theUrl);
		document.getElementById('survey').innerHTML = data;

	}
	</script>
</html>