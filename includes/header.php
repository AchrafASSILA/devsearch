<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./static/images/favicon.ico" type="image/x-icon" />
    <!-- Icon - IconMonster -->
    <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css" />
    <!-- Mumble UI -->
    <link rel="stylesheet" href="./static/uikit/styles/uikit.css" />
    <!-- Dev Search UI -->
    <link rel="stylesheet" href="./static/styles/app.css" />

    <title>DevSearch - Connect with Developers!</title>
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container container--narrow">
            <a href="<?php echo './' ?>" class="header__logo">
                <img src="./static/images/logo.svg" alt="DevSearch Logo" />
            </a>
            <nav class="header__nav">
                <input type="checkbox" id="responsive-menu" />
                <label for="responsive-menu" class="toggle-menu">
                    <span>Menu</span>
                    <div class="toggle-menu__lines"></div>
                </label>
                <ul class="header__menu">
                    <li class="header__menuItem"><a href="<?php echo './' ?>">Developers</a></li>
                    <li class="header__menuItem"><a href="<?php echo "./projects.php" ?>">Projects</a></li>
                    <?php if (isset($_SESSION["username"])) { ?>
                        <li class="header__menuItem"><a href="<?php echo './inbox.php' ?>">Inbox</a></li>
                        <li class="header__menuItem"><a href="<?php echo "./account.php" ?>">My Account</a></li>
                        <li class="header__menuItem"><a href="<?php echo "./logout.php" ?>" class="btn btn--sub">Logout</a></li>

                    <?php } else {
                    ?>
                        <li class="header__menuItem"><a href="<?php echo "./login.php" ?>" class="btn btn--sub">Login/Sign Up</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>