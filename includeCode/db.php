<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_TABLE','wefinalproject');

//$conn = mysqli_connect('localhost','root','','wefinalproject');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_TABLE);
// if($conn){
//     echo "Connect established";
// }
// else{
//     echo "Connect Not established";
// }
?>