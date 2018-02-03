<?php
require_once 'ca4nafa3ga.php';

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456";
$strh = str_shuffle($str);
$cid = "CAN19".substr($strh, 0,7);

if(isset($_POST['created'])){
	$cxname = $_POST['candidate_name'];
	$cxdob = $_POST['candidate_dob'];
	$cxelect = $_POST['candidate_election'];
	$cxten = $_POST['candidate_tenure'];
	$cxpar = $_POST['candidate_party'];
	$cxsle = $_POST['candidate_election_state'];

	$sql = "INSERT INTO vxxz_candidates (candidates_id, candidates_name, candidates_dob, candidates_party, candidates_tenure, candidates_election, candidates_location) VALUES ('$cid', '$cxname', '$cxdob', '$cxpar', '$cxten', '$cxelect', '$cxsle')";
	if ($query = $conn->query($sql)) {
		echo "success";
	}else{
		echo "error";
	}
}else{
	echo "nothing";
}
?>