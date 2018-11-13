<?php 
    require_once('dbconnect.php');
    date_default_timezone_set('Asia/Tokyo');
    $time = intval(date('H:i'));
    $day = $time;

    if ('06:00' <= $time && $time<= '11:00') {
        $day = 'おはようございます、ゲストさん';
    }elseif ('11:01' < $time && $time< '17:59') {
        $day = 'こんにちは、ゲストさん';
    }else{
        $day = 'こんばんは、ゲストさん';
    }
    
    $title = [''];
    $contents = [''];


    // データを５件入力するSQL
    // $sql = "INSERT INTO diaries(id, title, contens, created) VALUES (?,?,?,?), (?,?,?,?), (?,?,?,?), (?,?,?,?), (?,?,?,?)";

    // DBから登録した日記の情報を取得する
    $sql = "SELECT `id`, `title`, `contents`, `created` FROM `diaries` WHERE 1 ORDER BY `diaries` . `created` DESC ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    //     //ダイアリーの一覧をいれる配列
    $diaries = [];
    // // // レコードがなくなるまで取得処理
    while (true) {
            // １件ずつフェッチ
            // $record = $diary一件の情報
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        // レコードがなければ処理を抜ける
        if ($record == false) {
            break;
        }
        $diaries[] = $record;
    }
 ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>NexSeed</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="header">
        <div class="header-logo" style="font-family: arial;">NexSeed Diary</div>
        </div>
        
        <br>
        <br>
        <br>
        <br>
        <div class="category">
            <p class="topic"><?php echo $day ?></p>
            <a href=""><p class = "month" ><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("now")); ?></p></a>
            <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-1 month")); ?></p></a>
            <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-2 month")); ?></p></a>
        </div>

        <div class="btn">
            <form action="diary.php" method="POST"><button>新規作成</button></form>
        </div>

        
        <?php foreach ($diaries as $diary): ?>
        <div class="box2">
            <a href=""><p style="font-size: 35px; padding-left: 20px;"><?php echo $diary['title']; ?></p></a>
            <span style="padding-left: 20px;"><?php echo $diary['created']; ?></span>

        <button class="btn-delete">DELETE</button>
        </div>
        <?php endforeach; ?>


        <br>
        <div class="footer">
            <div class="footer-logo">NexSeed</div>
        </div>
    </body>
</html>