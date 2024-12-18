<?php
include('includes/header.php'); 

// Check if the cart cookie is set and update the session cart if necessary
if (!isset($_SESSION['cart']) && isset($_COOKIE['cart'])) {
    $_SESSION['cart'] = unserialize($_COOKIE['cart']);
}

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'emptycart') {
        unset($_SESSION['cart']);
        
        // Clear the cart cookie
        setcookie('cart', '', time() - 3600, '/');
        
        header('Location: index.php');
        exit();
    } elseif ($_GET['action'] === 'minus') {
        $id = $_GET['id'];
        $cart_product = $_SESSION['cart'][$id];
        $cart_product['qty'] = $cart_product['qty'] - 1;

        if ($cart_product['qty'] <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = $cart_product;
        }
        
        // Update the cart cookie
        setcookie('cart', serialize($_SESSION['cart']), time() + (86400 * 30), '/');
        
        header('Location: cart.php');
        exit();
    } elseif ($_GET['action'] === 'plus') {
        $id = $_GET['id'];
        $cart_product = $_SESSION['cart'][$id];
        $cart_product['qty'] = $cart_product['qty'] + 1;
        $_SESSION['cart'][$id] = $cart_product;
        
        // Update the cart cookie
        setcookie('cart', serialize($_SESSION['cart']), time() + (86400 * 30), '/');
        
        header('Location: cart.php');
        exit();
    }
}
?>

<!-- Products -->
<div class="cart py-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h2>Cart</h2>
                <p>
                <?php
                    if (isset($_SESSION['cart'])) {
                        echo count($_SESSION['cart']) .' products';
                    }
                ?>
                </p>
            </div>
            <div>
                <a href="?action=emptycart" class="btn btn-bg btn-outline-danger" onclick="return confirm('Are you sure?')">
                    Empty cart
                </a>
            </div>
        </div>
        <div class="my-5">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Product</td>
                        <th>Qty</td>
                        <th>Price</td>
                    </tr>
                    <?php foreach($_SESSION['cart'] as $item): ?>
                    <tr>
                        <td width="70%"><?= $item['name'] ?></td>
                        <td>
                            <a href="?action=minus&id=<?= $item['id'] ?>" class="btn btn-bg btn-outline-dark">-</a>
                            <span class="d-inline-block mx-3"><?= $item['qty'] ?></span>
                            <a href="?action=plus&id=<?= $item['id'] ?>" class="btn btn-bg btn-outline-dark">+</a>
                        </td>
                        <td class="text-end">
                            <?= number_format($item['price'] * $item['qty'], 2, '.', '') ?> &euro;
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
        </div>
<?php else: ?>
<p>Cart is empty!</p>
<?php endif; ?>
</div> <!-- ./div -->
<div>
<?php if (isset($_SESSION['is_loggedin']) && ($_SESSION['is_loggedin'] == 1)): ?>
<a href="checkout.php" class="btn btn-bg btn-outline-dark">Check out</a>
<?php else: ?>
Please <a href="login.php">login</a> first
<?php endif; ?>
</div>
</div>

</div>
<?php include('includes/footer.php'); ?>
