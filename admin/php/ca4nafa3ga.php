<?php
// include 'fxx3nacata1144nasa.php';

$host = '127.0.0.1';
$user = 'timilehi_alphex';
$pass = 'alphexcoding@';
$db = 'timilehi_alphex';
$conn = new mysqli($host, $user, $pass, $db);

function redirect($location){
    header("Location:".$location);
    }
function logged(){
    if(isset($_SESSION['private_officer']) == true && $_SESSION['private_officer'])
				{
					return true;
				}else{
					 redirect("login.html");

				}
}
?>