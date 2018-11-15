
<?php 

    require_once('dbconnect.php');

    $id = '';
    $title = '';
    $contents = '';

    // 投稿のするためのif文
    $errors = [];

    if (!empty($_POST)) {
        
        $title = $_POST['title'];
        $contents = $_POST['contents'];

    if ($title == '') {
        $errors['title'] = '空';
    }
    if ($contents == '') {
        $errors['contents'] = '空';
    }

    // もしちゃんと全て登録されていたら登録処理
    if (empty($errors)) {

    // DBにタイトルと本文を登録する
    $sql = "INSERT INTO `diaries`(`id`, `title`, `contents`, `created`) VALUES (?,?,?,NOW())";
    $data = [$id, $title, $contents];
    $stmt = $dbh->prepare($sql);
    $stmt -> execute($data);

    // header('Location: diary.php');
    // exit();
    }
}




 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>EDIT</title>
    <link rel="stylesheet" href="diary.css">
</head>
<body>
    <div class="header">
        <h1 class="header-logo">NexSeed Diary</h1>
    </div>

    <div class="form">
        <form action="diary.php" method="POST">
            <fieldset class="field">
                <h2>title</h2>
                <input  type="text" name="title" class="text" placeholder="タイトルの入力"><br>
                <h2>diary</h2>
                <textarea class="textarea" name="contents" placeholder="本文の入力"></textarea>
                <ul class="submit">
                    <a href="diary.php"><li class="btn-submit"><button type="submit" class="btn" value="post" style="font-size: 15px;">投稿！</button></li></a>
                    <a href="index.php"><li type="submit" class="btn-back" value="" style="font-size: 15px;">戻る</li></a>
                </ul>
            </fieldset>
        </form>
    </div>



    <div class="footer">
        <p class="footer-logo">NexSeed</p>
    </div>
</body>
</html>