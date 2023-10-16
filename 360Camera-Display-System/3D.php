<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Scene</title>
    <style>
        html, body {
            overflow: scroll;
            width   : 100%;
            height  : 100%;
            margin  : 0;
            padding : 0;
        }

        #renderCanvas {
            width   : 100%;
            height  : 100%;
            touch-action: none;
        }
    </style>
</head>
<body>
<header id="header">
    <!-- 
    actionはindex.phpのWeb アクセス用 URL
    -->
    <form enctype="multipart/form-data"  action="index.php" method="POST">
        <input type="file" name="file1" value="value" />
        <input type="submit" value="3Dモデルアップロード" />
    </form>


    <form enctype="multipart/form-data"  action="index.php" method="POST">
        <input type="file" name="file2" value="value" />
        <input type="submit" value="空間アップロード" />
    </form>
    <!-- <form method="post" action="http://localhost/index2.php" enctype="multipart/form-data" id="form">
        <input type="file" name="file2">
        <button type="button" id="submit-button">3Dモデルアップロード</button> 
    </form> -->
    <canvas id="renderCanvas"></canvas>
</header>
    <script>
//         const form1 = document.getElementById("form1")
//         const form2 = document.getElementById("form2")
//         const submitButton1 = document.getElementById("submit-button1")
//         const submitButton2 = document.getElementById("submit-button2")

// submitButton1.onclick = () => {
//   const formData = new FormData(form1)
//   const action = form1.getAttribute("action")
//   const options = {
//     method: 'POST',
//     body: formData,
//   }
//   fetch(action, options).then((e) => {
//   })
// }
// submitButton2.onclick = () => {
//   const formData = new FormData(form2)
//   const action = form2.getAttribute("action")
//   const options = {
//     method: 'POST',
//     body: formData,
//   }
//   fetch(action, options).then((e) => {
//   })
// }

    </script>

<!-- ?php
if(empty($_COOKIE['Cookie0'])){
 echo 'ブラウザを更新して下さい。';
//  $sample0 = 0;
//  $sample1 = "20";
//  $sample2 = 0;
// $sample = 0;
}else{
   // echo 'x:'.$_COOKIE['Cookie0']."<br/>\n".'y:'.$_COOKIE['Cookie1']."<br/>\n".'z:'.$_COOKIE['Cookie2']."<br/>\n";
 //echo '出力:'.$_COOKIE['Cookie0']."<br/>\n".$_COOKIE['Cookie1']."<br/>\n".$_COOKIE['Cookie2']."<br/>\n";
 //$serializedArray= $_COOKIE['wepicksCookieData'];
 //$sample = unserialize($serializedArray);
//  $sample0 = $_COOKIE['Cookie0'];
//  $sample1 = $_COOKIE['Cookie1'];
//  $sample2 = $_COOKIE['Cookie2'];
//  $sample = $_COOKIE['Cookie0'];
}
?-->

    <!-- Babylon.jsとSceneLoaderの読み込み-->
    <script src="https://preview.babylonjs.com/babylon.js"></script>
    <script src="https://preview.babylonjs.com/loaders/babylonjs.loaders.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- これから作成するscript.jsの読み込み-->
 
    <?php
// CSVファイルのパス
$csvFilePath = './csv/example.csv';

// 配列でデータを保持するための変数
$phpArray = array();

// CSVファイルを読み込む
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // CSVの各行を配列に変換して追加
        $phpArray[] = $data;
    }
    fclose($handle);
}

// 配列の内容を表示してテスト
//var_dump($phpArray);
?>

<script>
var jsArray = <?php echo json_encode($phpArray); ?>;
</script>
    <script type="text/javascript" src=js/script.js></script>

    <?php
    //  $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
    //  $data = json_decode($raw, true); // json形式をphp変数に変換
     //header("Content-type: text/plain; charset=UTF-8");
    //  foreach ($data as $item) {
    //     echo $item . "<br>";
    // }

    //  if(isset($data[0])){
    //  setcookie('Cookie0',$data[0]);
    //  setcookie('Cookie1',$data[1]);
    //  setcookie('Cookie2',$data[2]);
    //  }
    ?>

    <button onclick="location.href='3D.php'">更新</button>
</body>
</html>