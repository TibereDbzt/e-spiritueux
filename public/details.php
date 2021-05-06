<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- load bootstrap styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- load a reset file to standardize browsers -->
    <link rel="stylesheet" href="./styles/reset.css">
    <!-- generic styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <!-- specific styles -->
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/details.css">
    <title>WineShop</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content">
            <h2>Détail du produit</h2>

        </main>

    </div>

    <?php
    require_once './../app/app.php';

    getDebug();

    require MODEL_PATH . 'Product.model.php';

    $id = $_GET['id'];
    $product = ProductModel::getProductById($id);
    $nom = $product->getName();
    $categorie = $product->getCategoryId();
    $origine = $product->getOrigin();
    $prix = $product->getPrice();
    $volume = $product->getVolume();
    $alcoholLevel = $product->getAlcoholLevel();
    $description = $product->getDescription();
    $imageName= $product->getImageName();



    ?>

    <div class="row">
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="product_detail_feature_img hizoom hi2">
                <div class='hizoom hi2'> <img src="../data/images/<?php echo $imageName ?>.png" alt="#" /> </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
            <div class="product-heading">
                <h1><?php echo $nom ?></h1>
            </div>
            <div class="product-detail-side"> <span class="new-price"><?php echo $prix ?></span></div>
            <div class="detail-contant">
                <p><?php echo $description ?><br>
                </p>
                <form class="cart" method="post" action="it_cart.html">
                    <div class="quantity">
                        <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                    </div>
                    <button type="submit" class="btn sqaure_bt">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- load bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>