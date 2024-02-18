<?php
use Exceptions\RouteNotFoundException;
if (!$params) {
    throw new RouteNotFoundException;
}else{
?>
    <div class="article-display">
        <div class="container post-title">
            <h1><?= $params[0]->title; ?></h1>
            <p class="desc"><?=$params[0]->description?></p>
        </div>
        <?=$params[0]->content;?>
        <div class="end-article">
            <p class="date"> Publié le <?= $params[0]->publication; ?></p>
        </div>
    </div>
<?php
}

