<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>text</title>
</head>
<body>
<?php
$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

// функция обработки текста
function truncate_text_with_html($text, $max_words) {
    // Удаляем все HTML-теги, чтобы подсчитать количество слов в чистом тексте
    $plain_text = strip_tags($text);
    
    // Разбиваем текст на слова
    $words = explode(' ', $plain_text);

    // Если количество слов больше максимального, обрезаем текст
    if (count($words) > $max_words) {
        $words = array_slice($words, 0, $max_words);
        $plain_text = implode(' ', $words) . '...';
    }

    
    $end_pos = mb_strpos($text, implode(' ', array_slice($words, -5))) + mb_strlen(implode(' ', array_slice($words, -5)));

    // обработанный текст
    return mb_substr($text, 0, $end_pos) . '...';
}

$truncated_text = truncate_text_with_html($text, 29);
echo $truncated_text;
?>

</body>
</html>

