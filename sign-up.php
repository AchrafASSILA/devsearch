<?php require_once './includes/header.php'; ?>
<?php require_once './db/db.php'; ?>
<?php require_once './functions/signup.funcs.php'; ?>
<?php
if (isset($_POST["submit"])) {
    $first_name = $_POST["firstname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $inputs = array($first_name, $username, $email, $password, $confirm_password);
    if (isInputsEmpty($inputs)) {
        header("Location:/php_devsearch/sign-up.php?error_empty=empty inputs");
        exit();
    }
    if (invalidUsername($username)) {
        header("Location:/php_devsearch/sign-up.php?errorinvalidusername=invalid username");
        exit();
    }
    if ((invalidEmail($email))) {
        header("Location:/php_devsearch/sign-up.php?erroremail=invalid email");
        exit();
    }
    if (passwrodNotMatch($password, $confirm_password)) {
        header("Location:/php_devsearch/sign-up.php?errorpassword=password not correct");
        exit();
    }
    if (usernameExists($db, $username)) {
        header("Location:/php_devsearch/sign-up.php?errorusername=username already taken");
        exit();
    }
    createUser($db, $username, $first_name, $email, $password);
}


?>
<?php
if (isset($_SESSION["username"])) {
    header("Location:/php_devsearch/index.php");
?>
<?php } else {
?>
    <!-- start sign up  -->
    <div class="auth">
        <div class="card">
            <div class="auth__header text-center">
                <a href="/">
                    <img src="./static/images/icon.svg" alt="icon" />
                </a>
                <h3>Account SignUp</h3>
                <p>Create a new developer account</p>
            </div>

            <form class="form auth__form" enctype="multipart/form-data" method="post">
                <!-- Input:Text -->
                <div class="form__field">
                    <label for="formInput#text">First Name: </label>
                    <input class="input input--text" id="formInput#text" type="text" name="firstname" placeholder="e.g. assila achraf" />
                </div>
                <div class="form__field">
                    <label for="formInput#text">Username : </label>
                    <input class="input input--text" id="formInput#text" type="text" name="username" placeholder="e.g. assila achraf" />
                </div>

                <!-- Input:Email -->
                <div class="form__field">
                    <label for="formInput#email">Email Address: </label>
                    <input class="input input--email" id="formInput#email" type="text" name="email" placeholder="e.g. user@domain.com" />
                </div>

                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#password">Password: </label>
                    <input class="input input--password" id="formInput#passowrd" type="password" name="password" placeholder="••••••••" />
                </div>
                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#confirm-password">Confirm Password: </label>
                    <input class="input input--password" id="formInput#confirm-passowrd" type="password" name="confirm-password" placeholder="••••••••" />
                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["errorinvalidusername"]) && !(empty($_GET["errorinvalidusername"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["errorinvalidusername"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["erroremail"]) && !(empty($_GET["erroremail"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["erroremail"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["errorpassword"]) && !(empty($_GET["errorpassword"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["errorpassword"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["errorusername"]) && !(empty($_GET["errorusername"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["errorusername"] ?></span>

                    <?php } ?>
                </div>
                <div class="auth__actions">
                    <input class="btn btn--sub btn--lg" type="submit" name="submit" value="Sign In" />
                </div>
            </form>
            <div class="auth__alternative">
                <p>Already have an Account?</p>
                <a href="<?php echo "./login.php" ?>">Log In</a>
            </div>
        </div>
    </div>
    <!-- end sign up  -->
    <?php require_once './includes/footer.php'; ?>
<?php } ?>