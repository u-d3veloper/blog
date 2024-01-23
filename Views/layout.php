<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="<?=SCRIPTS.'css'.DIRECTORY_SEPARATOR.'nav.css'?>">
    <link rel="stylesheet" type="text/css" href="<?=SCRIPTS.'css'.DIRECTORY_SEPARATOR.'layout.css'?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <title>Mon super site</title>
</head>
<body>

    <div class="nav">
        <p><a href="/">Projet@Sciences</a></p>
        <ul>
            <li>
                <a href="/posts" class="active">Ressources</a>
            </li>
            <li>
                <a href="/teaching">Espace enseignement</a>
            </li>
            <li>
                <a href="/about">A propos</a>
            </li>
            <li id="connect-button">
                <a href="/login">Se connecter</a>
            </li>
        </ul>
    </div>

    <div class="container">
    <?= $content ?>
    </div>
    
</body>
</html>