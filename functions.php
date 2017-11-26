<?php

const NUMBER_OF_IMAGES = 9;

function mt_shuffle ($arr) {
	for($i=count($arr)-1;$i>0; $i--) {
		#print("!$i:");
		$j=mt_rand(0,$i);
		#print($j);
		$tmp=$arr[$i];
		$arr[$i]=$arr[$j];
		$arr[$j]=$tmp;
	}
	return($arr);
}

function calculate_ranks($arr) {
	$ranks=array_pad (array(), count($arr), -1);

	$num=0;
	
	$rank1=find_max($arr);
	
	if (count($rank1)>NUMBER_OF_IMAGES/2 || count($rank1)==0) {
		return $ranks; //Over half the images are at this position, don't try to rank them.
	} elseif (count($rank1)>1) {//Randomly select one to be trending
		$rank1=mt_shuffle($rank1);
	}

	for ($i=0;$i<count($rank1) && $num<3; $i++) {
		$num++;
		$ranks[$rank1[$i]]=$num;
	}
	
	if (count($rank1)>=3) {
		return $ranks;
	}

	$rank2=find_max($arr,$arr[$rank1[0]]);
	if (count($rank2)>NUMBER_OF_IMAGES/2|| count($rank2)==0) {
		return $ranks;
	} elseif (count($rank2)>1) {//Randomly select one to be trending
		$rank2=mt_shuffle($rank2);
	}
	for ($i=0;$i<count($rank2) && $num<3; $i++) {
		$num++;
		$ranks[$rank2[$i]]=$num;
	}
	
	if (count($rank1)+count($rank2)<3) {
		$rank3=find_max($arr,$arr[$rank2[0]]);
		if (count($rank3)>NUMBER_OF_IMAGES/2|| count($rank3)==0) {
			return $ranks;
		} elseif (count($rank2)>1) {//Randomly select one to be trending
			$rank3=mt_shuffle($rank3);
		}
		for ($i=0;$i<count($rank3) && $num<3; $i++) {
			$num++;
			$ranks[$rank3[$i]]=$num;
		}
	}
	
	return($ranks);
}

function find_max($arr,$maxval=null) {
	//Search array to find largest value(s) that is less than $maxval
	$ret_val=array();
	$max_index=0;
	if ($maxval!=null) {
		while ($max_index<count($arr) && $arr[$max_index]>=$maxval) {
			$max_index++;
		}
	}
	if ($max_index<count($arr)) {
		$ret_val[]=$max_index;
		for ($i=$max_index+1; $i<count($arr); $i++) {
			if ($arr[$i]>$arr[$max_index] && ($maxval==null || $arr[$i]<$maxval)) {
				$max_index=$i;
				$ret_val=array($i);
			} elseif ($arr[$i]==$arr[$max_index]) {
				$ret_val[]=$i;
			}
		}
	}
	
	return $ret_val;
}

function calculate_ranks_comlete($arr) {
	$ranks=array(); #array_pad (array(), count($arr), -1)
	for ($i=0; $i<count($arr); $i++) {
		$ranks["$i"]=$arr[$i];
	}
	#Note: arsort does not break ties randomly!
	arsort($ranks); #sort by value, high to low
	$keys=array_flip(array_keys($ranks));
	ksort($keys);
	$keys=array_values($keys);

	/*print("Input:");
	print_r($arr);
	print("Sorted:");
	print_r($ranks);
	print("Keys:");
	print_r($keys);*/

	return($keys);
}


function get_connection() {
	include("settings.php");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return($conn);
}
?>
