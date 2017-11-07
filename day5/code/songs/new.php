<?php
/**
 * [parse_params description]
 * @return [type] [description]
 */
function parse_params () {
  $title = isset($_POST['title']) ? $_POST['title'] : '';
  if ($title === '') {
    echo "标题都没填";
    return;
  }

  // 只有上一个条件满足的情况下才会往下执行
  $artist = isset($_POST['artist']) ? $_POST['artist'] : '';
  if ($artist === '') {
    echo "必须有一个艺术家";
    return;
  }

  $album = isset($_POST['album']) ? $_POST['album'] : '';
  if ($album === '') {
    echo "必须有一个专辑";
    return;
  }

  if ($_FILES['source']['error'] !== 0) {
    echo "必须选一个文件";
    return;
  }

  // 当前表单提交的文件临时路径
  $temp_path = $_FILES['source']['tmp_name'];
  // 文件名
  $file_name = $_FILES['source']['name'];

  // 移动文件到网站根目录以内
  // 如果网站需要处理上传文件功能呢一定注意设置一个合理的 upload_max_filesize
  if (!move_uploaded_file($temp_path, './upload/' . $file_name)) {
    echo "上传失败";
    return;
  }

  // 组织一个新的数据
  $new_song = array(
    'title' => $title,
    'artist' => $artist,
    'album' => $album,
    'source' => "/songs/upload/$file_name"
  );

  // 3. 将数据转换为 JSON 保存到 storage.json 中
  $json_contents = file_get_contents('storage.json');

  // 将文件内容转换为 一个数组
  $songs = json_decode($json_contents);

  $songs[] = $new_song;

  // 因为$songs 中包括原有数据 所以这里是覆盖写入
  file_put_contents('storage.json', json_encode($songs));

  // $json_contents = json_encode($new_song);

  // file_put_contents('storage.json', $json_contents);
  //
  // 将数据转换为 JSON 字符串 过程叫做 序列化
  // 反之叫做反序列化

  // 4. 反馈（响应）
  header('Location: list.php');
}

// 1. 区分是 GET 还是 POST ，因为只有 POST 才有必要处理保存逻辑
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 2. 接收表单提交的数据（数据校验）
  parse_params();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加一首歌</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container">
    <h1 class="display-3 text-center py-5">添加一首歌</h1>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control form-control-lg" id="title" name="title">
        <small class="form-text text-muted">音乐标题</small>
      </div>
      <div class="form-group">
        <label for="artist">艺术家</label>
        <input type="text" class="form-control form-control-lg" id="artist" name="artist">
        <small class="form-text text-muted">音乐艺术家</small>
      </div>
      <div class="form-group">
        <label for="album">专辑</label>
        <input type="text" class="form-control form-control-lg" id="album" name="album">
        <small class="form-text text-muted">音乐专辑</small>
      </div>
      <div class="form-group">
        <label for="source">文件</label>
        <input type="file" class="form-control form-control-lg" id="source" name="source">
        <small class="form-text text-muted">音乐文件</small>
      </div>

      <button type="submit" class="btn btn-lg btn-block btn-primary">保存</button>
    </form>
  </div>
</body>
</html>

<?php
  // $title = isset($_POST['title']) ? $_POST['title'] : '';
  // if ($title === '') {
  //   echo "会不会玩";
  // } else {
  //   $artist = isset($_POST['artist']) ? $_POST['artist'] : '';
  //   if ($artist === '') {
  //     echo "需要填写歌手信息";
  //   } else {
  //     $album = isset($_POST['album']) ? $_POST['album'] : '';
  //     if ($album === '') {
  //       echo "需要专辑信息";
  //     } else {
  //       if ($_FILES['source']['error'] !== 0) {
  //         echo "必须上传文件";
  //       } else {
  //         $temp_path = $_FILES['source']['tmp_name'];
  //         $file_name = $_FILES['source']['name'];
  //         // 移动文件到指定目录
  //         // 如果移动到一个不存在的文件夹会报错
  //         move_uploaded_file($temp_path, './upload/' . $file_name);

  //         echo $title;
  //         echo $artist;
  //         echo $album;
  //       }
  //     }
  //   }
  // }
 ?>
