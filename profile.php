<?php require_once './includes/header.php'; ?>
<?php require_once './db/db.php'; ?>
<?php
if (!isset($_GET["id"]) || empty(($_GET["id"]))) {
    header("Location: /php_devsearch/index.php");
}
?>
<?php require_once './functions/developers.funcs.php';
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$developer = getDeveloper($db, $id);
if ($developer) {
    $skills = getDeveloperSkills($db, $id);
?>
    <!-- Main Section -->
    <main class="profile my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <div class="card text-center">
                        <div class="card__body dev">
                            <img class="avatar avatar--xl" src="<?php echo $developer->image ?>" />
                            <h2 class="dev__name"><?php echo $developer->first_name . " " . $developer->last_name ?></h2>
                            <p class="dev__title"><?php echo $developer->bio ?></p>
                            <p class="dev__location"><?php echo $developer->location ?></p>
                            <ul class="dev__social">
                                <?php if ($developer->github) { ?>
                                    <li>
                                        <a title="Github" href="<?php echo $developer->github ?>" target="_blank"><i class="im im-github"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if ($developer->linkedin) { ?>
                                    <li>
                                        <a title="LinkedIn" href="<?php echo $developer->github ?>" target="_blank"><i class="im im-linkedin"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <a href="#" class="btn btn--sub btn--lg">Send Message </a>
                        </div>
                    </div>
                </div>
                <div class="column column--2of3">
                    <div class="devInfo">
                        <h3 class="devInfo__title">About Me</h3>
                        <p class="devInfo__about">
                            <?php echo $developer->description ?>
                        </p>
                    </div>
                    <div class="devInfo">
                        <h3 class="devInfo__title">Skills</h3>
                        <div class="devInfo__skills">
                            <?php foreach ($skills as $skill) : ?>
                                <div class="devSkill">
                                    <h4 class="devSkill__title"><?php echo $skill->name ?></h4>
                                    <p class="devSkill__info">
                                        <?php echo $skill->description ?> </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <h3 class="devInfo__subtitle">Other Skills</h3>
                        <div class="devInfo__otherSkills">
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>Figma</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>Vuejs</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>REST API</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>GraphQL</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>TypeScript</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>Webpack</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>NextJS</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>Postgres</small>
                            </span>
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>MongoDB</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="devInfo">
                    <h3 class="devInfo__title">Projects</h3>
                    <div class="grid grid--two">

                        <div class="column">
                            <div class="card project">
                                <a href="single-project.html" class="project">
                                    <img class="project__thumbnail" src="images/project-b.png" alt="project thumbnail" />
                                    <div class="card__body">
                                        <h3 class="project__title">DevSearch UI Design</h3>
                                        <p><a class="project__author" href="profile.html">By Shahriar P. Shuvo</a></p>
                                        <p class="project--rating">
                                            <span style="font-weight: bold;">92%</span> Postitive
                                            Feedback (62 Votes)
                                        </p>
                                        <div class="project__tags">
                                            <span class="tag tag--pill tag--main">
                                                <small>NextJS</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>GraphQL</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>TypeScript</small>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card project">
                                <a href="single-project.html" class="project">
                                    <img class="project__thumbnail" src="images/project-c.png" alt="project thumbnail" />
                                    <div class="card__body">
                                        <h3 class="project__title">Another Landing Page</h3>
                                        <p><a class="project__author" href="profile.html">By Dennis Ivanov</a></p>
                                        <p class="project--rating">
                                            <span style="font-weight: bold;">36%</span> Postitive
                                            Feedback (18 Votes)
                                        </p>
                                        <div class="project__tags">
                                            <span class="tag tag--pill tag--main">
                                                <small>NextJS</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>GraphQL</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>TypeScript</small>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card project">
                                <a href="single-project.html" class="project">
                                    <img class="project__thumbnail" src="images/project-a.png" alt="project thumbnail" />
                                    <div class="card__body">
                                        <h3 class="project__title">Yoga Studio Landing Page Website and Design</h3>
                                        <p><a class="project__author" href="profile.html">By Dennis Ivanov</a></p>
                                        <p class="project--rating">
                                            <span style="font-weight: bold;">98%</span> Postitive
                                            Feedback (72 Votes)
                                        </p>
                                        <div class="project__tags">
                                            <span class="tag tag--pill tag--main">
                                                <small>NextJS</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>GraphQL</small>
                                            </span>
                                            <span class="tag tag--pill tag--main">
                                                <small>TypeScript</small>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
<?php }  ?>
<?php require_once './includes/footer.php'; ?>