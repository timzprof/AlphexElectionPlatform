<?php
require_once 'ca4nafa3ga.php';

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456";
$strh = str_shuffle($str);
$cid = "CAN19".substr($strh, 0,7);

if(isset($_POST['added'])){
  $vxfname = $_POST['voter_firstname'];
  $vxlname = $_POST['voter_lastname'];
  $vxoname = $_POST['voter_othername'];
	$vxdob = $_POST['voter_dob'];
	$vxadd = $_POST['voter_address'];
  $vxso = $_POST['voter_sorigin'];
  $vxph = $_POST['voter_phone'];
  $success = 

	$sql = "INSERT INTO vxxz_voters (voters_reg_id, voters_firstname,voters_surname,voters_other_name, voters_dob, voters_address, voters_sorigin, voters_phone) VALUES ('$cid', '$vxfname','$vxlname','$vxoname', '$vxdob', '$vxadd', '$vxso', '$vxph')";
	if ($query = $conn->query($sql)) {
		echo "You have been registered to use the Online Election Platform .To Log in: Your registration number=". $cid . "and password=". $vxlname;
	}else{
		echo "error";
	}
?>