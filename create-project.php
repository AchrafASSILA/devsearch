<?php require_once "./includes/header.php";
require_once './functions/form.validation.php';
require_once './functions/projects.funcs.php';
require_once './db/db.php';
if (isset($_SESSION["username"])) {
    $tags = getTags($db);
    if (isset($_POST["submit"])) {
        $owner = $_SESSION["id"];
        $username = $_SESSION["username"];
        $title = $_POST["title"];
        $description = $_POST["project_desc"];
        $demo_link = $_POST["demo_link"];
        $source_link = $_POST["source_link"];
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_error = $_FILES["image"]["error"];
        $image_size = $_FILES["image"]["size"];
        $tag = $_POST['tag'];
        $inputs = array($title, $description);
        $image_location = "./static/images/projects/ " . $image_name;
        if (isInputsEmpty($inputs)) {
            header('Location: ../create-project.php?error_empty=empty inputs');
            exit();
        }
        createProject($db, $owner, $username, $title, $description, $demo_link, $source_link, $image_name, $image_tmp, $image_size, $image_error, $image_location);
        $project =  getLastProjectId($db);
        createProjectTags($db, $username, $project, $tag);
        header('Location: ./account.php');
    }
?>
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="account.php"><i class="im im-angle-left"></i></a>
                <br>

                <form class="form" enctype="multipart/form-data" method="post" enctype="multipart/form-data">
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
                    <div class="form__field">
                        <label for="Tags">Tags: </label>
                        <?php foreach ($tags as $tag) : ?>
                            <input type="checkbox" name="tag[]" id="tag" value="<?php echo $tag->id ?>"> <?php echo $tag->name ?> <br>

                        <?php endforeach; ?>
                    </div>
                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["erroremail"]) && !(empty($_GET["erroremail"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["erroremail"] ?></span>

                    <?php } ?>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" name="submit" value="Add Project" />
                </form>
            </div>
        </div>
    </main>
    <?php require_once './includes/footer.php'; ?>
<?php } else {
    header("Location:/php_devsearch/login.php");
} ?>