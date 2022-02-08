<?php require_once "./includes/header.php" ?>
<?php require_once "./functions/developers.funcs.php" ?>
<?php require_once "./db/db.php" ?>
<!-- Main Section -->
<?php if ($_SESSION['username']) {
    $id = $_GET['id'];
    $message = getMessage($db, $id);
    updateMessage($db, $id);

?>
    <main class="messagePage my-xl">
        <div class="content-box">
            <div class="message">
                <a class="backButton" href="inbox.php"><i class="im im-angle-left"></i></a>
                <h2 class="message__subject"><?php echo $message->subject ?></h4>
                    <a href="profile.html" class="message__author"><?php echo $message->name ?></a>
                    <p class="message__date"><?php echo $message->created ?> PM</p>
                    <div class="message__body"><?php echo $message->body ?>
                    </div>
            </div>
        </div>
    </main>
<?php } else {
    header('Location: ./login.php');
} ?>