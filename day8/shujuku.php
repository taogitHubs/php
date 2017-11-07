<?php 
$conn=mysqli_connect('127.0.0.1','root','123.com','demo');

$sql='select * from banji';

$query=mysqli_query($conn,$sql);

var_dump($query);
while ($row=mysqli_fetch_assoc($query)) {	
	var_dump($row);
}
// $cd=mysqli_query($conn,'select count(id) from banji');
// $bar=mysqli_fetch_assoc($cd);
// var_dump($bar);
