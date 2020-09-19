<?
use yii\helpers\Url;
?>

<section class="box search">
    <form method="post" action="/news/index">
        <input type="text" class="text" name="search" placeholder="Search" />
    </form>
</section>

<p><a class="btn btn-default" href="http://yii2-test.local/news/create">Create</a></p>

<?=$data['search'] ? $data['search'] : 'Net'?>

<table class = "table">
<tr><th>ID</th><th>Title</th><th>Text</th></tr>
<?php
foreach ($model as $val){
    echo "<tr><td>{$val['id']}</td>
          <td>{$val['title']}</td>
          <td>{$val['text']}<a href=\"/news/edit?id=".$val['id']."\" class=\"btn\">Редактировать</a>
          <a href=\"/news/tikdel?id=".$val['id']."\" class=\"btn\">Удалить</a>";
}
?>
</table>

<?
for ($i = 1; $i <= $pages; $i++){
    echo "<a href = \"/news/index/?page=".$i."\">  $i  </a>";
}
?>


