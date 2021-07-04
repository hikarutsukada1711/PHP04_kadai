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
    <div class="navbar-header"><a class="navbar-brand" href="select_kadai.php">データ一覧(select_ログイン不要)</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="resi_user_list.php">ユーザー登録</a></div>

    <?php session_start(); if ($_SESSION['kanri_flg'] == 1)  : ?>
    <div class="navbar-header"><a class="navbar-brand" href="select_kadai2.php">(管理者)データ削除</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="user_list.php">(管理者)ユーザーリスト</a></div>

    <?php session_start(); else : ?>
      <div class="navbar-header"><a class="navbar-brand" href="shinsei.php">管理者申請を行う</a></div>
    <?php endif ; ?>

    <?php
    //SESSIONスタート
    session_start(); 
    if ($_SESSION['kanri_flg'] == 1){
      echo $_SESSION['name']."さん " ;
      echo "あなたは管理者権限があります";
    }
    else{
      echo "あなたは管理者ではありません";
    }
    ?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert_kadai.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本をブックマークする</legend>
     <label>書籍名：<input type="text" name="bookname"></label><br>
     <label>書籍URL：<input type="text" name="bookurl"></label><br>
     <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
