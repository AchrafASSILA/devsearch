<?php require_once './includes/header.php'; ?>
<?php require_once './functions/developers.funcs.php'; ?>
<?php require_once './db/db.php'; ?>

<?php
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $developer = getDeveloperSession($db, $username);
    if (isset($_POST["submit"])) {

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $bio = $_POST["bio"];
        $description = $_POST["description"];
        $github = $_POST["github"];
        $linkedin = $_POST["linkedin"];
        $location = $_POST["location"];
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_error = $_FILES["image"]["error"];
        $image_size = $_FILES["image"]["size"];
        $inputs = array($first_name, $last_name, $bio, $description);
        if (isInputsEmpty($inputs)) {
            header("Location:/php_devsearch/update-profile.php?error_empty=empty inputs");
            exit();
        }
        updateProfile($db, $first_name, $last_name, $email, $bio, $description, $github, $linkedin, $location, $image_name, $image_tmp, $image_size, $image_error);
        header("Location:/php_devsearch/account.php");
    }
?>
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="account.php"><i class="im im-angle-left"></i></a>
                <br>

                <form class="form" method="post" enctype="multipart/form-data">
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="first_name">First Name: </label>
                        <input class="input input--text" id="first_name" value="<?php echo $developer->first_name ?>" type="text" name="first_name" placeholder="Enter first name" />
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="last_name">Last Name: </label>
                        <input class="input input--text" id="last_name" value="<?php echo $developer->last_name ?>" type="text" name="last_name" placeholder="Enter last name" />
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="bio">Bio: </label>
                        <input class="input input--text" id="bio" value="<?php echo $developer->bio ?>" type="text" name="bio" placeholder="Enter bio" />
                    </div>
                    <div class="form__field">
                        <label for="description">Description: </label>
                        <textarea class="input input--text" id="description" type="text" name="description" placeholder="Enter description"><?php echo $developer->description ?></textarea>
                    </div>
                    <div class="form__field">
                        <label for="image">Image: </label>
                        <input class="input input--text" id="image" type="file" name="image" placeholder="Enter image">
                    </div>
                    <div class="form__field">
                        <label for="email">Email: </label>
                        <input class="input input--text" id="email" value="<?php echo $developer->email ?>" type="text" name="email" placeholder="Enter email" />
                    </div>
                    <div class="form__field">
                        <label for="github">Github: </label>
                        <input class="input input--text" id="github" value="<?php echo $developer->github ?>" type="text" name="github" placeholder="Enter github" />
                    </div>
                    <div class="form__field">
                        <label for="linkedin">Linkedin: </label>
                        <input class="input input--text" id="linkedin" value="<?php echo $developer->linkedin ?>" type="text" name="linkedin" placeholder="Enter linkedin" />
                    </div>
                    <div class="form__field">
                        <label for="location">Location: </label>
                        <input class="input input--text" id="location" value="<?php echo $developer->location ?>" type="text" name="location" placeholder="Enter location" />
                    </div>
                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" name="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
    <?php require_once './includes/footer.php'; ?>
<?php } else {
    header("Location:/php_devsearch/login.php");
} ?>