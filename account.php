<?php require_once './includes/header.php'; ?>
<?php require_once './db/db.php'; ?>
<?php if (isset($_SESSION["username"])) { ?>
    <!-- Main Section -->
    <?php require_once './functions/developers.funcs.php';
    $username = $_SESSION["username"];
    $developer = getDeveloperSession($db, $username);

    ?>
    <main class="settingsPage profile my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <div class="card text-center">
                        <div class="card__body dev">
                            <a class="tag tag--pill tag--main settings__btn" href="update-profile.php"><i class="im im-edit"></i> Edit</a>
                            <img class="avatar avatar--xl dev__avatar" src="<?php echo $developer->image ?>" />
                            <h2 class="dev__name"><?php echo $developer->first_name    . " " . $developer->last_name ?></h2>
                            <p class="dev__title">Expirance FullStack Developer, Youtuber and Instructor</p>
                            <p class="dev__location">Based in Florida, USA</p>
                            <ul class="dev__social">
                                <li>
                                    <a title="Github" href="#" target="_blank"><i class="im im-github"></i></a>
                                </li>
                                <li>
                                    <a title="Stackoverflow" href="#" target="_blank"><i class="im im-stackoverflow"></i></a>
                                </li>
                                <li>
                                    <a title="Twitter" href="#" target="_blank"><i class="im im-twitter"></i></a>
                                </li>
                                <li>
                                    <a title="LinkedIn" href="#" target="_blank"><i class="im im-linkedin"></i></a>
                                </li>
                                <li>
                                    <a title="Personal Website" href="#" target="_blank"><i class="im im-globe"></i></a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn--sub btn--lg">Send Message </a>
                        </div>
                    </div>
                </div>
                <div class="column column--2of3">
                    <div class="devInfo">
                        <h3 class="devInfo__title">About Me</h3>
                        <p class="devInfo__about">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex illum ipsum iusto consequatur. Totam,
                            dolorum fugiat, debitis facere illo nostrum nesciunt maxime, deserunt enim voluptatibus modi natus velit
                            voluptatum. Dicta eritatis exercitationem ut quos a placeat obcaecati? Architecto illum!
                            <br />
                            Amet consectetur adipisicing elit. Veritatis exercitationem ut quos a placeat obcaecati? Architecto
                            illum, atque delectus nemo dolorem inventore ab facilis? Dolor placeat vel delectus ipsam ullam.
                        </p>
                    </div>
                    <div class="settings">
                        <h3 class="settings__title">Skills</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="#"><i class="im im-plus"></i> Add Skill</a>
                    </div>

                    <table class="settings__table">
                        <tr>
                            <td class="settings__tableInfo">
                                <h4>JavaScript</h4>
                                <p>
                                    Consectetur adipisicing elit. Natus nam dolore aut sed vitae eos architecto unde tempore
                                    exercitationem fugiat?...
                                </p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="settings__tableInfo">
                                <h4>Python</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, suscipit...</p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="settings__tableInfo">
                                <h4>Django</h4>
                                <p>
                                    Amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod,
                                    odio Est, suscipit...
                                </p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    </table>

                    <div class="settings">
                        <h3 class="settings__title">Projects</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="#"><i class="im im-plus"></i> Add Project</a>
                    </div>

                    <table class="settings__table">
                        <tr>
                            <td class="settings__thumbnail">
                                <a href="single-project.html"><img src="images/project-a.png" alt="Project Thumbnail" /></a>
                            </td>
                            <td class="settings__tableInfo">
                                <a href="single-project.html">Yoga Studio Landing Page</a>
                                <p>
                                    Consectetur adipisicing elit. Natus nam dolore aut sed vitae eos architecto unde tempore
                                    exercitationem fugiat?...
                                </p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="settings__thumbnail">
                                <a href="single-project.html"><img src="images/project-b.png" alt="Project Thumbnail" /></a>
                            </td>
                            <td class="settings__tableInfo">
                                <a href="single-project.html">DevSearch Website UI Design</a>
                                <p>
                                    Consectetur adipisicing elit. Natus nam dolore aut sed vitae eos architecto unde tempore
                                    exercitationem fugiat?...
                                </p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="settings__thumbnail">
                                <a href="single-project.html"><img src="images/project-a.png" alt="Project Thumbnail" /></a>
                            </td>
                            <td class="settings__tableInfo">
                                <a href="single-project.html">Portfolio Website Design</a>
                                <p>
                                    Consectetur adipisicing elit. Natus nam dolore aut sed vitae eos architecto unde tempore
                                    exercitationem fugiat?...
                                </p>
                            </td>
                            <td class="settings__tableActions">
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-edit"></i> Edit</a>
                                <a class="tag tag--pill tag--main settings__btn" href="#"><i class="im im-x-mark-circle-o"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require_once './includes/footer.php'; ?>
<?php } else {
    header("Location:/php_devsearch/login.php");
} ?>