<?php require_once './includes/header.php'; ?>
<?php require_once './functions/developers.funcs.php'; ?>
<?php require_once './db/db.php'; ?>
<?php if (isset($_POST['submit'])) {
    if (isset($_SESSION['username'])) {
        $sender = getDeveloper($db, $_SESSION['id']);
        $recipient = getDeveloper($db, $_GET['id']);
        $subject = $_POST['subject'];
        $message = $_POST['description'];
        createMessage($db, $sender->id, $recipient->id, $subject, $message, $sender->last_name, $sender->email);
    } else {
        $name = $_POST['first_name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['description'];
        $recipient = getDeveloper($db, $_GET['id']);

        createMessage($db, null, $recipient->id, $subject, $message, $name, $email);
    }
}

?>
<?php if (isset($_SESSION['username'])) { ?>
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="account.php"><i class="im im-angle-left"></i></a>
                <br>
                <form class="form" method="post" enctype="multipart/form-data">
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="subject">Subject: </label>
                        <input class="input input--text" id="subject" type="text" name="subject" placeholder="Enter subject" />
                    </div>
                    <div class="form__field">
                        <label for="description">Description: </label>
                        <textarea class="input input--text" id="description" type="text" name="description" placeholder="Enter description"></textarea>
                    </div>

                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["erroremail"]) && !(empty($_GET["erroremail"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["erroremail"] ?></span>

                    <?php } ?>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" name="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
<?php } else { ?>
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="account.php"><i class="im im-angle-left"></i></a>
                <br>
                <form class="form" method="post" enctype="multipart/form-data">

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="first_name">First Name: </label>
                        <input class="input input--text" id="first_name" type="text" name="first_name" placeholder="Enter first name" />
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="email">Email: </label>
                        <input class="input input--text" id="email" type="text" name="email" placeholder="Enter email" />
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="subject">Subject: </label>
                        <input class="input input--text" id="subject" type="text" name="subject" placeholder="Enter subject" />
                    </div>
                    <div class="form__field">
                        <label for="description">Description: </label>
                        <textarea class="input input--text" id="description" type="text" name="description" placeholder="Enter description"></textarea>
                    </div>

                    <?php if (isset($_GET["error_empty"]) && !(empty($_GET["error_empty"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["error_empty"] ?></span>

                    <?php } ?>
                    <?php if (isset($_GET["erroremail"]) && !(empty($_GET["erroremail"]))) { ?>

                        <span style="display:block;font-weight: bold;color:red;text-align:center;disp"><?php echo $_GET["erroremail"] ?></span>

                    <?php } ?>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" name="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
<?php }
require_once './includes/footer.php'; ?>