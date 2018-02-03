<?php
require_once 'ca4nafa3ga.php';

if (isset($_POST['logged'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM vxxz_officers WHERE officers_reg_id = '$username'";
	$query = $conn->query($sql);

	if ($query->num_rows==0) {
		echo "error1";
	}else{
		while ($log = $query->fetch_assoc()) {
			if ($log['officers_password']==$password) {
				session_start();
				$_SESSION['private_officer'] = $log;
				echo "loggedin";
			}else{
				echo "error2";
			}
		}
	}
}
?>