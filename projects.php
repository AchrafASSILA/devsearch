<?php require_once "./includes/header.php" ?>
<?php require_once "./functions/projects.funcs.php" ?>
<?php require_once "./db/db.php" ?>
<?php $projects = getProjects($db) ?>
<!-- Main Section -->
<main class="projects">
    <section class="hero-section text-center">
        <div class="container container--narrow">
            <div class="hero-section__box">
                <h2>Search for <span>Projects</span></h2>
            </div>

            <div class="hero-section__search">
                <form class="form" action="#" method="get">
                    <div class="form__field">
                        <label for="formInput#search">Search By Projects </label>
                        <input class="input input--text" id="formInput#search" type="text" name="text" placeholder="Search by Project Title" />
                    </div>

                    <input class="btn btn--sub btn--lg" type="submit" value="Search" />
                </form>
            </div>
        </div>
    </section>
    <!-- Search Result: DevList -->
    <section class="projectsList">
        <div class="container">
            <div class="grid grid--three">
                <?php foreach ($projects as $project) : ?>
                    <?php $id = $project->owner ?>
                    <?php $owner = getDeveloperName($db, $id) ?>
                    <?php $tags = getProjectTags($db, $project->id) ?>
                    <div class="column">
                        <div class="card project">
                            <a href="<?php echo "./single-project.php?id=" . $project->id ?>" class="project">
                                <img class="project__thumbnail" src="<?php echo $project->image ?>" alt="project thumbnail" />
                                <div class="card__body">
                                    <h3 class="project__title"><?php echo $project->title ?></h3>
                                    <p><a class="project__author" href="<?php echo "./profile.php?id=" . $project->owner ?>">By <?php echo $owner->first_name . " " . $owner->last_name ?></a></p>
                                    <p class="project--rating">
                                        <span style="font-weight: bold;">98%</span> Postitive
                                        Feedback (72 Votes)
                                    </p>
                                    <div class="project__tags">
                                        <?php foreach ($tags as $tag) : ?>
                                            <span class="tag tag--pill tag--main">
                                                <small><?php echo $tag->name ?></small>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>

    <div class="pagination">
        <ul class="container">
            <li><a href="#" class="btn btn--disabled">&#10094; Prev</a></li>
            <li><a href="#" class="btn btn--sub">01</a></li>
            <li><a href="#" class="btn">02</a></li>
            <li><a href="#" class="btn">03</a></li>
            <li><a href="#" class="btn">04</a></li>
            <li><a href="#" class="btn">05</a></li>
            <li><a href="#" class="btn">06</a></li>
            <li><a href="#" class="btn">07</a></li>
            <li><a href="#" class="btn">08</a></li>
            <li><a href="#" class="btn">09</a></li>
            <li><a href="#" class="btn">10</a></li>
            <li><a href="#" class="btn">Next &#10095;</a></li>
        </ul>
    </div>
</main>