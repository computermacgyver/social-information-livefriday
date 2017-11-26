<html>
<head>
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
<style>
body,
html {
	margin:0;
	padding:0;
	color:#000;
	overflow: hidden;
	background:#FFF;
	font-family: Helvetica, Arial, sans-serif;
}

.screen {
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0;
	top: 0;
	background:#FFF;
	-webkit-transition: all 1s ease-in-out;
	-moz-transition: all 1s ease-in-out;
	-ms-transition: all 1s ease-in-out;
	-o-transition: all 1s ease-in-out;
	transition: all 1s ease-in-out;
}

#screen1 {
	z-index: 99;
}

#screen2 {
	z-index: 0;
	/*opacity: 0;*/
}

#thanks {
	z-index: 99;
	display: none;
	opacity: 0;
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-ms-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
	background-color: #333;
	color: #FFF;
	width: 100%;
	height: 100%;
	font-size:  130%;
	font-weight: bold;
	text-align: center;
	position: relative;
}

#thanks .content {
	position: absolute;
	left:0;
	top:0;
	right:0;
	bottom:0;
	margin: auto;
	height: 25%;
}

#error {
	z-index: 99;
	display: none;
	background-color: #C00;
	color: #000;
	position: absolute;
	left:0;
	right:0;
	top:0;
	bottom: 0;
	margin: auto;
	width: 75%;
	height: 400px;
	padding: 10px;
	font-size:  130%;
	font-weight: bold;
	text-align: center;
}

#next-button {
	margin-left: auto;
	margin-right: auto;
	padding: 30px;
	text-align: center;
	vertical-align: middle;
	background-color: #62b4f8;
	font-weight: bold;
	font-size: 200%;
}

.header {
	width: 80%;
	padding-left: 10%;
	padding-right: 10%;
	height: 30%;
}

.header p {
	font-size: 125%;
}

#vote {
	width: 100%;
	height: 60%;
	/*vw=1% of viewport width, vh=1% of viewport height*/
	/*max-width: 100vw;	
	max-height: */
}

.uglyhack {
	float:  left;
	width: 2%; /* 16% x 8cols = 96%, push everything left by 2% to center */
	height: 100%;
}

.borderleft {
	border-left: solid 1px;	
}

/*#vote:after {
	content: ' ';
	display: inline-block;
	width:2%;
	height:100%;
}*/



#vote div.col {
	width: 16%;
	height: 100%;
	float: left;
	position: relative;
}

#vote .item.middle {
	position: absolute;
	left: 0;
	top: 0;
	bottom: 0;
	right: 0;
	margin: auto;
	width: auto;
	height: 50%;
	max-width: 90%;
	max-height: 96%;
	text-align: center;
}

#vote .item.top, #vote .item.bottom {
	position: relative;
	left: 0;
	top: 0;
	bottom: 0;
	right: 0;
	margin: auto;
	width: auto;
	height: 50%;
	max-width: 90%;
	max-height: 96%;
	text-align: center;
}


#vote .pic {
	width: auto;
	height: auto;
	max-width: 100%;
	max-height: 100%;
}

.social_info {
	text-align: right;
	font-size: 100%;
	width: 100%;
}

h1 {
	font-size: 150%;
	text-align: center;
}


/*#intro p {
	font-size: 24pt;
}*/


/* ============================================================================================================================
== OVAL THOUGHT BUBBLE (more CSS3)
** ============================================================================================================================ */
.trending {
	display: none;
	position:absolute;
	left: -10px;
	top: -30px;
	width: 120px;
	height: 20px;
	padding:10px 15px; /*top/bottom left/right*/
	text-align:center;
	color:#fff;
	background:#075698;
	/* css3 */
	background:-webkit-gradient(linear, 0 0, 0 100%, from(#2e88c4), to(#075698));
	background:-moz-linear-gradient(#2e88c4, #075698);
	background:-o-linear-gradient(#2e88c4, #075698);
	background:linear-gradient(#2e88c4, #075698);
	/*
	NOTES:
	-webkit-border-radius:220px 120px; // produces oval in safari 4 and chrome 4
	-webkit-border-radius:220px / 120px; // produces oval in chrome 4 (again!) but not supported in safari 4
	Not correct application of the current spec, therefore, using longhand to avoid future problems with webkit corrects this
	*/
	-webkit-border-top-left-radius:220px 220px;
	-webkit-border-top-right-radius:220px 220px;
	-webkit-border-bottom-right-radius:220px 220px;
	-webkit-border-bottom-left-radius:220px 220px;
	-moz-border-radius:220px / 220px;
	border-radius:220px / 220px;
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);

}

.trending p {
	margin-top: 0px;
	padding: 0px;
}




</style>
<script language="JavaScript" src="js/jquery-2.1.4.min.js"></script>
<script language="JavaScript" src="js/app_logic.js"></script>
</head>
<body>

<!--Screen 1: Welcome-->
<div id="screen1" class="screen">
<div class="header">
	<h1>Please participate!</h1>
	<p><strong>Which is your favourite?</strong> On the next page, we will show you the pictures from the "kisses" section of the Gillrary exhibition and ask you to indicate your favourite.</p>

	<p>Please <strong>vote individually and do not discuss</strong> your vote until after you leave the room.</p>

	<div id="next-button">
		<div id="next-text">Next</div>
	</div>
</div>
</div>

<!--Screen 2: Vote-->
<div id="screen2" class="screen">
<div class="header">
	<h1>Which is your favourite?</h1>
	<p>Below are the pictures from the "kisses" section of the Gillray exhibition. Please <strong>tap on your favourite</strong> picture.</p>
	<p>Please <strong>vote individually and do not discuss</strong> your votes until after you leave the room.</p>
</div>

<div id="vote">
<div class="uglyhack"></div>
<div class="col">
	<div class="item middle">
			<div class="trending"></div>
			<img id="img1" class="pic" data-id="0" src="pics/000.jpg">
			<div class="social_info">votes so far!</div>
	</div>
</div>
<div class="col">
	<div class="item top">
		<div class="trending"></div>
		<img id="img2" class="pic" data-id="1" src="pics/001.jpg">
		<div class="social_info">votes so far!</div>
	</div>
	<div class="item bottom">
		<div class="trending"></div>
		<img id="img3" class="pic" data-id="2" src="pics/002.jpg">
		<div class="social_info">votes so far!</div>
	</div>
</div>
<div class="col borderleft">
	<div class="item middle vertical">
		<div class="trending"></div>
		<img id="img4" class="pic" data-id="3" src="pics/003.jpg">
		<div class="social_info">votes so far!</div>
	</div>
</div>
<div class="col">
	<div class="item top">
		<div class="trending"></div>
		<img id="img5" class="pic" data-id="4" src="pics/004.jpg">
		<div class="social_info">votes so far!</div>
	</div>
	<div class="item bottom">
		<div class="trending"></div>
		<img id="img6" class="pic" data-id="5" src="pics/005.jpg">
		<div class="social_info">votes so far!</div>
	</div>
</div>
<div class="col borderleft">
	<div class="item top">
		<div class="trending"></div>
		<img id="img7" class="pic" data-id="6" src="pics/006.jpg">
		<div class="social_info">votes so far!</div>
	</div>
	<div class="item bottom">
		<div class="trending"></div>
		<img id="img8" class="pic" data-id="7" src="pics/007.jpg">
		<div class="social_info">votes so far!</div>
	</div>
</div>
<div class="col">
	<div class="item middle">
		<div class="trending"></div>
		<img id="img9" class="pic" data-id="8" src="pics/008.jpg">
		<div class="social_info">votes so far!</div>
	</div>
</div>
</div>
</div>

<!--Screen3: Thank you-->
<div id="thanks">
	<div class="content"><p>Thank you for participating. Your vote has been recorded.</p></div>
</div>

<!--Screen4: Json Error-->
<div id="error">
	<p>Error. Could not record vote. Please report this issue.</p>
</div>
</body>
</html>
