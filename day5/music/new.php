<?php 
function fun(){
	$title=isset($_POST['title'])?$_POST['title'] : '';
	if($title === ''){
		echo '填标题';
		return;
	}
	$artist=isset($_POST['artist'])?$_POST['artist'] : '';
	if($artist === ''){
		echo '填歌手';
		return;
	}
	$album=isset($_POST['album'])?$_POST['album'] : '';
	if($album === ''){
		echo '填专辑';
		return;
	}
	
	if($_FILES['source']['error'] !== 0){
		echo "选择文件";
		return;
	}
	$temp_path=$_FILES['source']['tmp_name'];
	$file_name=$_FILES['source']['name'];

	if(!move_uploaded_file($temp_path,'./wenjie/' . $file_name)){
		echo "上传失败";
		return;
	}
	$new_song=array(
		'title' => $title,
		'artist' => $artist,
		'album' => $album,
		'source' => "/day5/music/wenjie/$file_name"
	);
	// $json_contents = json_encode($new_song);
	$json_contents = file_get_contents('storage.json');
	$songs = json_decode($json_contents);
	$songs[] = $new_song;
	// var_dump(json_encode($songs));
	file_put_contents('storage.json', json_encode($songs));
}
if($_SERVER['REQUEST_METHOD']==='POST'){
	fun();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>增加</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
	<div class="container">
		<h1 class="display-3 text-center py-5">音乐列表</h1>
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
	//$title = isset($_POST['title']) ? $_POST['title'] : '';
	//if($title === ''){
	//	echo "请输入标题";
	//}else{
	//	$artist = isset($_POST['artist']) ? $_POST['artist'] : '';
	//	if($artist === ''){
	//		echo "请输入歌手";
	//	}else{
	//		$album = isset($_POST['album']) ? $_POST['album'] : '';
	//		if ($album === '') {
	//			echo "请输入专辑信息";
	//		}else{
	//			if ($_FILES['source']['error'] !== 0) {
	//				echo "没有上传文件";
	//			}else{
	//				$temp_path=$_FILES['source']['tmp_name'];
	//				$file_name=$_FILES['source']['name'];
	//				move_uploaded_file($temp_path,'./wenjie/'. $file_name);
	//			}
	//		}
	//	}
	//}
 ?>