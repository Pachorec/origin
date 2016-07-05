
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UFT-8">
<title>メニュー画面</title>
</head>
<body>
<h2>入力</h2>
<form action = "top.php" method = "post">
<input type = "text" name ="comment"><br/>
<input type = "submit" value ="検索">
</form>
</body>
</html>
<?php
  $comment = @$_POST['comment'];
  echo $comment;
?>
