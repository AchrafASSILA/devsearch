<?php require_once './includes/header.php'; ?>
<?php require_once './db/db.php'; ?>
<?php if (isset($_SESSION["username"])) { ?>
    <!-- Main Section -->
    <?php require_once './functions/developers.funcs.php';
    require_once './functions/projects.funcs.php';
    $username = $_SESSION["username"];
    $id = $_SESSION["id"];
    $developer = getDeveloperSession($db, $username);
    $skills = getDeveloperSkills($db, $id);
    $projects = getDeveloperProjects($db, $id);
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
                            <p class="dev__title"> <?php echo $developer->bio ?></p>
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
                    <div class="settings">
                        <h3 class="settings__title">Skills</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="<?php echo "./create-skill.php" ?>"><i class="im im-plus"></i> Add Skill</a>
                    </div>

                    <table class="settings__table">
                        <?php foreach ($skills as $skill) : ?>
                            <tr>
                                <td class="settings__tableInfo">
                                    <h4><?php echo $skill->name ?></h4>
                                    <p>
                                        <?php echo $skill->description ?>
                                    </p>
                                </td>
                                <td class="settings__tableActions">
                                    <a class="tag tag--pill tag--main settings__btn" href="./update-skill.php?id=<?php echo $skill->id ?>"><i class="im im-edit"></i> Edit</a>
                                    <a class="tag tag--pill tag--main settings__btn" href="./delete-skill.php?id=<?php echo $skill->id ?>"><i class="im im-x-mark-circle-o"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="settings">
                        <h3 class="settings__title">Projects</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="./create-project.php"><i class="im im-plus"></i> Add Project</a>
                    </div>

                    <table class="settings__table">
                        <?php foreach ($projects as $project) : ?>
                            <tr>
                                <td class="settings__thumbnail">
                                    <a href="single-project.php?id=<?php echo $project->id ?>"><img src="<?php echo $project->image ?>" alt="Project Thumbnail" /></a>
                                </td>
                                <td class="settings__tableInfo">
                                    <a href="single-project.php?id=<?php echo $project->id ?>"><?php echo $project->title ?></a>
                                    <p>
                                        <?php echo $project->description ?>
                                    </p>
                                </td>
                                <td class="settings__tableActions">
                                    <a class="tag tag--pill tag--main settings__btn" href="update-project.php?id=<?php echo $project->id ?>"><i class="im im-edit"></i> Edit</a>
                                    <a onclick="return confirm('do you want to delete this project <?php echo $project->title ?>?')" class="tag tag--pill tag--main settings__btn" href="delete-project.php?id=<?php echo $project->id ?>"><i class="im im-x-mark-circle-o"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require_once './includes/footer.php'; ?>
<?php } else {
    header("Location:/php_devsearch/login.php");
} ?>