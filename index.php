<?php 

date_default_timezone_set('Asia/Tokyo');
$time = intval(date('G:i'));
$day = $time;

if (0600 <= $time && $time<= 1100) {
    $day = 'おはようございます、ゲストさん';
}elseif (1101 < $time && $time< 1759) {
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
        
        <div>
            <p class="topic"><?php echo $day ?></p>
            <br>
            <a href=""><p class="topic">2018年11月の日記</p></a>
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