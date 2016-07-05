<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UFT-8">
<title>検索画面</title>
</head>
<body>
<h4>ID検索</h4>
<form action = "kekka.php" method = "post">
<input type = "text" name ="comment"><br/>
<input type = "submit" value ="検索">
</form>
</body>
</html>

<?php
$comment = @$_POST['comment'];
//echo $comment;

if (isset($comment)){
  // mysqliクラスのオブジェクトを作成
  $mysqli = new mysqli('localhost', 'root', 'makerere', 'hi-nishimura');
  if ($mysqli->connect_error) {
      echo $mysqli->connect_error;
      exit();
  } else {
      $mysqli->set_charset("utf8");
      //echo 'OK';
      //echo '<br>';
  }

  // ここにDB処理いろいろ書く（後述）
  $sql = "SELECT personalid, name, age FROM TEST WHERE personalid = $comment";
  //$sql = "SELECT personalid, name, age FROM TEST WHERE personalid = '00000001'";
  if ($result = $mysqli->query($sql)) {
      // 連想配列を取得
      while ($row = $result->fetch_assoc()) {
          echo "氏名:" . $row["name"]  . "<br>". "年齢:" . $row["age"] . "<br>";
      }
      // 結果セットを閉じる
      $result->close();
  }
  // DB接続を閉じる
  $mysqli->close();
}else{
  echo '';
}
?>
