<?php
require_once 'ca4nafa3ga.php';

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456";
$strh = str_shuffle($str);
$cid = "ELEC19".substr($strh, 0,7);

if(isset($_POST['setElection'])){
	$extyp = $_POST['election_type'];
	$exyear = $_POST['election_year'];
	$cxs = $_POST['election_state'];

	$sql = "INSERT INTO vxxz_elections (election_id, election_type, election_location, election_year) VALUES ('$cid', '$extyp', '$cxs', '$exyear')";
	if ($query = $conn->query($sql)) {
		echo "success";
	}else{
		echo "error";
	}
}else{
	echo "nothing";
}
?>