<?php
include('includes/header.php');

class Product {
    protected $name;
    protected $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculateFinalPrice() {
        return $this->price; // Return base price for a product
    }
}

class Electronics extends Product {
    private $warrantyPeriod;

    public function __construct($name, $price, $warrantyPeriod) {
        parent::__construct($name, $price);
        $this->warrantyPeriod = $warrantyPeriod;
    }

    public function calculateFinalPrice() {
        // Add additional fee for warranty
        return $this->price + 20; // $50 additional fee for warranty
    }
}

if(!isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'] != 1) {
    die('<div class="container my-4">Please <a href="login.php">login</a> first</div>');
}

$errors = [];
$total = 0; // Initialize total here

if(isset($_POST['checkout_btn'])) {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];

    if(empty($fullname)) {

    $errors[] = 'Fullname is required!';}

    if(empty($email)) { 
        $errors[] = 'Email is required!';};
    if(empty($phone)) { $errors[] = 'Phone is required!';};
    if(empty($address)) { $errors[] = 'Address is required!';};

    if(count($errors) === 0) {
        // Calculate total only if there are no errors
        $products = [
            new Electronics("SENSE7 Spellcaster", 289.25 , "1 year"),
        ];

        foreach ($products as $product) {
            $total += $product->calculateFinalPrice();
        }
    }
}
?>

<!-- Checkout page -->
<div class="checkout py-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h2>Buy from the best</h2>
            </div>
            <div>
                <a href="#" class="btn btn-md btn-outline-danger" onclick="return confirm('Are you sure?')">
                    Empty cart
                </a>
            </div>
        </div>
        <div class="my-5">
            <h4 class="mb-4">
                Checkout
            </h4>
            <div class="checkout-form">
                <?php if($errors): ?>
                    <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <label for="fullname my-2">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Fullname" required />
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required />
                    </div>
                    <div class="form-group my-2">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                    <div class="form-group my-2">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" class="form-control"></textarea>
                    </div>
                    <button type="submit" name="checkout_btn" class="btn btn-lg btn-outline-dark">Submit</button>
                </form>
                <?php if(isset($_POST['checkout_btn']) && count($errors) == 0): ?>
                    <h5 class="mt-4">Total to pay: $<?= number_format($total, 2) ?></h5>
                <?php endif; ?>
            </div>
        </div> <!-- ./div -->
    </div>
</div>

<?php include('includes/footer.php'); ?>
