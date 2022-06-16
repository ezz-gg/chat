<?php
$fp = fopen('data.txt', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $content = htmlentities($content, ENT_QUOTES, 'UTF-8');
    $name = $_POST['name'];
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    fputcsv($fp, [$name,str_replace("\n", "<br>", $content),$_SERVER['REMOTE_ADDR']]);
    rewind($fp);
}
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="description" content="掲示板です">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>zearadiscord - chat-system</title>
<style>
		body {
		    background-color: #191c24;
		    text-align:center;
		    color: white;
		}
    </style>





  

  
</head>
<body>
<h1>zearadiscord chat-system</h1>
<section class="toukou">
 <h2>投稿一覧</h2>

 <?php if (!empty($rows)): ?>
 <div class="talk_left">
 <ul>
<?php foreach ($rows as $row): ?>


        <li><?=$row[0]?>さん <br> <?=$row[1]?></li><br><br>
<?php endforeach; ?>
    </ul>
    <div>
<?php else: ?>
    <p>投稿はまだありません</p>
<?php endif; ?>
</section>


<section>
<h2>投稿フォーム</h2>
    <form action="" method="post">
        <div><span class="label">お名前:</span><input class="namebox" type="text" name="name" value="" maxlength="15" placeholder="15字以内で入力してください。" required></div>
        <div><span class="label">本文:</span><textarea class="contentbox" name="content" cols="30" rows="3" maxlength="200" wrap="hard" placeholder="200字以内で入力してください。" required></textarea></div>
<br>
        <input type="submit" value="投稿">
    </form>
</section>

<br>
<br>
<h6>© zearadiscord. All rights Reserved.</h6>
</body>
</html>
