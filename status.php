<?php
print("{");

include("functions.php");

$treatment= (mt_rand(0,99)<50)? 0:1;
$votes=array_pad(array(),NUMBER_OF_IMAGES,0);
$ranks=array_pad(array(),NUMBER_OF_IMAGES,0);
if ($treatment) {
	$conn = get_connection();

	$query = "SELECT pic,COUNT(*) as cnt FROM votes WHERE treatment=1 GROUP BY pic ORDER BY pic";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc()) {
		if ($row["pic"]!="") {
			$pic=(int)$row["pic"];
			$val=(int)$row["cnt"];
			$votes[$pic]=$val;
		}
	}
	$conn->close();
	//Calculate ranks
	$ranks=calculate_ranks($votes);
}

print('
	"treatment":'.$treatment.',
	"votes":'.json_encode($votes).',
	"ranks":'.json_encode($ranks));
print("\n");
print("}");
?> 
