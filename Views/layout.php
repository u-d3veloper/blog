<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'nav.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'layout.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'post-layout.css' ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.css"
        integrity="sha512-tx5+1LWHez1QiaXlAyDwzdBTfDjX07GMapQoFTS74wkcPMsI3So0KYmFe6EHZjI8+eSG0ljBlAQc3PQ5BTaZtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/brands.js"
        integrity="sha512-0UA7io57fgCWfsOxPI1m/0lWix1Z7Y/XzdlrXOMv02hrwQKBZvRfXroby6Rf5TcUNjQVY8OlHqffnxth8b5QWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.js"
        integrity="sha512-HAXr8ULpyrhyIF0miP+mFTwOagNI+UVA38US1XdtBbkU7mse59ar0ck4KBil/jyzkTO37DWLfRQvEeUWgwHu0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <title>Mon super site</title>
</head>

<body>

    <div class="nav">
        <p><a href="/">Projet@Sciences</a></p>
        <ul>
            <li>
                <a href="/posts?ref=ressources-welcome">Ressources</a>
            </li>
            <li>
                <a href="/teaching?ref=cours-welcome">Espace enseignement</a>
            </li>
            <li>
                <a href="/about">A propos</a>
            </li>
            <li id="connect-button">
                <a href="/login">Se connecter</a>
            </li>
        </ul>
    </div>

    <div class="struct">
        <?php
        if ($params) {
            echo '<div class="toggle-lateral-nav">
                <ul>';
                foreach ($params[1] as $category => $posts) {
                    echo '<li>
                            <details>
                                <summary>'.$category.'<img src="' . SCRIPTS . 'icons' . DIRECTORY_SEPARATOR . 'right-arrow-svgrepo-com.svg"/></summary>
                                <ul>
                                    ';foreach ($posts as $post) {
                                        echo '<li><a href="/'.$source.'?ref='.$post->slug.'">'.$post->title.'</a></li>';
                                    };
                    echo '</ul>
                            </details>
                        </li>';
                }
            echo '</ul>
            </div>';
        }
        ?>
        <div class="content">
            <?= $content ?>
        </div>
    </div>


</body>

</html>