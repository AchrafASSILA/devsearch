<?php require_once "./includes/header.php" ?>
<?php require_once "./functions/form.validation.php" ?>
<?php require_once "./functions/developers.funcs.php" ?>
<?php require_once "./db/db.php" ?>
<?php
if (isset($_SESSION["username"])) {

    if (isset($_POST["submit"])) {
        $username = $_SESSION["username"];
        $id = $_SESSION["id"];
        $skill_name = trim($_POST["skill_name"], " ");
        $skill_desc = trim($_POST["skill_desc"], " ");
        $inputs = [$skill_name];
        if (isInputsEmpty($inputs)) {
            header("Location:/php_devsearch/create-skill.php?error_empty=empty inputs");
            exit();
        }
        createSkill($db, $username, $id, $skill_name, $skill_desc);
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
                        <label for="skill_name">Skill Name: </label>
                        <input class="input input--text" id="skill_name" value="" type="text" name="skill_name" placeholder="Enter skill name" />
                    </div>
                    <div class="form__field">
                        <label for="skill_desc">Skill description: </label>
                        <textarea class="input input--text" id="skill_desc" value="" type="text" name="skill_desc" placeholder="Enter skill description"></textarea>

                    </div>
                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["erroremail"]) && !(empty($_GET["erroremail"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["erroremail"] ?></span>

                    <?php } ?>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" name="submit" value="Add Skill" />
                </form>
            </div>
        </div>
    </main>
    <?php require_once './includes/footer.php'; ?>
<?php } else {
    header("Location:/php_devsearch/login.php");
} ?>