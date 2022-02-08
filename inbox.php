<?php require_once "./includes/header.php" ?>
<?php require_once "./functions/developers.funcs.php" ?>
<?php require_once "./db/db.php" ?>

<?php
if ($_SESSION['username']) {
    $recipient = $_SESSION['id'];
    $messages = getMessages($db, $recipient);
    $count = getCountUnreadMessages($db, $recipient);

?>;
<!-- Main Section -->
<main class="inbox my-xl">
    <div class="content-box">
        <h3 class="inbox__title">New Messages(<span><?php echo $count->cam ?></span>)</h3>
        <ul class="messages">
            <?php foreach ($messages as $message) : ?>
                <?php if ($message->is_read === 1) { ?>
                    <li class="message ">
                        <a href="message.php?id=<?php echo $message->id ?>">
                            <span class="message__author"> <?php echo $message->name ?></span>
                            <span class="message__subject"> <?php echo $message->subject ?></span>
                            <span class="message__date"> <?php echo $message->created ?></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="message message--unread">
                        <a href="message.php?id=<?php echo $message->id ?>">
                            <span class="message__author"> <?php echo $message->name ?></span>
                            <span class="message__subject"> <?php echo $message->subject ?></span>
                            <span class="message__date"> <?php echo $message->created ?></span>
                        </a>
                    </li>
            <?php }
            endforeach; ?>
        </ul>
    </div>
</main>
<?php require_once "./includes/footer.php" ?>
<?php } else {
    header('Location: ./login.php');
} ?>