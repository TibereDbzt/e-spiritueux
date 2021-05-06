<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- load bootstrap styles -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <!-- load a reset file to standardize browsers -->
    <link rel="stylesheet" href="./styles/reset.css">
    <!-- generic styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <!-- specific styles -->
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/home.css">
    <title>WineShop</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content">
            <section class="hero">
                <h1 class="site-name">e-spiritueux</h1>
                <p>découvrez nos vins Grands Crus</p>
            </section>

            <section class="section about-us">
                <h2 class="section__title">à propos</h2>
                <div class="section__content">
                    <p class="section__description">Le choix des parcelles est effectué avec le plus grand soin. Une fois sélectionnées, celles-ci sont suivies avec une attention toute particulière, dans le plus grand respect de la Nature.
                    Culture, biodynamie, analyse des sols et du végétal, protection des vignes mais aussi vinification... Les vins que nous proposons sont la fidèle incarnation de notre philosophie.
                    Nous avons choisi d’offrir l’excellence — et comme l’orfèvre devant son ouvrage, chaque détail a été examiné, pesé et affiné avec exigence et précision.</p>
                    <div class="image__container">
                        <img class="grape-image" src="./assets/images/grape.png" alt="grape">
                    </div>
                </div>
            </section>

        </main>

    </div>

    <?php
        require_once './footer.php';
    ?>
    
    <!-- load bootstrap scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> -->
</body>
</html>