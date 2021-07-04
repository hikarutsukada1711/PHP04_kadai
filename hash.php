<?php

//パスワードをハッシュ化
$pw2 = password_hash('test2',PASSWORD_DEFAULT);
$pw3 = password_hash('test3',PASSWORD_DEFAULT);


echo $pw2 ;
echo "区切り";
echo $pw3 ;

?>
