<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET["id"];

echo $id;  //逐次 echoでデータができてるか確認したほうが良い。

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

//実行
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch(); //resultのなかに、データが入ってきてる。
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_kadai2.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update_user_list.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>ユーザー名：<input type="text" name="name" value="<?= $result['name'] ?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $result['lid'] ?>"></label><br>
                <label>PW：<input type="text" name="lpw" value="<?= $result['lpw'] ?>"></label><br>
                <label>ID：<input type="int" name="kanri_flg" value="<?= $result['kanri_flg'] ?>"></label><br>
                <label>ID：<input type="text" name="life_flg" value="<?= $result['life_flg'] ?>"></label><br>
                <input type="hidden" name="id" value="<?= $result['id']?>"> 
                <!-- 上の一行がないと、送ってもできない？ -->
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
