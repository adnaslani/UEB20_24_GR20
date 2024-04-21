<?php 
    include('includes/header.php');
    
    $promotions = $crud->read('promotions', [], 4, ['column' => 'id', 'order' => 'DESC']);
    $products = $crud->read('products', [], 4, ['column' => 'id', 'order' => 'DESC']);

    // Check if the 'background' cookie is set
if(isset($_COOKIE['background'])) {
    // If set, use the background color from the cookie
    $background_color = $_COOKIE['background'];
} else {
    // Default background color
    $background_color = '#ffffff'; // white
}

// Check if the 'photo' cookie is set
if(isset($_COOKIE['photo'])) {
    // If set, use the photo filename from the cookie
    $photo_filename = $_COOKIE['promotion1.jpg'];
} else {
    // Default photo filename
    $photo_filename = 'promotion1.jpg';
}
?>

<?php if(isset($_GET['action']) && ($_GET['action'] == 'checkout')): ?>
    <?php if(isset($_GET['status']) && ($_GET['status'] == 1)): ?>
    <div class="container my4">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> Your order was created successfully. </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>

<!-- Promotions -->
<?php if($promotions && count($promotions)): ?>
<div class="promotions">
    <div id="carouselExampleCaptions" class="carousel slide" style="height:max-content;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php foreach($promotions as $index => $promotion): ?>
                <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
                    <img src="dashboard/promotions/images/<?= $promotion['image'] ?>" class="d-block w-100" style="height: 350px" alt="<?= $promotion['title'] ?> " />
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $promotion['title'] ?></h5>
                        <p><?= $promotion['subtitle'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>

        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php endif; ?>


<!-- Latest products -->
<?php if($products && count($products)): ?>
<div class="latest-products bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Latest products</h2>
            <p><?= count($products) ?> products available</p>
        </div>
        <div class="row">
            <?php foreach($products as $product): ?>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card" style="width: 18rem; display: inline-block; height: 100%; ">
                    <img src="dashboard/products/images/<?= $product['image'] ?>" class="product-image" alt="<?= $product['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text card-text-product">
                            <?= $product['price'] ?> &euro;
                            <br />
                            <?php if($product['discount'] > 0): ?>
                                <span class="badge bg-danger"><?= $product['discount'] ?>%</span>
                                <?php
                                    $new_price = $product['price'] - ($product['price'] * ($product['discount'] / 100));
                                    echo number_format($new_price, 2, ".", "");
                                ?> &euro;
                            <?php endif; ?>
                        </p>
                        <a href="view-product.php?id=<?= $product['id'] ?>" class="btn btn-outline-dark">
                            View product
                        </a>
                    </div>
                </div> <!-- ./card -->
            </div> <!-- ./col -->
            <?php endforeach; ?>
        </div> <!-- ./row -->
        <div class="text-center mt-5">
            <a href="shop.php" class="btn btn-lg btn-outline-dark">Shop page &rarr;</a>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- About eStore -->
<div class="about-us py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <video autoplay muted loop id="myVideo" style="max-width: 100%;">
                    <source src="dashboard/products/images/40572-425837205_medium.mp4" type="video/mp4">
                </video>          
      </div>
            <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-12 offset-sm-0">
                <h2>iShopTech</h2>
               

                    <p>Welcome to iShopTech! Your hub for all things tech-savvy and innovative! 🚀</p>

                    <p>At iShopTech, we're more than just a destination for gadgets and gizmos. We're a community of tech enthusiasts, explorers, and visionaries, dedicated to bringing you the latest in cutting-edge technology.</p>

                    <p>Whether you're searching for the perfect smartphone to keep you connected, the trendiest wearables to complement your lifestyle, or the most powerful computing solutions to fuel your creativity, iShopTech has you covered.</p>

                    <p>Our commitment goes beyond just providing top-notch products. We're here to inspire, educate, and empower you on your tech journey. From expert reviews and insightful articles to helpful how-tos and exciting tech trends, we're your trusted partner every step of the way.</p>

                    <p>Join us in embracing the future today! Explore, discover, and experience the wonders of technology with iShopTech. Welcome aboard!</p>

                    <p class="mt-2">Happy shopping and tech adventures ahead!                </p>
                                    

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
