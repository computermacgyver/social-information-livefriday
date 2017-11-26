<?php
print("{");

include("functions.php");


for ($i=0; $i<2; $i++) {

	$votes=array_pad(array(),NUMBER_OF_IMAGES,0);
	$ranks=array_pad(array(),NUMBER_OF_IMAGES,0);
	$conn = get_connection();

	$query = "SELECT pic,COUNT(*) as cnt FROM votes WHERE treatment=$i GROUP BY pic ORDER BY pic";
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
	$ranks=calculate_ranks_comlete($votes);

	if ($i==0) {
		print('"control":');
	} else {
		print(',"treatment":');
	}
	print('{
		"votes":'.json_encode($votes).',
		"ranks":'.json_encode($ranks).'
		}');

}

print("}");

?> 
