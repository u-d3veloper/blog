<?php

    if (!isset($params)) {
        header('Location:/');
    }else{
        ?>
            <div class="article-display">
                <h1><?= $params['title']; ?></h1>
                <?=$params['content'];?>
            </div>
        <?php
    }

