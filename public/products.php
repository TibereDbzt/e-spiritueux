<?php

    require_once './../app/app.php';

    require MODEL_PATH . 'Product.model.php';
    require MODEL_PATH . 'Category.model.php';

    $products = ProductModel::getAllProducts();
    $categories = CategoryModel::getAllCategories();
    $categoryName = "";

    if (!empty($_GET['category'])) {
        $categoryName = $_GET['category'];
        // choose one of two methods : SQL request all product and then filter in PHP  OR  SQL request for single category
        // $products = ProductModel::filterByCategoryID($products, $categoryID);
        $products = ProductModel::getProductsByCategoryName($categoryName);
    }

    if (!empty($_GET['search'])) {
        $keywords = $_GET['search'];
        $products = ProductModel::filterByKeyword($keywords);
        $products ? $nbOfResults = count($products) : $nbOfResults = 0;
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- load a reset file to standardize browsers -->
    <link rel="stylesheet" href="./styles/reset.css">
    <!-- generic styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <!-- specific styles -->
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/products.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <title>Produits&nbsp;&nbsp;&mdash;&nbsp;&nbsp;espiritueux</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content products-page">

            <header class="header">
                <h2 class="header__title">découvrez tous nos produits</h2>
                <div class="header__separator">
                    <span class="line"></span>
                    <span class="circle"></span>
                </div>
                <p class="header__description">Tous nos produits sont certifiés cuite assurée  et sont le fruit d’une sélection dans les quatre coins du monde des mielleures fermes agricoles.</p>
            </header>

            <div class="filters">
                <div class="filters__forms">
                    <form class="search__form" action="./products.php" method="GET">
                        <label class="search__label" for="search">rechercher un produit</label>
                        <div class="search__box">
                            <input class="search__input" id="search" type="text" placeholder="belvedere" name="search" value="<?php echo $keywords; ?>">
                            <input class="search__submit" type="submit" value="">
                        </div>
                    </form>
                    <form class="categories__form" action="./products.php" method="GET">
                        <div class="categories__label">catégories</div>
                        <div class="categories__list">
                            <button class="categories__entry <?php if (strlen($categoryName) === 0) echo 'selected' ?>">tous</button>
                            <?php
                                foreach ($categories as $category) {
                                    echo '<button class="categories__entry ' . $category->addClassIfSelected($categoryName) .'" name="category" value="' . $category->getCategoryName() . '">' . $category->getCategoryName() . '</button>';
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="products">
                <?php

                    if (isset($keywords)) {
                        echo '<p class="search__result-sentence">' . $nbOfResults . ' produits trouvés pour "' . $keywords . '".</p>';
                    }
                    
                    foreach ($products as $product) {
                        echo '<a class="product link-target" href="./details.php?id=' . $product->getId() . '">';
                            echo '<div class="product__thumbnail"><img src="./assets/images/products/' . $product->getImageName() . '.png" alt =""></div>';
                            echo '<div class="product__infos">';
                                echo '<h3 class="product__name">' . $product->getName() . '</h3>';
                                echo '<div class="product__details-container">';
                                    echo '<div class="product__detail">' . $product->getCategoryName() . '</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getOrigin() . '</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getVolume() . 'cl</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getAlcoholLevel() . '% vol</div>';
                                    echo '<div class="product__price">' . $product->getPrice() . '€</div>';
                                echo '</div>';
                                echo '<p class="product__description">' . $product->getShortDescription() . '</p>';
                                echo '<div class="product__button-container">';
                                    echo '<div class="button">';
                                        echo '<span class="button__arrow"></span>';
                                        echo '<span class="button__text">détails</span>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</a>';
                    }
                
                ?>
            </div>
        </main>

    </div>

    <?php
        require_once './footer.php';
    ?>
    
</body>
</html>