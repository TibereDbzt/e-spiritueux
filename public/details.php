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
    require_once MODEL_PATH . 'Category.model.php';

    $id = $_GET['id'];
    $product = ProductModel::getProductById($id);
    $nom = $product->getName();
    $categorieID = $product->getCategoryId();
    $origine = $product->getOrigin();
    $prix = $product->getPrice();
    $volume = $product->getVolume();
    $alcoholLevel = $product->getAlcoholLevel();
    $description = $product->getDescription();
    $imageName= $product->getImageName();
    $categorie = CategoryModel::getCategoryById($categorieID);
    $categorieName= $categorie->getCategoryName();
    
    ?>
    <div class="padding_layout_1 ">
    <div class="row">
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="product_detail_feature_img hizoom hi2">
                <div class='hizoom hi2'> <img src="../data/images/<?php echo $imageName ?>.png" alt="#" /> </div>
            </div>
            <!-- Image Slider -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="./assets/images/bg3.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="./assets/images/bg1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="./assets/images/bg2.jpg" alt="Third slide">
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
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
            <div class="product-heading">
                <h2><?php echo $nom ?></h2>
                </div>
            <div class="product-info">
                <h5><?php echo $categorieName ?></h5>
                <h5><?php echo $origine ?></h5>
                <h5><?php echo $volume ?> cl</h5>
                <h5>Vol <?php echo $alcoholLevel ?> %</h5>
            </div>
            <div class="product-detail-side"> <span class="price">Prix - <?php echo $prix ?> €</span></div>
            <div class="detail-contant">
                <p><?php echo $description ?><br>
                </p>
            </div>
            <form class="cart" method="post" action="addToCart.php">
                <input name="productID" value="<?php echo $id ?>" type="hidden">
                <div class="quantity">
                    <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                </div>
                <button type="submit" class="btn">Add to cart</button>
            </form>
        </div>
    </div>
    </div>

    <!-- load scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>