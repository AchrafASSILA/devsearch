<?php require_once "./includes/header.php";
if (isset($_SESSION["username"])) {
?>
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="account.php"><i class="im im-angle-left"></i></a>
                <br>

                <form class="form" enctype="multipart/form-data" action="./forms handling/create-project-handl.php" method="post" enctype="multipart/form-data">
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="title">Title: </label>
                        <input class="input input--text" id="title" type="text" name="title" placeholder="Enter project title" />
                    </div>
                    <div class="form__field">
                        <label for="project_desc">Project description: </label>
                        <textarea class="input input--text" id="project_desc" type="text" name="project_desc" placeholder="Enter project description"></textarea>

                    </div>
                    <div class="form__field">
                        <label for="project_image">Project Image: </label>
                        <input class="input input--text" id="project_image" type="file" name="image" placeholder="Enter project image" />
                    </div>
                    <div class="form__field">
                        <label for="demo_link">Demo Link: </label>
                        <input class="input input--text" id="demo_link" type="text" name="demo_link" placeholder="Enter demo link" />
                    </div>
                    <div class="form__field">
                        <label for="source_link">Source Link: </label>
                        <input class="input input--text" id="source_link" type="text" name="source_link" placeholder="Enter source code" />
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