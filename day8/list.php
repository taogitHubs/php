
<?php 
$conn=mysqli_connect('127.0.0.1','root','123.com','demo');
if (!$conn) {
  // 如果连接失败报错
  die('<h1>Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() . '</h1>');
}
$query=mysqli_query($conn,'select * from banji;');
if (!$query) {
  die('<h1>查询失败</h1>');
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="/day8/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/day8/assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/day8/list.php">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="/day8/edit.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
       <?php while ($row = mysqli_fetch_assoc($query)) { ?>
		<tr>
          <th scope="row"><?php echo $row['id'] ?></th>
          <td><img src=<?php echo "assets/img/".$row['tx'] ?> class="rounded" alt=<?php echo $row['name'] ?>></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['sex'] ==='1'? '♂':'♀' ?></td>
          <td><?php echo date('Y') - explode("-", $row['riqi'])[0] ?></td>
          <td class="text-center">
            <a class="btn btn-info btn-sm" href="#">编辑</a>
            <a class="btn btn-danger btn-sm" href="/day8/delete.php?id=<?php echo $row['id']?>">删除</a>
          </td>
        </tr>	
		<?php } ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>
