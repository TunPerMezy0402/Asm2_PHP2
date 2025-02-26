<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>app/css/client_css_ph47509.css">

    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
    <div class="container mb-3" id="container">
        <!-- Đăng Nhâp -->
        <div class="form-logon form-container sign-in-container">
            <form action="<?= BASE_URL ?>login" method="POST">
                <h1>Đăng Nhập</h1>
                <div class="social-container">

                </div>
                <span>or use your account</span>
                <input class="text-start input-css mb-2" name="user" type="text" placeholder="Email" />
                <input class="text-start input-css mb-2" name="pass" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <input class="input2-css btn_submit" type="submit" value="Đăng Nhập">
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <a class="login_style" href="">Đăng Nhập</a>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <?php if (isset($_SESSION['errors'])): ?>
                                <p class="p-error mt-4"><?='*  ' . $_SESSION['errors'] ?></p>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</html>
