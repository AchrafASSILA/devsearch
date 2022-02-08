<?php require_once './db/db.php'; ?>
<?php require_once './functions/signup.funcs.php'; ?>
<?php require_once './includes/header.php'; ?>
<?php require_once './functions/form.validation.php'; ?>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isInputsEmpty([$username, $password])) {
        header("Location:/devsearch/login.php?error_empty=empty inputs");
        exit();
    }
    $admin = usernameExists($db, $username);
    if ($admin) {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $admin->id;
        header("Location:/devsearch/index.php");
    } else {
        header("Location:/devsearch/login.php?error_none=username or password not correct");
        exit();
    }
}
?>
<?php
if (isset($_SESSION["username"])) {
    header("Location:/devsearch/index.php");
?>
<?php } else {
?>
    <div class="auth">
        <div class="card">
            <div class="auth__header text-center">
                <a href="/">
                    <img src="./static/images/icon.svg" alt="icon" />
                </a>
                <h3>Account Login</h3>
                <p>Hello Developer, Welcome Back!</p>
            </div>

            <form method="post" class="form auth__form">
                <!-- Input:Email -->
                <div class="form__field">
                    <label for="formInput#text">Username: </label>
                    <input class="input input--text" id="formInput#text" type="text" name="username" placeholder="Enter your username..." />
                </div>

                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#password">Password: </label>
                    <input class="input input--password" id="formInput#passowrd" type="password" name="password" placeholder="••••••••" />
                </div>
                <div class="auth__actions">
                    <input class="btn btn--sub btn--lg" name="submit" type="submit" value="Log In" />
                    <a href="forgetpassword.html">Forget Password?</a>
                </div>
            </form>
            <div class="auth__alternative">
                <p>Don't have an Account?</p>
                <a href="<?php echo "./sign-up.php" ?>">Sign Up</a>
            </div>
        </div>
    </div>
    <?php require_once './includes/footer.php'; ?>
<?php } ?>