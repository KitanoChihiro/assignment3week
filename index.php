<?php 

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
        <div style="width: 100px;">
            <p class="topic"><?php echo $day ?></p>
            <a href=""><p class = "month" ><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("now")); ?></p></a>
            <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-1 month")); ?></p></a>
            <a href=""><p class="month"><?php echo date('Y' . '年' . 'm' . '月の日記', strtotime("-2 month")); ?></p></a>
        </div>

        <div class="box">
            <a href=""><p style="font-size: 40px; padding-left: 20px;">こんにちは</p></a>
            <p style="padding-left: 20px;">2018年11月6日</p>
        </div>

        <div class="box">
            <a href=""><p style="font-size: 40px; padding-left: 20px;">こんにちは</p></a>
            <p style="padding-left: 20px;">2018年11月6日</p>
        </div>

        <div class="box">
            <a href=""><p style="font-size: 40px; padding-left: 20px;">こんにちは</p></a>
            <p style="padding-left: 20px;">2018年11月6日</p>
        </div>

        <div class="box">
            <a href=""><p style="font-size: 40px; padding-left: 20px;">こんにちは</p></a>
            <p style="padding-left: 20px;">2018年11月6日</p>
        </div>


        
        <br>


        <div class="footer">
            <div class="footer-logo">NexSeed</div>
        </div>
    </body>
</html>