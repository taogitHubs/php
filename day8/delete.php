<?php 
if($_SERVER['REQUEST_METHOD']==='GET'){
	fun();
}
function fun(){
	$id=$_GET['id'];
	if(empty($id)){
		return;
	}
	$conn=mysqli_connect('127.0.0.1','root','123.com','demo');
	if (!$conn) {
	  // 如果连接失败报错
	  die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() . '</h1>');
	}
	$query=mysqli_query($conn,"delete from  banji where id=$id;");
	if (!$query) {
	  die('<h1>查询失败</h1>');
	}
	
	$rws=mysqli_affected_rows($conn);
	var_dump($rws);

}

header('Location:/day8/list.php');
