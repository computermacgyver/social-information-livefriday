<?php
include("functions.php");
?>
<html>
<meta charset="UTF-8">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-title" content="OII LiveFriday" />
<head>

<style>
body,
html {
	margin: 10px;
	padding:0;
	color:#000;
	/*overflow: hidden;*/
	background:#FFF;
	font-family: Helvetica, Arial, sans-serif;
}

::-webkit-scrollbar { 
    display: none; 
}

.pic,.graph,.percent {
	float: left;
}

#control,#treatment {
	float: left;
	width: 50%;
	height: 70%;
	/*border: solid 1px;*/
	position: relative;
}

.example {
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	text-align: center;
	margin: auto;
	width: 75%;
	height: 75%;
	-webkit-transition: all 1s ease-in-out;
	-moz-transition: all 1s ease-in-out;
	-ms-transition: all 1s ease-in-out;
	-o-transition: all 1s ease-in-out;
	transition: all 1s ease-in-out;
}

.invisible {
	opacity: 0;
}

.example img {
	width: auto;
	height: auto;
	max-width: 100%;
	max-height: 100%;
}

.graph {
	background-color: #CCC;
	width: 80%;
	height: 20px;
}

.graph-foreground {
	background-color: #D06161;
	height: 20px;
}

.percent {
	width: 10%;
}

.item {
	position: relative;
	clear: both;
	height: 10%;
}

.pic {/*disort pictures for alignment reasons. quick dirty hack*/
	height: 100%;
	width: 10%;
	/*max-width: 10%;
	max-height: 100%;*/
}

.votetotal {
	text-align: center;
	width: 100%;
	font-weight: bold;
	font-size: 150%;
}

h1 {
	font-size: 300%;
	text-align: center;
	color: #D06161;
}

h2 {
	font-size: 150%;
	font-weight: bold;
	color: #D06161;
}

.header {
	width: 80%;
	padding-left: 10%;
	padding-right: 10%;
	padding-top: 1%;
	height: 28%;
    background-image: url('pics/oii_logo.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: left top;
}

.header p {
	font-size: 150%;
	color: #002147;
}




</style>
<script language="JavaScript" src="js/jquery-2.1.4.min.js"></script>
<script language="JavaScript" src="js/dashboard.js"></script>

</head>
<body>

<div class="header">
<h1>Live results</h1>
<p><span style="color: #D06161; font-weight: bold;">Thank you!</span> You have just participated in an experiment on how social information influences choice. These days we are surrounded by social information&mdash;especially on social media&mdash;about what other people are liking, sharing, viewing, following, tweeting, and supporting. In the general election last week, were you influenced by what other people were doing on social media? Or the (wrong) opinion polls? </p>

<p>Half of all participants saw pictures with no additional information, while the other half saw how others before them had voted. Below are the current results for these two conditions. Read more at <a href="http://experiments.oii.ox.ac.uk">http://experiments.oii.ox.ac.uk</a></p>
</div>

<div id="control">
	<h2>No social information</h2>
<?php
for ($i=0;$i<NUMBER_OF_IMAGES;$i++) {
print('
<div class="item" data-id="'.$i.'">
	<img class="pic" src="pics/00'.$i.'.jpg">
	<div class="graph">
		<div class="graph-foreground" style="width: 0%;"></div>
	</div>
	<div class="percent">&nbsp;</div>
</div>
');
}
?>
<div class="item" data-id="votes">
	<div class="votetotal">&nbsp;</div>
</div>
<div class="example invisible">
	<img src="pics/example_control.png">
</div>
</div>


<div id="treatment">
	<h2>With social information</h2>
<?php
for ($i=0;$i<NUMBER_OF_IMAGES;$i++) {
print('
<div class="item" data-id="'.$i.'">
	<img class="pic" src="pics/00'.$i.'.jpg">
	<div class="graph">
		<div class="graph-foreground" style="width: 0%;"></div>
	</div>
	<div class="percent">&nbsp;</div>
</div>
');
}
?>
<div class="item" data-id="votes">
	<div class="votetotal">&nbsp;</div>
</div>
<div class="example invisible">
	<img src="pics/example_treatment.png">
</div>
</div>
</body>
</html>
