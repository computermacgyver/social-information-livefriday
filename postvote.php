<?php
print("{");

//$body = file_get_contents('php://input');

if (array_key_exists("pic",$_GET) && $_GET["pic"]!="" && array_key_exists("treatment",$_GET) && $_GET["treatment"]!="") {
	$ip=$_SERVER["REMOTE_ADDR"];
	$datetime=new DateTime();
	$datetime=$datetime->getTimestamp();
	$vote=$_GET["pic"];
	$treatment=$_GET["treatment"];

	if (!is_numeric($vote)) {
		//throw new Exception('Invalid value for vote variable.');
		print('"error":"Invalid value for pic variable."');
	} elseif  (!is_numeric($treatment)) {
		//throw new Exception('Invalid value for treatment variable.');
		print('"error":"Invalid value for treatment variable."');
	} else {
		try {
			include("functions.php");
			$conn = get_connection();
			$stmt = $conn->prepare("INSERT INTO votes (ip,datetime,pic,treatment) VALUES (?,?,?,?)");
			$stmt->bind_param('siii',$ip,$datetime,$vote,$treatment);
			$stmt->execute();
			$stmt->close();
			$conn->close();
			print('"vote":{
				"pic":' . $vote . ',
				"treatment":'. $treatment .
				'}');
		} catch (Exception $e) {
			print('"error":" mysql:'. str_replace('"','\"',$e->getMessage()).'"');
		}
	}
} else {
	print('"error":"No vote data."');
}

print("}");
?> 
