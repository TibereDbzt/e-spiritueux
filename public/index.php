<!--
    index.php
    page d'accueil
    @author équipe e-spiritueux
    @date 13/05/2021
-->
<?php
    require_once './../app/app.php';

    require_once MODEL_PATH . 'Category.model.php';

    $categories = CategoryModel::getAllCategories();

    session_start();

?>

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
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="shortcut icon" href="./assets/images/logo_black.png" type="image/x-icon">
    <title>Accueil&nbsp;&nbsp;&mdash;&nbsp;&nbsp;espiritueux</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content">
            <section class="hero">
                <h1 class="site-name">e-spiritueux</h1>
                <p>Découverte de nouvelles saveurs aux 4 coins du monde avec nos spiritueux</p>
            </section>

            <section class="section about-us">
                <h2 class="section__title">à propos</h2>
                <div class="section__content">
                    <p class="section__description">Simple amateur ou connaisseur, partez à la découverte de nouvelles saveurs aux 4 coins du monde avec nos spiritueux : whisky, gin, rhum et vodka. Découvrez sans attendre notre gamme de whisky single malt et de rhums ambrés au travers de distilleries emblématiques telles que Lagavulin, Talisker ou Clément.</p>
                    <div class="image__container">
                        <img class="glass-image" src="./assets/images/bg0.png" alt="grape">
                    </div>
                </div>
            </section>

            <section class="section categories">
                <h2 class="section__title">Découvrez nos produits</h2>
                <div class="section__content">
                    <?php
                        foreach ($categories as $category) {
                            echo '<a class="btn" href="./products.php?categoryID=' . $category->getCategoryId() . '"/>';
                            echo '<div class="category__box">';
                            echo '<h3 class="category__name">' . $category->getCategoryName() . '</h3>';
                            echo '</div>';
                            echo '</a>';
                        }
                    ?>
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