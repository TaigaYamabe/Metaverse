<?php
     $a = 10;
?>
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
            width   : 80%;
            height  : 80%;
            touch-action: none;
        }
    </style>
</head>
<body>
<header id="header">
    <!-- 
    actionはindex.phpのWeb アクセス用 URL
    -->
    <form method="post" action="index.php" enctype="multipart/form-data" id="form1">
        <input type="file" name="file1">
            <!-- <input type="button" value="送信" id="submit-button"> -->
        <button type="button" id="submit-button1">3Dモデルアップロード</button>
            <!-- <input type="file" name="file2">
            <button type="button" id="submit-button">空間アップロード</button></p>  -->
    </form>
    <form method="post" action="index.php" enctype="multipart/form-data" id="form2">
        <input type="file" name="file2">
            <!-- <input type="button" value="送信" id="submit-button"> -->
        <button type="button" id="submit-button2">空間アップロード</button>
            <!-- <input type="file" name="file2">
            <button type="button" id="submit-button">空間アップロード</button></p>  -->
    </form>
    <!-- <form method="post" action="http://localhost/index2.php" enctype="multipart/form-data" id="form">
        <input type="file" name="file2">
        <button type="button" id="submit-button">3Dモデルアップロード</button> 
    </form> -->
    <canvas id="renderCanvas"></canvas>
</header>
    <script>
        const form1 = document.getElementById("form1")
        const form2 = document.getElementById("form2")
        const submitButton1 = document.getElementById("submit-button1")
        const submitButton2 = document.getElementById("submit-button2")

submitButton1.onclick = () => {
  const formData = new FormData(form1)
  const action = form1.getAttribute("action")
  const options = {
    method: 'POST',
    body: formData,
  }
  fetch(action, options).then((e) => {
  })
}
submitButton2.onclick = () => {
  const formData = new FormData(form2)
  const action = form2.getAttribute("action")
  const options = {
    method: 'POST',
    body: formData,
  }
  fetch(action, options).then((e) => {
  })
}

    </script>

<?php
if(empty($_COOKIE['wepicksCookieData'])){
 echo 'ブラウザを更新して下さい。';
}else{
 echo '$_COOKIE[\'wepicksCookieData\']の出力:'.$_COOKIE['wepicksCookieData']."<br/>\n";
}
?>
    <!-- Babylon.jsとSceneLoaderの読み込み-->
    <script src="https://preview.babylonjs.com/babylon.js"></script>
    <script src="https://preview.babylonjs.com/loaders/babylonjs.loaders.min.js"></script>

    <!-- これから作成するscript.jsの読み込み-->
    <script type="text/javascript" src=js/script.js></script>
    <?php
     $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
     $data = json_decode($raw); // json形式をphp変数に変換
     //header("Content-type: text/plain; charset=UTF-8");
     if(isset($data->name)){
     setcookie('wepicksCookieData',$data->name);
     }
?>
    <button onclick="location.href='3D.php'">更新</button>
    
     
    <form id="contactForm" name="contactForm" method="post">
        <p class="more"><input id="send" type="submit" value="送る"></p>
    </form>
    
</body>
</html>