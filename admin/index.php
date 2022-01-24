<?php
require_once('./functions/admin.funcs.php');
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isInputsEmpty([$username, $password])) {
        header("Location:/php_devsearch/admin/index.php?error_empty=empty inputs");
        exit();
    }
    $admin = getAdmin($username);
    if ($admin) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location:/php_devsearch/admin/admin.php");
    } else {
        header("Location:/php_devsearch/admin/index.php?error_none=username or password not correct");
        exit();
    }
}
?>
<?php session_start();
if (isset($_SESSION["username"])) {
    header("Location:/php_devsearch/admin/admin.php");
?>
<?php } else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon" />
        <!-- Icon - IconMonster -->
        <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css" />
        <!-- Mumble UI -->
        <link rel="stylesheet" href="../public/uikit/styles/uikit.css" />
        <!-- Dev Search UI -->
        <link rel="stylesheet" href="../public/styles/app.css" />

        <title>DevSearch - Connect with Developers!</title>
    </head>

    <body>
        <div class="auth">
            <div class="card">
                <div class="auth__header text-center">
                    <a href="/">
                        <img src="../public/images/icon.svg" alt="icon" />
                    </a>
                    <h3>Admin Login</h3>
                    <p>Hello Admin, Welcome Back!</p>
                </div>

                <form action="" method="post" class="form auth__form">
                    <!-- Input:Email -->
                    <div class="form__field">
                        <label for="formInput#text">Username: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="username" placeholder="Enter your username..." />
                    </div>

                    <!-- Input:Password -->
                    <div class="form__field">
                        <label for="formInput#password">Password: </label>
                        <input class="input input--password" id="formInput#passowrd" type="password" name="password" placeholder="••••••••" />
                        <?php if (isset($_GET["error_none"]) && !(empty($_GET["error_none"]))) { ?>

                            <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_none"] ?></span>

                        <?php } ?>
                        <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                            <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                        <?php } ?>
                    </div>

                    <div class="auth__actions">
                        <input class="btn btn--sub btn--lg" type="submit" name="submit" value="Log In" />
                        <a href="forgetpassword.html">Forget Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
<?php } ?>