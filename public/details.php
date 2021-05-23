<!--
	detail.php
	Page d'affichage d'un produit sélectioner avec grosse description et plusieurs photos
	@author équipe e-spiritueux
	@date 13/05/2021
-->

<?php

    require_once './../app/app.php';

    getDebug();

    require MODEL_PATH . 'Product.model.php';
    require_once MODEL_PATH . 'Category.model.php';

    $id = $_GET['id'];
    $product = ProductModel::getProductById($id);
    $name = $product->getName();
    $categoryID = $product->getCategoryId();
    $origine = $product->getOrigin();
    $prix = $product->getPrice();
    $volume = $product->getVolume();
    $alcoholLevel = $product->getAlcoholLevel();
    $description = $product->getDescription();
    $imageName= $product->getImageName();
    $category = CategoryModel::getCategoryById($categoryID);
    $categoryName= $category->getCategoryName();
    
?>

<!DOCTYPE html>

<!doctype html>

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
    <title><?php echo $name ?>&nbsp;&nbsp;&mdash;&nbsp;&nbsp;espiritueux</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <!-- Image Slider -->
    <div class="padding_layout_1 ">
        <div class="row">
            <div class="col-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../data/images/<?php echo $imageName ?>.png"" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../data/images/<?php echo $imageName ?>_2.png"" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- Image Slider End-->

                <!-- Product Info -->
            </div>
            <div class="col-7">
                <div class="product-heading">
                    <h2><?php echo $name ?></h2>
                    </div>
                <div class="product-info">
                    <h5><?php echo $categoryName ?></h5>
                    <h5><?php echo $origine ?></h5>
                    <h5><?php echo $volume ?> cl</h5>
                    <h5>Vol <?php echo $alcoholLevel ?> %</h5>
                </div>
                <div class="product-detail-side"> <span class="price">Prix - <?php echo $prix ?> €</span></div>
                <div class="detail-contant">
                    <p><?php echo $description ?><br>
                    </p>
                </div>
                <!-- Product Info End-->
                <form class="cart" method="post" action="addToCart.php">
                    <input name="productID" value="<?php echo $id ?>" type="hidden">
                    <div class="quantity">
                        <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="3" type="number">
                    </div>
                    <button type="submit" class="btn">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- load bootstrap scripts -->
    <!-- Chargement JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>