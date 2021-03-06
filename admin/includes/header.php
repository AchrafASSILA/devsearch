<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css files  -->
    <link rel="stylesheet" href="admin/../static/css/style.css" />
    <!-- normalize file  -->
    <link rel="stylesheet" href="admin/../static/css/normalize.css" />
    <link rel="stylesheet" href="admin/../static/css/all.min.css" />
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <!-- font awesome  -->
    <title>Initial</title>
</head>

<body>
    <!-- start header  -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"></span>
                        <span class="title"> Devsearch</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "./admin.php" ?>">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title"> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="far fa-user"></i></span>
                        <span class="title"> Developers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-project-diagram"></i></span>
                        <span class="title"> Projects</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="far fa-comment"></i></span>
                        <span class="title"> Messages</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="title"> Charts</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "./logout.php" ?>">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title"> Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end header  -->