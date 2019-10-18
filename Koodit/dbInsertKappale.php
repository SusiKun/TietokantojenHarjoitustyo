<?php
$host = 'localhost';
$dbname = 't8kuto00';
$username = 't8kuto00';
$password = '';
$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$kappaleenNimi = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'KapNimi', FILTER_SANITIZE_STRING));
$artistinNimi = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'ArtNimi', FILTER_SANITIZE_STRING));
$albuminNimi = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'AlbNimi', FILTER_SANITIZE_STRING));
$Genre = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
$Vuosi = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'Vuosi', FILTER_SANITIZE_STRING));
$sql = "call UusiKappale('$kappaleenNimi','$artistinNimi','$albuminNimi','$Genre','$Vuosi')";
if (!mysqli_query($con, $sql)) {
die('Error: ' . mysqli_error($con));
} echo "
1
record added";
mysqli_close($con);