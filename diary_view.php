<?php 
    require_once('dbconnect.php');


    date_default_timezone_set('Asia/Tokyo');
    // intval()はintを文字列型として表示してくれる
    $time = intval(date('H'));
    $day = $time;

    if ('6' <= $time && $time<= '10') {
        $day = 'おはようございます <br> ゲストさん';
    }elseif ('11' <= $time && $time<= '17') {
        $day = 'こんにちは、ゲストさん';
    }else{
        $day = 'こんばんは、ゲストさん';
    }



    // $_GET['diary_id'](index.phpの中で指定されたGET)が存在するかしないか
    if (isset($_GET['diary_id'])) {
        // 投稿内容の取得
        $sql = "SELECT `title`, `contents` FROM `diaries` WHERE `id` = ? ";
        $data = [$_GET['diary_id']];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        // 投稿内容をいれる配列
        $diaries = [];
        // レコードがなくなるまで取得処理
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
    }



 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>DIARY</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="view.css">
</head>
<body>
    
    <div class="header">
        <div class="header-logo" style="font-family: arial;">NexSeed Diary</div>
    </div>


        <div class="side-box">
            <!-- 月の計算 -->
                <div class="category">
                    <p class="topic"><?php echo $day ?></p>
                    <a href=""><p class = "month" ><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("now")); ?></p></a>
                    <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-1 month")); ?></p></a>
                    <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-2 month")); ?></p></a>
                </div>
        </div>
            

        <?php foreach ($diaries as $diary): ?>
            <div class="main-box">
                <div>
                    <div>
                        Title
                        <div class="title" name='title' style="font-size: 20px;">
                            <?php echo $diary['title'];?>
                        </div>
                    </div>
                    <br><br>
                    <div>
                        Diary
                        <div class="diary" name='contents' style="font-size: 30px;">
                            <?php echo $diary['contents']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <div class="footer">
        <div class="footer-logo">NexSeed</div>
    </div>

</body>
</html>
