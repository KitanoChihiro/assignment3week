<?php 
  // dbconnect.php
  // DBを操作する共通ファイル

  // Deta Source Name
  $dsn = 'mysql:dbname=assignment_3_weeks;host=localhost';
  // ユーザー名
  $user = 'root';
  // パスワード
  $password = '';
  // Deatbase Handle
  $dbh = new PDO($dsn, $user, $password);
  // SQL文にエラーが有った際、画面にエラーを出力する設定
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // 文字コードの設定
  $dbh->query('SET NAMES utf8');

 ?>