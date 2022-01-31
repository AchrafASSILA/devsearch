<!-- start main  -->
<?php require_once './includes/header.php'; ?>
<?php require_once '../db/db.php'; ?>
<?php require_once '../functions/signup.funcs.php'; ?>
<?php require_once '../functions/form.validation.php'; ?>
<?php
// if (isset($_SESSION["username_admin"])) {
if (isset($_POST["submit"])) {
    $first_name = $_POST["firstname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $inputs = array($first_name, $username, $email, $password, $confirm_password);
    if (isInputsEmpty($inputs)) {
        header("Location:/php_devsearch/admin/form-dev.php?error_empty=empty inputs");
        exit();
    }
    if (invalidUsername($username)) {
        header("Location:/php_devsearch/admin/form-dev.php?errorinvalidusername=invalid username");
        exit();
    }
    if ((invalidEmail($email))) {
        header("Location:/php_devsearch/admin/form-dev.php?erroremail=invalid email");
        exit();
    }
    if (passwrodNotMatch($password, $confirm_password)) {
        header("Location:/php_devsearch/admin/form-dev.php?errorpassword=password not correct");
        exit();
    }
    if (usernameExists($db, $username)) {
        header("Location:/php_devsearch/admin/form-dev.php?errorusername=username already taken");
        exit();
    }
    createUser($db, $username, $first_name, $email, $password);
}


?>
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <i class="fas fa-bars" id="toggle"></i>
        </div>
        <div class="search">
            <input type="text" placeholder="Search Here" name="search" id="" />
        </div>
        <div class="user">
            <img src="./images/user.jpg" width="150px" alt="" />
        </div>
    </div>
    <!-- start form  -->
    <section class="form" id="form">
        <div class="form-container">
            <div class="head">
                <h3>Add Developer</h3>
            </div>
            <form action="" method=post>
                <div class="field">
                    <label for="formInput#text">First Name: </label><br>
                    <input class="input input--text" id="formInput#text" type="text" name="firstname" placeholder="e.g. assila achraf" />
                </div>
                <div class="field">
                    <label for="formInput#text">Username : </label><br>
                    <input class="input input--text" id="formInput#text" type="text" name="username" placeholder="e.g. assila achraf" />
                </div>

                <!-- Input:Email -->
                <div class="field">
                    <label for="formInput#email">Email Address: </label><br>
                    <input class="input input--email" id="formInput#email" type="text" name="email" placeholder="e.g. user@domain.com" />
                </div>

                <!-- Input:Password -->
                <div class="field">
                    <label for="formInput#password">Password: </label><br>
                    <input class="input input--password" id="formInput#passowrd" type="password" name="password" placeholder="••••••••" />
                </div>
                <!-- Input:Password -->
                <div class="field">
                    <label for="formInput#confirm-password">Confirm Password: </label><br>
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
                    <input class="btn btn--sub btn--lg" type="submit" name="submit" class="btn" value="Sign In" />
                </div>
            </form>
        </div>
    </section>
    <!-- end form  -->
</div>
<!-- end main  -->
<?php require_once "./includes/footer.php"  ?>