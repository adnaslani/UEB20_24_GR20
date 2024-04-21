
<?php 
    include('includes/header.php'); 

    $errors = [];

    if(isset($_POST['login_btn'])) {
        // data
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)) {
            $errors[] = 'Email is required!';
        }

        if(empty($password)) {
            $errors[] = 'Password is required!';
        }


        if(count($errors) === 0) {
            $user = $crud->read('users', ['column' => 'email', 'value' => $email], 1);

            if(count($user)) {
                $user = $user[0];
                if(password_verify($password, $user['password'])) {
                    // set sessions
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['fullname'] = $user['name'] . " " .$user['surname'];
                    $_SESSION['email'] = $email;
                    $_SESSION['is_loggedin'] = true;
                    $_SESSION['role'] = $user['role'];
                    
    
                    // redirect
                    header('Location: dashboard/');

     
                } else {
                    $errors[] = 'Username or/and password was incorrect!';
                }
            }
        }
    }


?>
<!-- <style>
    /* CSS for video container */
.video-container {
    position: relative;
    width: 100%;
    height: 100%;
}

CSS for video
.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit:scale-down;
}

/* CSS for text-overlay */
.text-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    text-align: center;
}

</style> -->

<!-- Login -->
<div class="auth py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="video-container" style="position:relative; ">
                    <video autoplay muted loop id="myVideo" class="img-fluid" style="position: absolute;
                        margin: 10%;
                        /* /* bottom:10%;  */
                        left: 50%;
                        width: 40rem;
                        transform: translate(-50%, -50%); 
                        height: 20rem; 
                        object-fit:fill"> 
                        <source src="dashboard/products/images/register.mp4" type="video/mp4">
                    </video>
                    <div class="text-overlay" style="position: absolute; bottom:10%; left: 60%; transform: translate(-50%, -50%); z-index:1; text-align: center;">
                        <h3 style="color: white;">Welcome!</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-12 offset-sm-0 d-flex align-items-center">
                <div class="login w-100">
                    <h2>Login</h2>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group my-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" />
                        </div>
                        <div class="form-group my-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" />
                        </div>
                        <button type="submit" name="login_btn" class="btn btn-sm btn-outline-primary">Login</button>
                        <a href="register.php" class="btn btn-sm btn-link">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>
