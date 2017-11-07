<?php

// 载入公共的函数文件
require_once 'functions.php';

// 通过一些代码读取数据库中指定的数据

// 1. 建立连接
$conn = db_connect();

// 2. 开始查询
$query = mysqli_query($conn, 'select * from banji;');

// 应该对 query 进行判断

// 3. 遍历结果集
// while ($row = mysqli_fetch_assoc($query)) {
//   var_dump($row);
// }

// 将这些数据渲染到HTML中

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <!-- 只有在网站开发过程中才能使用 / 开头的这种绝对路径 -->
  <link rel="stylesheet" href="/day9/user-crud/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/day9/user-crud/assets/css/style.css">
</head>
<body>
  <?php include '_nav.php'; ?>
  <main class="container">
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="/day9/user-crud/edit.php">添加</a></h1>
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
        <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <tr>
          <th scope="row"><?php echo $row['id']; ?></th>
          <td><img src="<?php echo $row['tx']; ?>" class="rounded" alt="<?php echo $row['name']; ?>"></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['sex'] == 0 ? '♂' : '♀'; ?></td>
          <td><?php echo date('Y')-substr($row['riqi'], 0, 4); ?></td>
          <td class="text-center">
            <a class="btn btn-info btn-sm" href="/day9/user-crud/edit2.php?id=<?php echo $row['id']; ?>">编辑</a>
            <a class="btn btn-danger btn-sm" href="/day9/user-crud/delete.php?id=<?php echo $row['id']; ?>">删除</a>
          </td>
        </tr>
        <?php endwhile; ?>
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
