<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p><?php
// ファイルへのパス
$path = './Models/';
// ファイルがアップロードされているかと、POST通信でアップロードされたかを確認
if( !empty($_FILES['file1']['tmp_name']) && is_uploaded_file($_FILES['file1']['tmp_name']) ) {
	// ファイルを指定したパスへ保存する
	$name = $_FILES['file1']['name'];
	// if( move_uploaded_file( $_FILES['file1']['tmp_name'], "$path/$name") ) {
	// 	echo 'アップロードされたファイルを保存しました。';
	// } else {
	// 	echo 'アップロードされたファイルの保存に失敗しました。';
	// }

	if( move_uploaded_file( $_FILES['file1']['tmp_name'], $path.'upload.obj') ) {
		echo 'アップロードされたファイルを保存しました。';
	} else {
		echo 'アップロードされたファイルの保存に失敗しました。';
	}
}
if( !empty($_FILES['file2']['tmp_name']) && is_uploaded_file($_FILES['file2']['tmp_name']) ) {
	// ファイルを指定したパスへ保存する
	if( move_uploaded_file( $_FILES['file2']['tmp_name'], $path.'space.glb') ) {
		echo 'アップロードされたファイルを保存しました。';
	} else {
		echo 'アップロードされたファイルの保存に失敗しました。';
	}
}
?></p>
</body>
</html>