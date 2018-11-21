<?php 
    require_once('dbconnect.php');
    date_default_timezone_set('Asia/Tokyo');
    // intval()はintを文字列型として表示してくれる
    $time = intval(date('H'));
    $day = $time;

    if ('6' <= $time && $time<= '10') {
        $day = 'おはようございます、ゲストさん';
    }elseif ('11' <= $time && $time<= '17') {
        $day = 'こんにちは、ゲストさん';
    }else{
        $day = 'こんばんは、ゲストさん';
    }
    
    $title = [];
    $contents = [];

    // DBから登録した日記の情報を取得する
    $sql = "SELECT * FROM `diaries` WHERE 1 ORDER BY `diaries` . `created` DESC ";
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

    // DBからデータを消去する
    if (isset($_GET['dlt_id'])) {
        $sql = "DELETE FROM `diaries` WHERE `id` = ?";
        $data = [$_GET['dlt_id']];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        header('Location: index.php');
    }


 ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>NexSeed</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="function.js">
        <script type="text/javascript">
            function disp(){
                // 『OK』の時処理開始＋確認ダイアログの表示
                if(window.confirm('削除してもいいですか？')){
                    location.href = "index.php"; // index.php へジャンプ
                }  // ここまで、OKの時の処理
                // ここからキャンセルの時の処理
                else{
                    window.alert('キャンセルしました'); // 警告ダイアログを表示
                }
                // キャンセル処理の終了
            }
        </script>
    </head>
    <body>
        <div class="header">
        <div class="header-logo" style="font-family: arial;">NexSeed Diary</div>
        </div>
        
        <br>
        <br>
        <br>
        <br>
        <div class="side-box">
        <!-- 月の計算 -->
            <div class="category">
                <p class="topic"><?php echo $day ?></p>
                <a href=""><p class = "month" ><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("now")); ?></p></a>
                <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-1 month")); ?></p></a>
                <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-2 month")); ?></p></a>
            </div>

            <div class="btn">
                <div class="new-btn"><a href="diary.php" class="button">New</a></div>
            </div>
        </div>
        
        <div class="main-box">
            <?php foreach ($diaries as $diary): ?>
                <div class="box2">
                    <a href="diary_view.php?diary_id=<?php echo $diary['id']; ?>"><p style="font-size: 35px; padding-left: 20px;"><?php echo $diary['title']; ?></p></a>
                    <span style="padding-left: 20px;"><?php echo $diary['created']; ?></span>
                    <form action="" method="GET">
                        <p><input type="submit" value="DELETE" onClick="disp()" class="btn-delete"></p>
                        <input type="hidden" value="<?php echo $diary['id']; ?>" name="dlt_id">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <br>
        <div class="footer">
            <div class="footer-logo">NexSeed</div>
        </div>
    </body>
</html>