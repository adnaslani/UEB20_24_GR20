<?php 
    include('includes/header.php'); 

    $errors = [];

    $fullname = ""; // Initialize fullname variable

    //    // Function to greet the user
    //    function greetUser($name) {
    //     echo "Hello, $name! You have successfully registered.";
    
    if(isset($_POST['register_btn'])) {
        // data
        $fullname = trim($_POST['fullname']); // Heqja e hapësirave të tepërta në fillim dhe në fund qe perdoret me rregullu permbajtjen e stringjeve
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $email2 = $_POST['email2'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        // Validimi dhe shpërndarja e emrit dhe mbiemrit
        if(empty($fullname)) {
            $errors[] = 'Fullname is required!';
        } else {
            $fullname_parts = explode(" ", $fullname);
            $name = $fullname_parts[0];
            $surname = $fullname_parts[1];
        }

        // Validimi i email-it
        $email = $_POST['email'];
        $email2 = $_POST['email2'];

        if(empty($email)) {
            $errors[] = 'Email is required!';
        }

        if(empty($email2)) {
            $errors[] = 'Repeat email is required!';
        }

        // Validimi i fjalëkalimit me RegEx
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];


        if(empty($password1)) {
            $errors[] = 'Password is required!';
        } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[A-Za-z\d@$!%*?&]{8,20}$/', $password1)) {
            $errors[] = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and be between 8 and 20 characters long!';
        }

        if(empty($password2)) {
            $errors[] = 'Repeat password is required!';
        }

        if($password1 !== $password2) {
            $errors[] = 'Fields: Password & Repeat password must have same values!';
        }

        if($email !== $email2) {
            $errors[] = 'Fields: email & Repeat email must have same values!';
        }

        
        if(count($errors) === 0) {
            $data = [
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => password_hash($password1, PASSWORD_BCRYPT )
            ];
        }

 
     // Insert user into database
     if($crud->create('users', $data)) {
        // Redirect to the login page with a success status
        header('Location: login.php?action=register&status=1&fullname=' . urlencode($fullname));
        // exit(); // Exit to prevent further execution of code
    }
}
?>



<!-- Login -->
<div class="auth py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="video-container" style="position: relative;">

                <video autoplay muted loop id="myVideo" style="width:40rem;">
                    <source src="dashboard/products/images/register.mp4" type="video/mp4">
                </video>     
                </div>
                <div class="text-overlay" style="position: absolute; bottom:10%; left: 30%; transform: translate(-50%, -50%); z-index: 1; text-align: center;">
                    <h3 style="color: white;">Register to get started!</h3>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 offset-sm-0 d-flex align-items-center">
                <div class="login w-100">
                    <h2>Register</h2>
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
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your name and surname" />
                        </div>
                        <div class="form-group my-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" />
                        </div>
                        <div class="form-group my-4">
                            <label for="email">Repeat email</label>
                            <input type="email" name="email2" id="email" class="form-control" placeholder="Repeat your email" />
                        </div>
                        <div class="form-group my-4">
                            <label for="password">Password</label>
                            <input type="password" name="password1" id="password" class="form-control" placeholder="Enter your password" />
                        </div>
                        <div class="form-group my-4">
                            <label for="password">Repeat password</label>
                            <input type="password" name="password2" id="password" class="form-control" placeholder="Repeat your password" />
                        </div>
                        <button type="submit" name="register_btn" class="btn btn-sm btn-outline-primary">Register</button>
                        <a href="login.php" class="btn btn-sm btn-link">Login</a>
                  
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
                        